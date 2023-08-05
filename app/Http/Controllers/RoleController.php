<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin()
    {
        return view('role.admin');
    }

    public function member()
    {
        return view('role.member');
    }

    public function show()
    {
        $members = User::members()->get();
        return view('list-member.index', compact('members'));
    }

    
}
