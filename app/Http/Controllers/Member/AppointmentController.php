<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AppointmentController extends Controller
{
    function index(){
        return view('member.appointment.index');
    }
}
