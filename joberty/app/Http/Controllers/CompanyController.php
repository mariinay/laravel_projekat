<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return $companies;
    }

    public function show($company_id)
    {
        $company = Company::find($company_id);
        if(is_null($company)){
            return response()->json('Data not found', 404);
        }
        return response()->json($company);
    }
}
