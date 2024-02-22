<?php

namespace App\Http\Controllers;

use App\Models\Purchase_Parts;
use Illuminate\Http\Request;

class PurchasePartsController extends Controller
{

    public function list()
    {
        $data['getRecord']= Purchase_Parts::getRecord();
        $data['header_title'] = "Cars";
        return view('supplier.purchase.list', $data);

    }

    public function delete($id)
    {
        $data = Purchase_Parts::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function accept(Request $request, $id)
    {
        $data = Purchase_Parts::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function decline(Request $request, string $id)
    {
        $data = Purchase_Parts::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }

    //customer
    public function purchaselist()
    {
        $data['getRecord']= Purchase_Parts::getcustomerRecord();
        $data['header_title'] = "Parts";
        return view('student.purchase_parts.list', $data);
    }


    //admin
    public function adminlist()
    {
        $data['getRecord']= Purchase_Parts::getRecord();
        $data['header_title'] = "Cars";
        return view('admin.purchase_parts.list', $data);

    }

    public function admindelete($id)
    {
        $data = Purchase_Parts::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

    public function adminaccept(Request $request, $id)
    {
        $data = Purchase_Parts::findOrFail($id);
        $data->status = 'accepted';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Accepted");
    }
    
    public function admindecline(Request $request, string $id)
    {
        $data = Purchase_Parts::getSingle($id);
        $data->status = 'declined';
        $data->save();
    
        return redirect()->back()->with('succes',"Purchase Successfully Decline");
    }
}
