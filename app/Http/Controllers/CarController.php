<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Purchase;

class CarController extends Controller
{
    public function list()
    {
        $data['getRecord']= Car::getRecord();
        $data['header_title'] = "Cars";
        return view('dealer.cars.list', $data);
    }

    public function add()
    {
       
        $data['header_title'] = "Add Cars ";
        return view('dealer.cars.add', $data);
    }

    public function insert(Request $request)
    {

        $car = new Car;
        $car->vin = trim($request->vin);
        $car->brands = trim($request->brands);
        $car->models = trim($request->models);
        $car->color = trim($request->color);
        $car->engine = trim($request->engine);
        $car->transmission = trim($request->transmission);
        $car->price = trim($request->price);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/car');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('dealer/cars/list')->with('succes',"Car Successfully Created");
    }

    public function edit($id)
    {
        $getRecord = Car::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['header_title'] = "Edit Car";
        return view('dealer.cars.edit', $data);
    }

    public function update(Request $request,$id)
    {

        $car = Car::getSingle($id);
        $car->vin = trim($request->vin);
        $car->brands = trim($request->brands);
        $car->models = trim($request->models);
        $car->color = trim($request->color);
        $car->engine = trim($request->engine);
        $car->transmission = trim($request->transmission);
        $car->price = trim($request->price);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/car');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('dealer/cars/list')->with('succes',"Car Successfully Updated");
    }

    public function delete($id)
    {
        $car = Car::getSingle($id);
        $car->is_delete= 1;
        $car->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }


    //Customer
    public function customerlist()
    {
        $data['getRecord']= Car::getRecordCustomer();
        $data['header_title'] = "Cars";
        return view('student.cars.list', $data);
    }

    public function customerpurchase($id)
    {
        $getRecord = Car::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['header_title'] = "Purchase Car";
        return view('student.cars.purchase', $data);
    }

    public function customerpurchasestore(Request $request, $carId)
{
    // Validate the request data as needed

    // Create a new purchase record
    $purchase = new Purchase;
    $purchase->car_id = $carId;
    $purchase->customer_id = Auth::user()->id; // Assuming you have a customers table
    $purchase->purchase_date = now();

    // Save the purchase record
    $purchase->save();

    // You may also want to update the car status or perform other actions related to the purchase

    return redirect('student/cars/list')->with('succes',"Car Successfully Purchase");
}

//admin

public function adminlist()
{
    $data['getRecord']= Car::getRecord();
    $data['header_title'] = "Cars";
    return view('admin.cars.list', $data);
}


public function adminadd()
    {
       
        $data['header_title'] = "Add Cars ";
        return view('admin.cars.add', $data);
    }

    public function admininsert(Request $request)
    {

        $car = new Car;
        $car->vin = trim($request->vin);
        $car->brands = trim($request->brands);
        $car->models = trim($request->models);
        $car->color = trim($request->color);
        $car->engine = trim($request->engine);
        $car->transmission = trim($request->transmission);
        $car->price = trim($request->price);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/car');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('admin/cars/list')->with('succes',"Car Successfully Created");
    }

    public function adminedit($id)
    {
        $getRecord = Car::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['header_title'] = "Edit Car";
        return view('admin.cars.edit', $data);
    }

    public function adminupdate(Request $request,$id)
    {

        $car = Car::getSingle($id);
        $car->vin = trim($request->vin);
        $car->brands = trim($request->brands);
        $car->models = trim($request->models);
        $car->color = trim($request->color);
        $car->engine = trim($request->engine);
        $car->transmission = trim($request->transmission);
        $car->price = trim($request->price);
        $car->created_by = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) 
        {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/car');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $car->photo = $filename;
        }

        $car->save();

        return redirect('admin/cars/list')->with('succes',"Car Successfully Updated");
    }

    public function admindelete($id)
    {
        $car = Car::getSingle($id);
        $car->is_delete= 1;
        $car->save();

        return redirect()->back()->with('succes',"Car Successfully Deleted");
    }

}
