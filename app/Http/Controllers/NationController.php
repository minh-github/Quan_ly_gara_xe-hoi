<?php

namespace App\Http\Controllers;

use App\Models\nation;
use Illuminate\Http\Request;

class NationController extends Controller
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
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function show(nation $nation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function edit(nation $nation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nation $nation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nation  $nation
     * @return \Illuminate\Http\Response
     */
    public function destroy(nation $nation)
    {
        //
    }
}
