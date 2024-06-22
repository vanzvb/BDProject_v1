<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class   CustomRedirectController extends Controller
{
    public function redirectToBlade()
    {
        // You can change 'your-blade-file-name' to the actual blade file name you want to redirect to
        return view('auth.form');
    }
}
