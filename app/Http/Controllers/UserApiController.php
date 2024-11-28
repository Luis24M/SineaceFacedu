<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function test(){
        $user=[
            'email'=>'user@gmail.com',
            'password'=>'uaser1234',
        ];
        return response()->json($user);
    }

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try{

            $user = User::create([
                'name'=>'user1',
                'lastname'=>'user1',
                'email'=>'user1@gmail.com',
                'password'=>'user1234',
                'rol'=>'colaborador'
            ]);
    
            return response()->json($user);

        }catch(Exception $ex){
            return response()->json([
                'message'=>$ex
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
