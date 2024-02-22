<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirments extends Model
{
    use HasFactory;

    protected $table = 'requirments';


    static public function getRequirments()
    {
        $return = Requirments::select('requirments.*')
            ->orderBy('requirments.name', 'asc')
            ->get();
    
        return $return;
    }
    
}
