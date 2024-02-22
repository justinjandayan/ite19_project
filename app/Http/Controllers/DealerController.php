<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;

class DealerController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getDealer();
        $data['header_title'] = "Dealer List ";
        return view('admin.dealer.list',$data);
    }
}
