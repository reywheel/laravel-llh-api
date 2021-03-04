<?php

namespace App\Http\Controllers;

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
        $sleepData = SleepData::all();

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
    public function store(Request $request)
    {
        $validatedFields = $this->validate($request, [
            'date' => ['required', 'date'],
            'hours' => ['required', 'integer'],
            'minutes' => ['required', 'integer'],
            'user_id' => ['required', 'exists:users,id']
        ]);

        $newSleepData = new SleepData();
        $newSleepData->fill($validatedFields);
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
    public function update(Request $request, SleepData $sleepData)
    {
        $validatedFields = $this->validate($request, [
            'date' => ['date'],
            'hours' => ['integer'],
            'minutes' => ['integer'],
        ]);

        $sleepData->fill($validatedFields);
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
