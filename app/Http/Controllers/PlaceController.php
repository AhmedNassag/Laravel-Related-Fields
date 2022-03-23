<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Country;
use App\City;
use App\Region;
use App\Location;

class PlaceController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $locations = Location::with(['country', 'city', 'region'])->paginate(5);
        return view('places.index',compact('countries','locations'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'country_id' => 'required',
            'city_id'    => 'required',
            'region_id'  => 'required',
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $location = Location::create
        ([
            'address'       => Str::random(10),
            'country_id'    => $request->country_id,
            'city_id'       => $request->city_id,
            'region_id'     => $request->region_id,
        ]);
        if ($location)
        {
            return redirect()->back()->with
            ([
                'message'    => 'Place added successfully',
                'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect()->back()->with
            ([
                'message'    => 'Something was wrong',
                'alert-type' => 'danger'
            ]);
        }
    }


    public function cities(Request $request)
    {
        $cities = City::whereCountryId($request->country_id)->pluck('name', 'id');
        return response()->json($cities);
    }


    public function regions(Request $request)
    {
        $regions = Region::whereCityId($request->city_id)->pluck('name', 'id');
        return response()->json($regions);
    }
}
