<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'identification' => 'required|numeric|unique:users',
                'name' => 'required|string',
                'surnames' => 'required|string',
                'address' => 'string',
                'phone_number' => 'numeric',
                'email' => 'string|unique:users',
            ]);

            $user = new User();
            $user->identification = $request->identification;
            $user->name = $request->name;
            $user->surnames = $request->surnames;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            $user->email = $request->email;
            $user->created_at = now();
            $user->save();

        } catch (\Throwable $e) {
            report($e);
            $error = $e->getMessage();
            return $error;
        }

        return response()->json([
            'success' => true,
            'message' => 'Comprador registrado exitosamente',
        ]);
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
}
