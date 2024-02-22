<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Parts;
use App\Models\Purchase_Parts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PartsController extends Controller
{
    public function list()
    {
        $data['getRecord']= Parts::getRecord();
        $data['header_title'] = "Parts";
        return view('supplier.parts.list', $data);
    }

    public function add()
    {
        $data['getModel'] = Car::getModel();
        $data['header_title'] = "Add Parts ";
        return view('supplier.parts.add', $data);
    }

    public function insert(Request $request)
    {

        $car = new Parts;
        $car->parts_name = trim($request->parts_name);
        $car->price = trim($request->price);
        $car->car_models = trim($request->car_models);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/parts');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('supplier/parts/list')->with('succes',"Parts Successfully Created");
    }

    public function edit($id)
    {
        $getRecord = Parts::getSingle($id);
        $data['getModel'] = Car::getModel();
        $data['getRecord'] = $getRecord;
        $data['header_title'] = "Edit Parts";
        return view('supplier.parts.edit', $data);
    }


    public function update(Request $request,$id)
    {

        $car = Parts::getSingle($id);
        $car->parts_name = trim($request->parts_name);
        $car->price = trim($request->price);
        $car->car_models = trim($request->car_models);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/parts');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('supplier/parts/list')->with('succes',"Parts Successfully Updated");
    }

    public function delete($id)
    {
        $car = Parts::getSingle($id);
        $car->is_delete= 1;
        $car->save();

        return redirect()->back()->with('succes',"Parts Successfully Deleted");
    }

//Customer
public function customerlist()
    {
        $data['getRecord']= Parts::getRecordCustomer();
        $data['header_title'] = "Cars";
        return view('student.parts.list', $data);
    }

    public function customerpurchase($id)
    {
        $getRecord = Parts::getSingle($id);
        $data['getModel'] = Car::getModel();
        $data['getRecord'] = $getRecord;
        $data['header_title'] = "Purchase Parts";
        return view('student.parts.purchase', $data);
    }

    public function customerpurchasestore(Request $request, $partsId)
{
    // Validate the request data as needed

    // Create a new purchase record
    $purchase = new Purchase_Parts;
    $purchase->parts_id = $partsId;
    $purchase->customer_id = Auth::user()->id; // Assuming you have a customers table
    $purchase->purchase_date = now();
    // Save the purchase record
    $purchase->save();

    // You may also want to update the car status or perform other actions related to the purchase

    return redirect('student/parts/list')->with('succes',"Parts Successfully Purchase");
}

//admin

public function adminlist()
{
    $data['getRecord']= Parts::getRecord();
    $data['header_title'] = "Parts";
    return view('admin.parts.list', $data);
}

public function adminadd()
{
    $data['getModel'] = Car::getModel();
    $data['header_title'] = "Add Parts ";
    return view('admin.parts.add', $data);
}

public function admininsert(Request $request)
{

    $car = new Parts;
    $car->parts_name = trim($request->parts_name);
    $car->price = trim($request->price);
    $car->car_models = trim($request->car_models);
    $car->created_by = Auth::user()->id;

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
    {
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;

        $uploadPath = public_path('upload/parts');

    // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
    $file->move($uploadPath, $filename);

    $car->photo = $filename;
    }

    $car->save();

    return redirect('admin/parts/list')->with('succes',"Parts Successfully Created");
}

public function adminedit($id)
{
    $getRecord = Parts::getSingle($id);
    $data['getModel'] = Car::getModel();
    $data['getRecord'] = $getRecord;
    $data['header_title'] = "Edit Parts";
    return view('admin.parts.edit', $data);
}


public function adminupdate(Request $request,$id)
{

    $car = Parts::getSingle($id);
    $car->parts_name = trim($request->parts_name);
    $car->price = trim($request->price);
    $car->car_models = trim($request->car_models);
    $car->created_by = Auth::user()->id;

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
    {
        $file = $request->file('photo');
        $ext = $file->getClientOriginalExtension();
        $randomStr = Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;

        $uploadPath = public_path('upload/parts');

    // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
    $file->move($uploadPath, $filename);

    $car->photo = $filename;
    }

    $car->save();

    return redirect('admin/parts/list')->with('succes',"Parts Successfully Updated");
}

public function admindelete($id)
{
    $car = Parts::getSingle($id);
    $car->is_delete= 1;
    $car->save();

    return redirect()->back()->with('succes',"Parts Successfully Deleted");
}
}
