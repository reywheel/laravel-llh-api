<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $validatedFields = $this->validate($request, [
            'user_id' => ['required', 'integer', 'unique:personal_data', 'exists:users,id'],
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'address' => ['required', 'string'],
            'policy_number' => ['required', 'integer', 'unique:personal_data'],
        ]);

        $newPersonalData = new PersonalData();
        $newPersonalData->fill($validatedFields);
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
    public function update(Request $request, PersonalData $personalData)
    {
        $validatedFields = $this->validate($request, [
            'last_name' => ['string'],
            'first_name' => ['string'],
            'second_name' => ['string'],
            'date_of_birth' => ['date'],
            'address' => ['string'],
            'policy_number' => ['integer', 'unique:personal_data'],
        ]);

        $personalData->fill($validatedFields);
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
