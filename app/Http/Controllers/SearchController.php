<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('search');
    }

    public function search()
    {

        $artists = [];
        $query = Input::get('search');
        $cities = City::with('artists')->Where('city', 'like', '%' . $query . '%')->get();
        if(!$cities->isEmpty()){
            foreach ($cities as $city){
                foreach($city->artists as $artist){
                    if(Input::get('styles')) {
                        $rates = [];
                        foreach($artist->rated as $customer){
                            $rates[] = $customer->pivot->rating;
                        }
                        if($rates) {
                            $avg_rating = array_sum($rates)/count($rates);
                        } else {
                            $avg_rating = 0;
                        }
                        $rate = str_replace('+','',Input::get('rating'));

                        if($artist->user->styles->contains(Input::get('styles')) && $avg_rating > $rate){
                            $artists[] = $artist;
                        }
                    } else {
                        $artists[] = $artist;
                    }

                }
            }
        }

        return view('after_search', compact('artists', 'query'));
    }
}
