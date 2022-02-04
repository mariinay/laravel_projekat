<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class CompanyAdvertisementController extends Controller
{
    public function index($company_id)
    {
        $advertisements = Advertisement::get()->where('company_id',$company_id);
        if(is_null($advertisements)){
            return response()->json('Data not found', 404);
        }
        return new AdvertisementCollection($advertisements);
    }
}
