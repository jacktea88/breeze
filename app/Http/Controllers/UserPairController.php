<?php

namespace App\Http\Controllers;

use App\Models\UserPair;
use App\Http\Requests\StoreUserPairRequest;
use App\Http\Requests\UpdateUserPairRequest;

class UserPairController extends Controller
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
     * @param  \App\Http\Requests\StoreUserPairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPairRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPair  $userPair
     * @return \Illuminate\Http\Response
     */
    public function show(UserPair $userPair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPair  $userPair
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPair $userPair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPairRequest  $request
     * @param  \App\Models\UserPair  $userPair
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPairRequest $request, UserPair $userPair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPair  $userPair
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPair $userPair)
    {
        //
    }
}
