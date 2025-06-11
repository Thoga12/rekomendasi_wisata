<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Ratings;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function destinasi(Request $request)
    {

        $minRating = $request->input('min_rating', 0);
        if($minRating > 0)
        {
            $destinasis = Destinasi::withAvg('ratings' , 'rating')->havingRaw('COALESCE(ratings_avg_rating, 0) >= ?', [$minRating])->orderByRaw('COALESCE(ratings_avg_rating, 0) asc');
        }
        else
        {
            $destinasis = Destinasi::withAvg('ratings' , 'rating')->havingRaw('COALESCE(ratings_avg_rating, 0) >= ?', [$minRating])->orderByRaw('COALESCE(ratings_avg_rating, 0) desc');

            // $destinasis = Destinasi::withAvg('ratings' , 'rating')->having('ratings_avg_rating', '>=', $minRating)->orderBy('ratings_avg_rating', 'DESC');
        }

        $destinasi = $destinasis->get();
        // $minRating = request('min_rating');
        // if ($minRating !== null) {
        //     $destinasis = $destinasis->filter(function ($destinasi) use ($minRating) {
        //         return ($destinasi->ratings_avg_rating ?? 0) >= $minRating;
        //     });
        // }
        // dd($destinasi);
        if ($request->ajax()) {
            return view('pages.destinasi', compact('destinasi'))->render();
        }

        return view('pages.destinasi', [
            'destinasis' => $destinasi ,
            // 'user' => auth()->user(),
        ]);
    }
    // public function deskripsiDestinasi()
    // {
    //     $destinasi = Destinasi::withAvg('ratings' , 'rating')->get();
    //     return view('pages.destinasi', [
    //         'destinasis' => $destinasi ,
    //     ]);
    // }


    public function deskripsiDestinasi($destId)
    {
        $destinasi = Destinasi::with(['ratings' => function($query){
                        $query->latest()->take(3);
                    }])->withAvg('ratings', 'rating')->findOrFail($destId);
        // $ratings = Ratings::findOrFail($destId)->count();
        // dd($destinasi);

        // $destinasi = $destinasiId->withAvg('ratings' , 'rating')->get();

        return view('pages.deskripsiDestinasiWisata', [ 'destinasi' => $destinasi]);
    }

    public function rekomendasiDestinasi()
    {
        return view('pages.rekomendasi_destinasi');
    }
    public function tentang()
    {
        return view('pages.tentang');
    }
}
