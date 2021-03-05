<?php

namespace App\Http\Controllers;

use App\Models\TemperatureData;
use Illuminate\Http\Request;

class TemperatureDataController extends Controller
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
        $temperatureData = TemperatureData::all();

        return response()->json($temperatureData);
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
            'value' => ['required', 'numeric'],
            'user_id' => ['required', 'integer', 'exists:users,id']
        ]);

        $newTemperatureData = new TemperatureData();
        $newTemperatureData->fill($validatedFields);
        $status = $newTemperatureData->save();

        return response()->json(['status' => $status], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemperatureData  $temperatureData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(TemperatureData $temperatureData)
    {
        return response()->json($temperatureData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemperatureData  $temperatureData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(Request $request, TemperatureData $temperatureData)
    {
        $validatedFields = $this->validate($request, [
            'measurement_time' => ['date'],
            'value' => ['numeric'],
        ]);

        $temperatureData->fill($validatedFields);
        $status = $temperatureData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemperatureData  $temperatureData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function destroy(TemperatureData $temperatureData)
    {
        $status = $temperatureData->delete();

        return response()->json(['status' => $status]);
    }
}
