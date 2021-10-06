<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view("admin.profile.index");
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findorfail($id);

        $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email,$id",

        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route("admin.profile.index")->withToastSuccess('Successfully Updated!');
    }

    public function updatePassword(Request $request, $id)
    {

        $user = User::findorfail($id);

        $request->validate([
            'password' => 'required|min:8',
        ]);

        $user->update([
            $user->password = bcrypt($request->password)
        ]);

        return redirect()->route("admin.profile.index")->withToastSuccess("Password Updated Succefully");
    }
}
