<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
       if($users) {
        return ApiResponseHelper::jsonResponse(201,'success', $users);
       } else { 
       return ApiResponseHelper::jsonResponse(404,'error');
    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'name' => 'required|max:231|string',
        'email' => 'required|email',
        'password' => 'required|min:8', 
        ]);
        $user = User::create([
            'name'=> $validate['name'],
            'email'=> $validate['email'],
            'password'=> bcrypt($validate['password']),
        ]);
        // dd($user);
        if($user) {
            // return 'ok'
           return ApiResponseHelper::jsonResponse(200,'successfully user created', $user->toArray());
        }
        else{
           return ApiResponseHelper::jsonResponse(404,'user couldn\'t created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user) {
           return ApiResponseHelper::jsonResponse(200,'success', $user);
        }
        else {
          return  ApiResponseHelper::jsonResponse(404,'error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
