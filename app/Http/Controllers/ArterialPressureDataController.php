<?php

namespace App\Http\Controllers;

use App\Models\ArterialPressureData;
use Illuminate\Http\Request;

class ArterialPressureDataController extends Controller
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
        $arterialPressureData = ArterialPressureData::all();

        return response()->json($arterialPressureData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function store(Request $request)
    {
        $validatedFields = $this->validate($request, [
            'measurement_time' => ['required', 'date'],
            'systolic_value' => ['required', 'integer'],
            'diastolic_value' => ['required', 'integer'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ]);

        $newArterialPressureData = new ArterialPressureData();
        $newArterialPressureData->fill($validatedFields);
        $status = $newArterialPressureData->save();

        return response()->json(['status' => $status], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArterialPressureData  $arterialPressureData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(ArterialPressureData $arterialPressureData)
    {
        return response()->json($arterialPressureData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArterialPressureData  $arterialPressureData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(Request $request, ArterialPressureData $arterialPressureData)
    {
        $validatedFields = $this->validate($request, [
            'measurement_time' => ['date'],
            'systolic_value' => ['integer'],
            'diastolic_value' => ['integer'],
        ]);

        $arterialPressureData->fill($validatedFields);
        $status = $arterialPressureData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArterialPressureData  $arterialPressureData
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ArterialPressureData $arterialPressureData)
    {
        $status = $arterialPressureData->delete();

        return response()->json(['status' => $status]);
    }
}
