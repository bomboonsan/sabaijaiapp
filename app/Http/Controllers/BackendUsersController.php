<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Accounts;
use Carbon\Carbon;

class BackendUsersController extends Controller
{
    //
    public function index()
    {
        $users = Accounts::orderBy('created_at', 'DESC')->paginate(20);
        return view('backend.users.index' , compact('users'));
    }

    public function show($id)
    {
        $user = Accounts::find($id);
        return view('backend.users.show' , compact('user'));
    }
}
