<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileEditForm()
    {
        $user = Auth::user();

        return view("mypage.profile_edit_form", compact("user"));
    }
}
