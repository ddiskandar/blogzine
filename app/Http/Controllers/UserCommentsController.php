<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCommentsController extends Controller
{
    public function show(User $user)
    {
        return view('user-comments', [
            'user' => $user,
        ]);
    }
}
