<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $users = User::all();
            return response()->json($users, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Morte'
            ], 500);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function loginAuth(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->senha, $user->senha)){
                return response()->json([
                    'token' => $user->createToken('token')->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Senha incorreta'
                ], 401);
            }
        } else {
            return response()->json([
                'error' => 'Usuario nao encontrado'
            ], 404);
        }

    }

    public function MiaKhalifa(Request $request){
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'sim' => 'Mia Khalifa'
        ], 200);
    }

}
