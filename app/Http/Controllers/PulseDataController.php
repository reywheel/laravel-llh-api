<?php

namespace App\Http\Controllers;

use App\Http\Requests\PulseData\StoreRequest;
use App\Http\Requests\PulseData\UpdateRequest;
use App\Models\PulseData;
use Illuminate\Http\Request;

class PulseDataController extends Controller
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
        $pulseData = PulseData::orderBy('measurement_time', 'asc')->get();

        return response()->json($pulseData);
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
        $newPulseData = new PulseData();
        $newPulseData->fill($request->validated());
        $status = $newPulseData->save();

        return response()->json(['status' => $status], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PulseData  $pulseData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(PulseData $pulseData)
    {
        return response()->json($pulseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PulseData  $pulseData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(UpdateRequest $request, PulseData $pulseData)
    {
        $pulseData->fill($request->validated());
        $status = $pulseData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PulseData  $pulseData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function destroy(PulseData $pulseData)
    {
        $status = $pulseData->delete();

        return response()->json(['status' => $status]);
    }
}
