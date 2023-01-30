<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {

        $referral_details=Referral::all();
        return view('Admin.Referral.index',compact('referral_details'));
    }



}
