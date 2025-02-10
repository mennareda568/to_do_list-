<?php

namespace App\Http\Controllers;

use App\Model\Task;
use App\Model\Pendingtask;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    //home page
    public function index()
    {
        $Task = Task::where('user_id', auth()->id())->count();
        $pending = Pendingtask::where('user_id', auth()->id())->count();

        return view('home', [
            "counttask" => $Task,
            "countpending" => $pending,
        ]);
    }

    //  change password for user
    public function password()
    {
        return view("user/password");
    }

    //  change password for user
    public function pass(Request $request)
    {
        $old_id = $request->old_id;
        $user = User::findOrFail($old_id);
        $request->validate([
            'password' => 'required',
        ]);
        $user->update([
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route("home")->with("message", "Your Password changed successfully");
    }
}
