<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use App\Models\User;
use Illuminate\Http\Request;

class ParameterController extends Controller
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
        $parameters = Parameter::all();

        return response()->json($parameters);
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
           'gender' => ['required', 'string', 'in:М,Ж'],
            'growth' => ['required', 'integer'],
            'weight' => ['required', 'integer'],
            'user_id' => ['required', 'integer', 'unique:parameters', 'exists:users,id']
        ]);

        $newParameter = new Parameter();
        $newParameter->fill($validatedFields);
        $status = $newParameter->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function show(Parameter $parameter)
    {
        return response()->json($parameter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function update(Request $request, Parameter $parameter)
    {
        $validatedFields = $this->validate($request, [
            'gender' => ['string', 'in:М,Ж'],
            'growth' => ['integer'],
            'weight' => ['integer'],
        ]);

        $parameter->fill($validatedFields);
        $status = $parameter->save();

        return response()->json(['status' => $status]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter  $parameter
     * @return \Illuminate\Http\JsonResponse
     *
     * done
     */
    public function destroy(Parameter $parameter)
    {
        $status = $parameter->delete();

        return response()->json(['status' => $status]);
    }
}
