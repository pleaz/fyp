<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Profile(User $user)
    {

        if($user->artist()->exists()) {

            if(Auth()->user()->rates->contains($user->id)) {
                $rated_user = Auth()->user()->rates->find($user->id);
                $rating = $rated_user->pivot->rating;
            }

            $rates = [];
            foreach($user->artist->rated as $customer){
                $rates[] = $customer->pivot->rating;
            }
            if($rates) $avg_rating = array_sum($rates)/count($rates);

            return view('artist_profile', compact('user', 'rating', 'avg_rating'));

        } else {

            return view('customer_profile', compact('user'));

        }

    }

    public function Like(User $user)
    {

        Auth()->user()->favorites()->attach($user);

        return back();

    }

    public function Unlike(User $user)
    {

        Auth()->user()->favorites()->detach($user);

        return back();

    }

    public function Rating(User $user, $value)
    {

        Auth()->user()->rates()->detach($user);
        Auth()->user()->rates()->attach($user, ['rating' => $value]);

        return back();

    }
}
