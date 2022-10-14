<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select([
            'id AS Id',
            'identification AS Identificacion',
            'name AS Nombre',
            'surnames AS Apellidos',
            'email AS Correo',
            'created_at AS Fecha'
        ])
            ->orderBy('name', 'desc')
            ->get();

        return $users;
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
                'identification' => 'required|numeric|unique:users,identification',
                'name' => 'required|string',
                'surnames' => 'required|string',
                'email' => 'string|unique:users,email',
            ]);

            $user = new User();
            $user->identification = $request->identification;
            $user->name = $request->name;
            $user->surnames = $request->surnames;
            $user->email = $request->email;
            $user->created_at = now();
            $user->save();
        } catch (\Throwable $e) {

            return response()->json(
                [
                    'success' => false,
                    'error' =>
                    $e->getMessage()
                ]
                // , 400);
                , 200);

            // report($e);
            // $error = $e->getMessage();
            // return $error;
        }

        return response()->json(
            [
                'success' => true,
                'message' =>
                'Comprador registrado exitosamente',
            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::select([
            'id AS Id',
            'identification AS Identificacion',
            'name AS Nombre',
            'surnames AS Apellidos',
            'email AS Correo',
            'created_at AS Fecha'
        ])
            ->where('identification', $id)
            ->first();

        return $user;
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
        try {
            $request->validate([
                'identification' => 'required|numeric|unique:users,identification,' . $id,
                'name' => 'required|string',
                'surnames' => 'required|string',
                'email' => 'string|unique:users,email,' . $id,
            ]);

            DB::table('users')
                ->where('id', $id)
                ->update([
                    'identification' => $request->identification,
                    'name' => $request->name,
                    'surnames' => $request->surnames,
                    'email' => $request->email,
                    'updated_at' => now()
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Comprador actualizado exitosamente',
            ]);
        } catch (\Throwable $e) {
            report($e);
            $error = $e->getMessage();
            return $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->delete();
        return $user;
    }


    /**
     * Esta funcion se encargar de filtrar al usuario por nombre
     *
     * @param Request $request
     * @return void
     */
    public function searchUserByParameter(Request $request)
    {
        $data = $request->parameter;
        if ($data) {
            $user = DB::select(
                "SELECT
                        id AS Id,
                        identification AS Identificacion,
                        name AS Nombre,
                        surnames AS Apellidos,

                        email AS Correo,
                        created_at AS Fecha
                        FROM users
                        WHERE name LIKE ?",
                ['%' . $data . '%']
            );
            if(!$user){
                return "No se encontraron datos relacionados";
            }else{
                return $user;
            }
        }else{
            return "Debe ingresar un nombre";
        }
    }
}
