<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class UserAdvertisementController extends Controller
{
    public function index($user_id)
    {
        $advertisements = Advertisement::get()->where('user_id',$user_id);
        if(is_null($advertisements)){
            return response()->json('Data not found', 404);
        }
        return new AdvertisementCollection($advertisements);
    }
}
