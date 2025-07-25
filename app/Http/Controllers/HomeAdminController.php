<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Ratings;
use App\Models\UserHistory;

use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function home()
    {
        $destinasi = Destinasi::all()->count();
        $histories = UserHistory::latest()->take(5)->get(); 
        $users = User::all()->count();
        // dd($destinasi);
        return view('pages.dashboard', [
            'destinasi' => $destinasi,
            'histories' => $histories,
            'users' => $users
        ]);
    }

    public function ratings()
    {
        // $destinasi = Destinasi::all()->count();
        $ratings = Ratings::with('user', 'destination')->get();
        // $users = User::all()->count();
        // dd($ratings);
        return view('pages.ratings', [
            'rewiews' => $ratings,
            // 'users' => $users
        ]);
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

        if ($request->ajax()) {
            return view('pages.destinasi', compact('destinasi'))->render();
        }

        return view('pages.destinasi', [
            'destinasis' => $destinasi ,
        ]);
    }
}
