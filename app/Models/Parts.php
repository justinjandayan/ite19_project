<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parts extends Model
{
    use HasFactory;

    protected $table ="parts";

    static public function getSingle($id) 
    {
        return self::find($id);
    }
    

    public function getPhotoDirect()
{
    if(!empty($this->photo) && file_exists('upload/parts/'.$this->photo))
    {
        return url('upload/parts/'.$this->photo);
    }
    else
    {
        return asset('upload/profile/user.jpg');
    
    }

}

static public function getRecord()
{
    $return = Parts::select('parts.*', 'cars.models as models', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->paginate(10);

    return $return;
}

static public function getTotalParts()
{
    $return = Parts::select('parts.*', 'cars.models as models', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->count();

    return $return;
}

// static public function getRecordCustomer()
// {
    
//     $return = Parts::select('parts.*','cars.models as models','users.name as created_by_name', 'users.last_name as created_by_last_name')
//             ->join('users', 'users.id', '=', 'parts.created_by')
//             ->join('cars', 'cars.id', '=', DB::raw('CAST(parts.car_models AS bigint)')) // Explicit casting
//             ->where('parts.is_delete','=', 0)
//             ->orderBy('parts.id','desc')
//             ->paginate(10);

//     return $return;
// }
static public function getRecordCustomer()
{
    // Get the IDs of purchased cars
    $purchasedPartsIds = Purchase_Parts::pluck('parts_id')->toArray();

    // Fetch cars that are not purchased
        $availableCars = Parts::select('parts.*','cars.models as models','users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
        ->whereNotIn('parts.id', $purchasedPartsIds)
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->paginate(10);

    return $availableCars;
}

static public function getTotalPartsCustomer()
{
    // Get the IDs of purchased cars
    $purchasedPartsIds = Purchase_Parts::pluck('parts_id')->toArray();

    // Fetch cars that are not purchased
        $availableCars = Parts::select('parts.*','cars.models as models','users.name as created_by_name', 'users.last_name as created_by_last_name')
        ->join('users', 'users.id', '=', 'parts.created_by')
        ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
        ->whereNotIn('parts.id', $purchasedPartsIds)
        ->where('parts.is_delete', '=', 0)
        ->orderBy('parts.id', 'desc')
        ->count();

    return $availableCars;
}
}
