<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table ="cars";

    static public function getSingle($id) 
    {
        return self::find($id);
    }
    
    static public function getRecord()
    {
        
        $return = Car::select('cars.*','users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('users', 'users.id', '=', 'cars.created_by')
                ->where('cars.is_delete','=', 0)
                ->orderBy('cars.id','desc')
                ->paginate(20);

        return $return;
    }

    static public function getTotalCar()
    {
        
        $return = Car::select('cars.*','users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('users', 'users.id', '=', 'cars.created_by')
                ->where('cars.is_delete','=', 0)
                ->orderBy('cars.id','desc')
                ->count();

        return $return;
    }

    static public function getRecordCustomer()
    {
        // Get the IDs of purchased cars
        $purchasedCarIds = Purchase::pluck('car_id')->toArray();

        // Fetch cars that are not purchased
        $availableCars = Car::select('cars.*', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
            ->join('users', 'users.id', '=', 'cars.created_by')
            ->whereNotIn('cars.id', $purchasedCarIds)
            ->where('cars.is_delete', '=', 0)
            ->orderBy('cars.id', 'desc')
            ->paginate(20);

        return $availableCars;
    }

    static public function getTotalCarCustomer()
    {
        // Get the IDs of purchased cars
        $purchasedCarIds = Purchase::pluck('car_id')->toArray();

        // Fetch cars that are not purchased
        $availableCars = Car::select('cars.*', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
            ->join('users', 'users.id', '=', 'cars.created_by')
            ->whereNotIn('cars.id', $purchasedCarIds)
            ->where('cars.is_delete', '=', 0)
            ->orderBy('cars.id', 'desc')
            ->count();

        return $availableCars;
    }

    public function getPhotoDirect()
{
    if(!empty($this->photo) && file_exists('upload/car/'.$this->photo))
    {
        return url('upload/car/'.$this->photo);
    }
    else
    {
        return asset('upload/profile/user.jpg');
    
    }

}

static public function  getModel()
{
    $return = Car::select('cars.*')
    ->join('users','users.id','cars.created_by')
    ->where('cars.is_delete', '=', 0)
    ->get();

return $return;
}

}
