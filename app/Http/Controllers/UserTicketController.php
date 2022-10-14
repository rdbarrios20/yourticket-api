<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTicket;
use App\Models\Ticket;

class UserTicketController extends Controller
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
                'user_identification' => 'required|numeric',
                'ticket_id' => 'required',
            ]);

            $user = User::find($request->user_identification);
            $purchase = new UserTicket();
            $purchase->user_id = $user->id;
            $purchase->ticket_id = $request->ticket_id;
            $purchase->created_at = now();
            $purchase->save();

            Ticket::where('id', $request->ticket_id)
                ->update(['status' => 'No disponible']);

            return response()->json(
                [
                    'success' => true,
                    'message' =>
                    'Ticket asignado exitosamente',
                ],
                200
            );
        } catch (\Throwable $e) {
            report($e);
            $error = $e->getMessage();
            return $error;
        }
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
