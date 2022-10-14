<?php

namespace App\Http\Controllers;

use App\Models\OftenDiner;
use App\Http\Requests\StoreOftenDinerRequest;
use App\Http\Requests\UpdateOftenDinerRequest;

class OftenDinerController extends Controller
{
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
     * @param  \App\Http\Requests\StoreOftenDinerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOftenDinerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function show(OftenDiner $oftenDiner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function edit(OftenDiner $oftenDiner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOftenDinerRequest  $request
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOftenDinerRequest $request, OftenDiner $oftenDiner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OftenDiner  $oftenDiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(OftenDiner $oftenDiner)
    {
        //
    }
}
