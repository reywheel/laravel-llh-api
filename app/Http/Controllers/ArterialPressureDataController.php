<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArterialPressureData\StoreRequest;
use App\Http\Requests\ArterialPressureData\UpdateRequest;
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
        $arterialPressureData = ArterialPressureData::orderBy('measurement_time', 'asc')->get();

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
    public function store(StoreRequest $request)
    {
        $newArterialPressureData = new ArterialPressureData();
        $newArterialPressureData->fill($request->validated());
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
    public function update(UpdateRequest $request, ArterialPressureData $arterialPressureData)
    {
        $arterialPressureData->fill($request->validated());
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
