<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getSupplier();
        $data['header_title'] = "Supplier List ";
        return view('admin.supplier.list',$data);
    }
}
