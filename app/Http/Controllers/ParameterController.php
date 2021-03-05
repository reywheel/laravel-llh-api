<?php

namespace App\Http\Controllers;

use App\Http\Requests\Parameter\StoreRequest;
use App\Http\Requests\Parameter\UpdateRequest;
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
    public function store(StoreRequest $request)
    {
        $newParameter = new Parameter();
        $newParameter->fill($request->validated());
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
    public function update(UpdateRequest $request, Parameter $parameter)
    {
        $parameter->fill($request->validated());
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
