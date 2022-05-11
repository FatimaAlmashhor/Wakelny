<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class settingPaymentController extends Controller
{
    public function payPagesucces(){

    return view('admin.payAnimation.paySucces');
    }

    public function payPageUnsucces(){

        return view('admin.payAnimation.payUnsucces');
        }



}
