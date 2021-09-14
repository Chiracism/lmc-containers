<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangPasswordController extends Controller
{
    public function change_password(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required','string','min:8','confirmed'],
            // 'password_confirmation' => ['required','same:password']
        ]);

        $user->update([
            'password' =>Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message','User Password Updated Successfully');
    }
}
