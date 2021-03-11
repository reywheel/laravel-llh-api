<?php

namespace App\Http\Controllers;

use App\Http\Requests\SleepData\StoreRequest;
use App\Http\Requests\SleepData\UpdateRequest;
use App\Models\SleepData;
use Illuminate\Http\Request;

class SleepDataController extends Controller
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
        $sleepData = SleepData::orderBy('date', 'asc')->get();

        return response()->json($sleepData);
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
        $newSleepData = new SleepData();
        $newSleepData->fill($request->validated());
        $status = $newSleepData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SleepData  $sleepData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(SleepData $sleepData)
    {
        return response()->json($sleepData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SleepData  $sleepData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(UpdateRequest $request, SleepData $sleepData)
    {
        $sleepData->fill($request->validated());
        $status = $sleepData->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SleepData  $sleepData
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function destroy(SleepData $sleepData)
    {
        $status = $sleepData->delete();

        return response()->json(['status' => $status]);
    }
}
