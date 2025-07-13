<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function getRecommendations()
    {
        $userId = Auth::id();
        $ratings = Ratings::all();
        $matrix = [];

        // 1. Buat rating matrix [user][destinasi] = rating
        foreach ($ratings as $rating) {
            $matrix[$rating->user_id][$rating->destinasi_id] = $rating->rating;
        }

        // 2. Buat vektor destinasi: [destinasi][user] = rating
        $destinationVectors = [];
        foreach ($matrix as $userKey => $destRatings) {
            foreach ($destRatings as $destId => $rating) {
                $destinationVectors[$destId][$userKey] = $rating;
            }
        }

        // 3. Hitung cosine similarity antar destinasi
        $similarities = [];
        foreach ($destinationVectors as $destA => $vectorA) {
            foreach ($destinationVectors as $destB => $vectorB) {
                if ($destA != $destB) {
                    $similarities[$destA][$destB] = $this->cosineSimilarity($vectorA, $vectorB);
                }
            }
        }

        // 4. Ambil rating user saat ini
        $userRatings = $matrix[$userId] ?? [];

        // 5. Prediksi rating untuk destinasi yang belum dirating
        $scores = [];
        foreach ($userRatings as $ratedDest => $rating) {
            foreach ($similarities[$ratedDest] ?? [] as $similarDest => $simScore) {
                if (!isset($userRatings[$similarDest])) {
                    if (!isset($scores[$similarDest])) {
                        $scores[$similarDest] = 0;
                    }
                    $scores[$similarDest] += $simScore * $rating;
                }
            }
        }

        arsort($scores); // Urutkan dari tertinggi ke rendah

        // 6. Ambil data destinasi hasil rekomendasi
        $recommendations = [];
        foreach ($scores as $destId => $score) {
            $destination = Destinasi::withAvg('ratings', 'rating')->find($destId);
            if ($destination) {
                $recommendations[] = [
                    'destination' => $destination,
                    'score' => round($score, 3),
                ];
            }
        }

        // 7. Evaluasi MAE dan MAPE berdasarkan prediksi terhadap destinasi yang SUDAH dirating
        $actuals = [];
        $predictions = [];
        $evaluasiData = [];
        foreach ($userRatings as $testDest => $actualRating) {
            $numerator = 0;
            $denominator = 0;

            foreach ($similarities[$testDest] ?? [] as $otherDest => $sim) {
                if (isset($userRatings[$otherDest])) {
                    $numerator += $sim * $userRatings[$otherDest];
                    $denominator += abs($sim);
                }
            }

            if ($denominator > 0) {
                $predictedRating = $numerator / $denominator;


                $evaluasiData[] = [
                    'user' => 'U' . $userId,
                    'actual' => $actualRating,
                    'predicted' => round($predictedRating, 2),
                    'mse' => round(pow($actualRating - $predictedRating, 2), 3),
                    // 'mse' => round(pow($actualRating - $predicted, 2), 3),
                    'mae' => round(abs($actualRating - $predictedRating), 3),
                    'mape' => $actualRating != 0 ? round(abs(($actualRating - $predictedRating) / $actualRating) * 100, 2) : null,
                ];

                $actuals[] = $actualRating;
                $predictions[] = $predictedRating;
            }
        }

        $mae = 0;
        $mape = 0;
        $n = count($actuals);

        if ($n > 0) {
            for ($i = 0; $i < $n; $i++) {
                $mae += abs($actuals[$i] - $predictions[$i]);
                if ($actuals[$i] != 0) {
                    $mape += abs(($actuals[$i] - $predictions[$i]) / $actuals[$i]);
                }
            }

            $mae /= $n;
            $mape = ($mape / $n) * 100;
        } else {
            $mae = null;
            $mape = null;
        }
        // dd($mae, $mape, $evaluasiData);
        return view('pages.rekomendasi_destinasi', compact('recommendations', 'mae', 'mape', 'evaluasiData'));
    }

    private function cosineSimilarity($vecA, $vecB)
    {
        $dot = 0;
        $normA = 0;
        $normB = 0;

        foreach ($vecA as $user => $ratingA) {
            if (isset($vecB[$user])) {
                $dot += $ratingA * $vecB[$user];
            }
            $normA += pow($ratingA, 2);
        }

        foreach ($vecB as $ratingB) {
            $normB += pow($ratingB, 2);
        }

        if ($normA == 0 || $normB == 0) return 0;
        return $dot / (sqrt($normA) * sqrt($normB));
    }
}
