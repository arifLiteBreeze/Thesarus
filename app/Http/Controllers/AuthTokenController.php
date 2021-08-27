<?php

namespace App\Http\Controllers;

use App\Models\AuthToken;
use Illuminate\Http\Request;
use App\Http\Requests\AuthTokenValidator;
use App\Services\AuthTokenService;

class AuthTokenController extends Controller
{
   
    protected $authTokenService;

    /**
     * Contruct Company service
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param AuthTokenService as $authTokenService
     * 
     * @return void
     */
    public function __construct(AuthTokenService $authTokenService)
    {
        $this->authTokenService = $authTokenService;
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
     * Validate and save auth-token
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Request
     * 
     * @return object
     */
    public function store(AuthTokenValidator $request)
    {
        $request->validated();
        return $this->authTokenService->save($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthToken  $authToken
     * @return \Illuminate\Http\Response
     */
    public function show(AuthToken $authToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthToken  $authToken
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthToken $authToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuthToken  $authToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthToken $authToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthToken  $authToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthToken $authToken)
    {
        //
    }
}
