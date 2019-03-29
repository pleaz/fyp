<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Profile(User $user)
    {

        if($user->artist()->exists()) {

            return view('artist_profile', compact('user'));

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
}
