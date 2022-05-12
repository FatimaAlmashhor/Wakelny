<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class settingPaymentController extends Controller
{
    public function payPagesucces(){

    return view('client.payAnimation.paySucces');
    }

    public function payPageUnsucces(){

        return view('client.payAnimation.payUnsucces');
        }

        public function Notfound(){

            return view('client.payAnimation.not404Found');
            }

            public function invalidPage(){

                return view('client.payAnimation.invalidPage');
                }


}
