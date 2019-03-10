<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locker;
use Auth;

class LockersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lockers = Locker::select("*")->whereNull('korisnik')->orderBy('id', 'asc')->get();
        $userId = Auth::user()->id;
        $selectedLocker = Locker::where('korisnik', $userId)->first();
        // Ako korisnik nema odabran ormarić, vraća vrijednost NULL u $selectedLocker
        if (!$selectedLocker) {
            $selectedLocker = NULL;
        }    
        return view('lockers.lockers')->with('lockers', $lockers)->with('selectedLocker', $selectedLocker);
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
        $userId = Auth::user()->id;
        $selectedLocker = Locker::where('korisnik', $userId)->first();
        $locker = Locker::where('id', $request->locker_id)->first();;
        // Ako korisnik nema odabran ormarić, zauzima novi
        if (!$selectedLocker) {            
            $locker->korisnik = $userId;
            $locker->save();
        } else {
            //Treba očistiti prethodni ormarić i zauzeti novi
            $selectedLocker->korisnik = NULL;
            $selectedLocker->save();
            $locker->korisnik = $userId;
            $locker->save();
        } 
        return redirect('lockers')->with('success', 'Ormarić zauzet.');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::user()->id;
        $selectedLocker = Locker::where('korisnik', $userId)->first();
        $selectedLocker->korisnik = NULL;
        $selectedLocker->save();

        return redirect('lockers')->with('success', 'Ormarić oslobođen.'); 
    }
}
