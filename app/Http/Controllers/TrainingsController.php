<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\User;
use Auth;

class TrainingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTreningId = Auth::user()->trening;
        $odabraniTrening = Training::find($userTreningId);
        $trainings = Training::all();
        return view('trainings.trainings')->with('trainings', $trainings)->with('odabraniTrening', $odabraniTrening);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        // Change training
        $user = User::find($id);
        $user->trening = $request->trening_id;
        $user->save();

        return redirect('trainings')->with('success', 'Trening upisan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete training
        $user = User::find($id);
        $user->trening = NULL;
        $user->save();

        return redirect('trainings')->with('success', 'Trening ispisan.');
    }
}
