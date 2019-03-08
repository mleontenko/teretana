<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Change theme
        $user = User::find($id);
        if($user->tema == 'light') {
            $user->tema = 'dark';
        } else {
            $user->tema = 'light';
        }
        $user->save();

        return redirect('/');
    }
}
