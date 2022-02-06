<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        return new AdvertisementCollection($advertisements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:50',
            'description' => 'string|max:255',
            'company_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $advertisement = Advertisement::create([
            'position' => $request->position,
            'description' => $request->description,
            'company_id' => $request->company_id,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return response()->json(['Advertisement created successfully.', new AdvertisementResource($advertisement)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return new AdvertisementResource($advertisement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);

        $validator = Validator::make($request->all(), [
            'position' => 'required|string|max:50',
            'description' => 'string|max:255',
            'company_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());


        $advertisement->position = $request->position;
        $advertisement->description = $request->description;
        $advertisement->company_id = $request->company_id;
        $advertisement->category_id = $request->category_id;

        $advertisement->save();

        return response()->json(['Advertisement updated successfully.', new AdvertisementResource($advertisement)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return response()->json('Advertisement deleted successfully.');
    }
}
