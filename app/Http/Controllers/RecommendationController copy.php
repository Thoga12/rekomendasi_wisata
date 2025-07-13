<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    //
    public function getRecommendations()
    {
        $userId = Auth::id();
        $ratings = Ratings::all();
        $matrix = [];


        // 1. Bangun rating matrix (user → destinasi → rating)
        foreach ($ratings as $rating) {
            $matrix[$rating->user_id][$rating->destinasi_id] = $rating->rating;
        }

        // 2. Bangun vector per destinasi
        $destinationVectors = [];
        foreach ($matrix as $userIdKey => $destRatings) {
            foreach ($destRatings as $destId => $rating) {
                $destinationVectors[$destId][$userIdKey] = $rating;
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

        // dd($similarities);

        // 4. Hitung rekomendasi
        $userRatings = $matrix[$userId] ?? [];
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

        arsort($scores); // Urutkan skor tertinggi
        // 5. Ambil data destinasi
        $recommendations = [];
        foreach ($scores as $destId => $score) {
            // $destination = Destinasi::find($destId);
            $destination = Destinasi::withAvg('ratings' , 'rating')->find($destId);
            // $destination = Destinasi::withAvg('ratings' , 'rating')->find($destId)->get();

            if ($destination) {
                $recommendations[] = [
                    'destination' => $destination,
                    'score' => round($score, 3),
                ];
            }
        }

        // return response()->json($recommendations);
        // dd($recommendations);
        // return view('pages.rekomendasi_destinasi', ['rekomendasis' => $recommendations ]);
        return view('pages.rekomendasi_destinasi', compact('recommendations'));

    }

    // Fungsi cosine similarity
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
