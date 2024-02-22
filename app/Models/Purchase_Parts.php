<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Purchase_Parts extends Model
{
    use HasFactory;
    
    protected $casts = [
        'purchase_date' => 'datetime',
    ];

    static public function getSingle($id) 
    {
        return self::find($id);
    }

    protected $table ="purchase_parts";

    static public function getRecord()
    {
        $return = Purchase_Parts::select(
                'purchase_parts.*',
                'parts.parts_name',
                'parts.price',
                'parts.photo as photo',
                'users.name as name',
                'users.last_name as last_name',
                'cars.models as model'
            )
            ->join('parts', 'parts.id', '=', 'purchase_parts.parts_id')
            ->join('users', 'users.id', '=', 'purchase_parts.customer_id')
            ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
            ->where('purchase_parts.is_delete', '=', 0)
            ->orderBy('purchase_parts.id', 'desc')
            ->paginate(10);
    
        return $return;
    }

    
    static public function getTotalPurchaseParts()
    {
        $return = Purchase_Parts::select(
                'purchase_parts.*',
                'parts.parts_name',
                'parts.price',
                'parts.photo as photo',
                'users.name as name',
                'users.last_name as last_name',
                'cars.models as model'
            )
            ->join('parts', 'parts.id', '=', 'purchase_parts.parts_id')
            ->join('users', 'users.id', '=', 'purchase_parts.customer_id')
            ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
            ->where('purchase_parts.is_delete', '=', 0)
            ->orderBy('purchase_parts.id', 'desc')
            ->count();
    
        return $return;
    }




    static public function getcustomerRecord()
    {
        $return = Purchase_Parts::select(
                'purchase_parts.*',
                'parts.*',
                'parts.photo as photo',
                'users.name as name',
                'users.last_name as last_name',
                'cars.*',  // Include car information
                'cars.models as model'
            )
            ->join('parts', 'parts.id', '=', 'purchase_parts.parts_id')
            ->join('users', 'users.id', '=', 'purchase_parts.customer_id')
            ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
            ->where('purchase_parts.is_delete', '=', 0)
            ->orderBy('purchase_parts.id', 'desc')
            ->paginate(10);
    
        return $return;
    }

    static public function getTotalPurchasePartsCustomer()
    {
        $return = Purchase_Parts::select(
                'purchase_parts.*',
                'parts.*',
                'parts.photo as photo',
                'users.name as name',
                'users.last_name as last_name',
                'cars.*',  // Include car information
                'cars.models as model'
            )
            ->join('parts', 'parts.id', '=', 'purchase_parts.parts_id')
            ->join('users', 'users.id', '=', 'purchase_parts.customer_id')
            ->join('cars', 'cars.id', '=', DB::raw('CONVERT(parts.car_models, SIGNED)')) // Explicit casting
            ->where('purchase_parts.is_delete', '=', 0)
            ->orderBy('purchase_parts.id', 'desc')
            ->count();
    
        return $return;
    }
    

    

    public function getPhotoDirect()
    {
        if(!empty($this->photo) && file_exists('upload/parts/'.$this->photo))
        {
            return url('upload/parts/'.$this->photo);
        }
        else
        {
            return asset('dist/img/parts.png');
        
        }
    
    }
}
