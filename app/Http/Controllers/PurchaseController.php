<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function list()
    {
        $data['getRecord']= Purchase::getRecord();
        $data['header_title'] = "Cars";
        return view('dealer.purchase.list', $data);
    }

    public function delete($id)
    {
        $data = Purchase::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function accept(Request $request, $id)
    {
        $data = Purchase::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function decline(Request $request, string $id)
    {
        $data = Purchase::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }

//customer
    public function notpurchaselist()
    {
        $data['getRecord']= Purchase::getcustomerRecordDecline();
        $data['header_title'] = "Cars";
        return view('student.purchase.list', $data);
    }

    public function purchaselist()
    {
        $data['getRecord']= Purchase::getcustomerRecordAccepted();
        $data['header_title'] = "Cars";
        return view('student.purchase.list', $data);
    }


    //admin

    public function adminlist()
    {
        $data['getRecord']= Purchase::getRecord();
        $data['header_title'] = "Cars";
        return view('admin.purchase.list', $data);
    }

    public function admindelete($id)
    {
        $data = Purchase::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function adminaccept(Request $request, $id)
    {
        $data = Purchase::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function admindecline(Request $request, string $id)
    {
        $data = Purchase::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }
}
