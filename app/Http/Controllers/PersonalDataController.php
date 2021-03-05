<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalData\StoreRequest;
use App\Http\Requests\PersonalData\UpdateRequest;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function index()
    {
        $personalData = PersonalData::all();

        return response()->json($personalData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function store(StoreRequest $request)
    {
        $newPersonalData = new PersonalData();
        $newPersonalData->fill($request->validated());
        $status = $newPersonalData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  PersonalData $personalData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(PersonalData $personalData)
    {
        return response()->json($personalData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PersonalData $personalData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(UpdateRequest $request, PersonalData $personalData)
    {
        $personalData->fill($request->validated());
        $status = $personalData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PersonalData $personalData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function destroy(PersonalData $personalData)
    {
        $status = $personalData->delete();

        return response()->json(['status' => $status]);
    }
}
