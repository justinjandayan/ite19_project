<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TeamModel;
use App\Models\classModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\Car;
use App\Models\ClassSubjectModel;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;
use App\Models\Parts;
use App\Models\Purchase;
use App\Models\Purchase_Parts;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1)
            {
                
                $data['TotalCustomer'] = User::getTotalCustomer(2);
                $data['TotalDealer'] = User::getTotalDealer(3);  
                $data['TotalSupplier'] = User::getTotalSupplier(4);
                $data['TotalCar'] = Car::getTotalCar(5);  
                $data['TotalParts'] = Parts::getTotalParts(6);
                $data['TotalPurchaseCar'] = Purchase::getTotalPurchaseCar(7);
                $data['TotalPurchaseParts'] = Purchase_Parts::getTotalPurchaseParts(8);            
    
                return view('admin.dashboard',$data);
            }
            else if(Auth::user()->user_type == 2)
            {
                $data['TotalCars'] = Car::getTotalCarCustomer(1); 
                $data['TotalParts'] = Parts::getTotalPartsCustomer(2); 
                $data['TotalPurchase'] = Purchase::getTotalPuchaseCustomer(3); 
                $data['TotalPurchaseParts'] = Purchase_Parts::getTotalPurchasePartsCustomer(4); 
                return view('student.dashboard',$data);
            } 
            else if(Auth::user()->user_type == 3)
            {
                $data['TotalCar'] = Car::getTotalCar(5); 
                $data['TotalPurchaseCar'] = Purchase::getTotalPurchaseCar(7);
                return view('dealer.dashboard',$data);
            } 
            else if(Auth::user()->user_type == 4)
            {
                $data['TotalParts'] = Parts::getTotalParts(6);
                $data['TotalPurchaseParts'] = Purchase_Parts::getTotalPurchaseParts(8); 
                return view('supplier.dashboard',$data);
            } 
    }
}
