<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeworkModel extends Model
{
    use HasFactory;

    protected $table ="documents";

    static public function getSingle($id) 
    {
        return self::find($id);
    }

    static public function getRecordCount()
    {
        
        $return = HomeworkModel::select('documents.*', 'course_code.name as class_name', 'users.name as created_by_name', 'users.last_name as created_by_last_name')
                ->join('course_code', 'course_code.id', '=', 'documents.class_id')
                ->join('users', 'users.id', '=', 'documents.created_by')
                ->where('documents.is_delete','=', 0)
                ->orderBy('documents.id','desc')
                ->count();

        return $return;
    }


    static public function getRecord()
    {
        
        $return = HomeworkModel::select('documents.*', 'course_code.name as class_name', 'users.name as created_by_name', 'users.last_name as created_by_last_name','requirments.name as requirments_name')
                ->join('course_code', 'course_code.id', '=', 'documents.class_id')
                ->join('users', 'users.id', '=', 'documents.created_by')
                ->join('requirments', 'requirments.id', '=', DB::raw('CAST(documents.requirments AS bigint)'))
                ->where('documents.is_delete','=', 0)
                ->where('documents.semester','=', 'First sem.')
                ->orderBy('documents.id','desc')
                ->paginate(20);

        return $return;
    }
    static public function getRecordsecondsem()
    {
        
        $return = HomeworkModel::select('documents.*', 'course_code.name as class_name', 'users.name as created_by_name', 'users.last_name as created_by_last_name','requirments.name as requirments_name')
                ->join('course_code', 'course_code.id', '=', 'documents.class_id')
                ->join('users', 'users.id', '=', 'documents.created_by')
                ->join('requirments', 'requirments.id', '=', DB::raw('CAST(documents.requirments AS bigint)'))
                ->where('documents.is_delete','=', 0)
                ->where('documents.semester','=', 'Second sem.')
                ->orderBy('documents.id','desc')
                ->paginate(20);

        return $return;
    }
    

    static public function facultygetRecord()
{
    $userId = auth()->id();

    $return = HomeworkModel::select(
            'documents.*',
            'course_code.name as class_name',
            'users.name as created_by_name',
            'requirments.name as requirments_name'
        )
        ->join('users', 'users.id', '=', 'documents.created_by')
        ->join('course_code', 'course_code.id', '=', 'documents.class_id')
        ->join('requirments', 'requirments.id', '=', DB::raw('CAST(documents.requirments AS bigint)'))
        ->where('documents.is_delete', '=', 0)
        ->where('documents.created_by', '=', $userId)
        ->orderBy('documents.id', 'desc')
        ->paginate(20);

    return $return;
}




static public function facultygetRecordCount()
{
    $userId = auth()->id();

    $return = HomeworkModel::select(
            'documents.*',
            'course_code.name as class_name',
            'users.name as created_by_name',
            'requirments.name as requirments_name'
        )
        ->join('users', 'users.id', '=', 'documents.created_by')
        ->join('course_code', 'course_code.id', '=', 'documents.class_id')
        ->join('requirments', 'requirments.id', '=', DB::raw('CAST(documents.requirments AS bigint)'))
        ->where('documents.is_delete', '=', 0)
        ->where('documents.created_by', '=', $userId)
        ->orderBy('documents.id', 'desc')
        ->count();

    return $return;
}


    public function getDocument()
    {
        if(!empty($this->document_file) && file_exists('upload/homework/'.$this->document_file))
        {
            return url('upload/homework/'.$this->document_file);
        }
        else
        {
            return "";
        
        }
    
}

static public function getUsersWithoutRequirements($classId, $requirementName)
{
    $usersWithoutRequirements = User::select('users.*')
        ->leftJoin('documents', function ($join) use ($classId) {
            $join->on('users.id', '=', 'documents.created_by')
                ->where('documents.class_id', '=', $classId);
        })
        ->whereNotExists(function ($query) use ($requirementName) {
            $query->select(DB::raw(1))
                ->from('documents as hw')
                ->whereRaw("hw.requirments ILIKE '%$requirementName%'")
                ->whereRaw('hw.created_by = users.id');
        })
        ->whereNotIn('users.user_type', ['1'])
        ->paginate(10);

    return $usersWithoutRequirements;
}



}

