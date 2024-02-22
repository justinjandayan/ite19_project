<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\classModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{
    public function list() {

        $data['getRecord'] = classModel::getRecord();
        $data['header_title'] = "Class List";
        return view('admin.class.list',$data);
    }

    public function add()
    {
        
        $data['header_title'] = "Add Admin ";
        return view('admin.class.add',$data);
        
    }

    public function insert(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|unique:class_models,name','regex:/^[A-Z]+$/',
            'status' => 'required',
        ];
    
        // Custom validation messages
        $messages = [
            'name.unique' => 'The Course Code already exists.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect('admin/class/list')
                ->withErrors($validator)
                ->withInput();
        }
    
        // If validation passes, save the data
        $save = new classModel;
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();
    
        return redirect('admin/class/list')->with('success', "Course Code successfully created");
    }
    


    public function edit($id)
    {
        $data['getRecord'] = classModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Class ";
            return view('admin.class.edit',$data);
        }
        else
        {
                abort(404);
        }
        
    }

    public function update($id, Request $request)
    {

        $save = classModel::getSingle($id);

        $rules = [
            
            'status' => 'required',
        ];
        
        
    
        // Custom validation messages
        $messages = [
            'name.unique' => 'The Course Code already exists.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect('admin/class/list')
                ->withErrors($validator)
                ->withInput();
        }

        $save = classModel::getSingle($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->save();

        return redirect('admin/class/list')->with('succes',"Course Code successfully update");
    }

    public function delete($id)
    {
        $user = classModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/class/list')->with('succes',"Course C successfully deleted");
    }


    //facultyside

    public function facultylist() {

        $data['getRecord'] = classModel::getRecord();
        $data['header_title'] = "Course Code List";
        return view('student.class.list',$data);
    }

    public function facultyadd()
    {
        
        $data['header_title'] = "Add Course Code ";
        return view('student.class.add',$data);
        
    }

    public function facultyinsert(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => ['required', 'unique:course_code,name', 'regex:/^[A-Z0-9]+$/'],
            'status' => 'required',
        ];
    
        // Custom validation messages
        $messages = [
            'name.unique' => 'The Course Code already exists.',
            'name.regex' => 'The Course Code must only contain uppercase letters and dont use spaces.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect('student/class/list')
                ->withErrors($validator)
                ->withInput();
        }
    
        // If validation passes, save the data
        $save = new classModel;
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();
    
        return redirect('student/class/list')->with('success', "Course Code successfully created");
    }
    


    public function facultyedit($id)
    {
        $data['getRecord'] = classModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Course Code ";
            return view('student.class.edit',$data);
        }
        else
        {
                abort(404);
        }
        
    }

    public function facultyupdate($id, Request $request)
    {

         // Validation rules
         $rules = [
            
            'status' => 'required',
        ];
    
        // Custom validation messages
        $messages = [
            'name.unique' => 'The Course Code already exists.',
        ];
    
        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect('student/class/list')
                ->withErrors($validator)
                ->withInput();
        }

        $save = classModel::getSingle($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
        $save->save();

        return redirect('student/class/list')->with('succes',"Course Code successfully update");
    }

    public function facultydelete($id)
    {
        $user = classModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('student/class/list')->with('succes',"Course Code successfully deleted");
    }
}
