<?php

namespace App\Http\Controllers;

use App\Models\modelCar;
use Illuminate\Http\Request;

class ModelCarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function show($modelCar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function edit($modelCar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $modelCar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modelCar  $modelCar
     * @return \Illuminate\Http\Response
     */
    public function destroy($modelCar)
    {
        //
    }
}
