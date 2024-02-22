<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classModel;
use App\Models\HomeworkModel;
use App\Models\Requirments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Validator;




class HomeworkController extends Controller
{
    public function list()
    {
        $data['getRecord']= HomeworkModel::getRecord();
        $data['header_title'] = "Homework";
        return view('admin.homework.list', $data);
    }

    public function secondsemlist()
    {
        $data['getRecord']= HomeworkModel::getRecordsecondsem();
        $data['header_title'] = "Homework";
        return view('admin.homework.list/secondsem', $data);
    }

    public function add()
    {
      
        $data['getClass'] = classModel::getClass();
        $data['header_title'] = "Add New Homework";
        return view('admin.homework.add', $data);
    }

    public function insert(Request $request)
    {

        $homework = new HomeworkModel;
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);
        $homework->created_by = Auth::user()->id;

        if ($request->hasFile('document_file') && $request->file('document_file')->isValid()) 
        {
            $file = $request->file('document_file');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/homework');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/list')->with('succes',"Homework Successfully Created");
    }



public function edit($id)
    {
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = classModel::getClass();
        $data['header_title'] = "Edit Homework";
        return view('admin.homework.edit', $data);
    }

    public function update(Request $request,$id)
    {

        $homework = HomeworkModel::getSingle($id);
        $homework->class_id = trim($request->class_id);
        $homework->subject_id = trim($request->subject_id);
        $homework->homework_date = trim($request->homework_date);
        $homework->submission_date = trim($request->submission_date);
        $homework->description = trim($request->description);


        if ($request->hasFile('document_file') && $request->file('document_file')->isValid()) 
        {
            $file = $request->file('document_file');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
    
            $uploadPath = public_path('upload/homework');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $homework->document_file = $filename;
        }

        $homework->save();

        return redirect('admin/homework/list')->with('succes',"Homework Successfully Updated");
    }
    
    public function delete($id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->is_delete= 1;
        $homework->save();

        return redirect()->back()->with('succes',"Homework Successfully Deleted");
    }

    public function notsubmitted(Request $request, $requirments)
    {
        $classId = $request->input('class_id');
      
        $usersWithoutRequirements = HomeworkModel::getUsersWithoutRequirements($classId, $requirments);
    
        $data['getRecord'] = $usersWithoutRequirements;
        $data['header_title'] = "Faculty Not Submitted";
    
        return view('admin.homework.notsubmitted', $data);
    }
    

    //Student Side 



    public function facultylist()
    {
        $data['getRecord']= HomeworkModel::facultygetRecord();
        $data['header_title'] = "Homework";
        return view('student.homework.list', $data);
    }

    public function facultyadd()
    {
      
        $data['getClass'] = classModel::getClass();
        $data['getRequirments'] = Requirments::getRequirments();
        $data['header_title'] = "Add New Homework";
        return view('student.homework.add', $data);
    }

    public function facultyinsert(Request $request)
{
    // Validation rules
    $rules = [
        'program' => 'required|uppercase',
        'class_id' => 'required',
        'section' => 'required|uppercase',
        'requirments' => 'required',
        'semester' => 'required',
        
       ];

    // Validation messages
    $messages = [
        'program.required' => 'The program field is required.',
        'program.uppercase' => 'The program field must contain uppercase letters.',
        'section.required' => 'The section field is required.',
        'section.uppercase' => 'The section field must contain uppercase letters.',
        // Add messages for other fields as needed
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules, $messages);

    // Check if the validation fails
    if ($validator->fails()) {
        return redirect('student/homework/list')->withErrors($validator)->withInput();
    }

    $homework = new HomeworkModel;
    $homework->program = trim($request->program);
    $homework->class_id = trim($request->class_id);
    $homework->section = trim($request->section);
    $homework->requirments = trim($request->requirments);
    $homework->semester = trim($request->semester);
    $homework->description = trim($request->description);
    $homework->created_by = Auth::user()->id;

    if ($request->hasFile('document_file') && $request->file('document_file')->isValid()) 
    {
        $file = $request->file('document_file');
        $ext = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName(); // Use the original filename
    
        $uploadPath = public_path('upload/homework');
    
        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);
    
        $homework->document_file = $filename;
    }

    $homework->save();

    return redirect('student/homework/list')->with('success', "Document Successfully Created");
}



public function facultyedit($id)
    {
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] = $getRecord;
        $data['getClass'] = classModel::getClass();
        $data['getRequirments'] = Requirments::getRequirments();
        $data['header_title'] = "Edit Homework";
        return view('student.homework.edit', $data);
    }

    public function facultyupdate(Request $request, $id)
{
    // Validation rules
    $rules = [
        'program' => 'required|uppercase',
        'class_id' => 'required',
        'section' => 'required|uppercase',
        'requirments' => 'required',
        'semester' => 'required',
        
       ];

    // Validation messages
    $messages = [
        'program.required' => 'The program field is required.',
        'program.uppercase' => 'The program field must contain uppercase letters.',
        'section.required' => 'The section field is required.',
        'section.uppercase' => 'The section field must contain uppercase letters.',
        // Add messages for other fields as needed
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules, $messages);

    // Check if the validation fails
    if ($validator->fails()) {
        return redirect('student/homework/list')->withErrors($validator)->withInput();
    }
    
    $homework = HomeworkModel::getSingle($id);
    $homework->program = trim($request->program);
    $homework->class_id = trim($request->class_id);
    $homework->section = trim($request->section);
    $homework->requirments = trim($request->requirments);
    $homework->semester = trim($request->semester);
    $homework->description = trim($request->description);

    if ($request->hasFile('document_file') && $request->file('document_file')->isValid()) 
    {
        $file = $request->file('document_file');
        $ext = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName(); // Use the original filename

        $uploadPath = public_path('upload/homework');

        // Store the file in the 'C:\xampp\htdocs\school.com\upload\profile' directory using the Storage facade.
        $file->move($uploadPath, $filename);

        $homework->document_file = $filename;
    }

    $homework->save();

    return redirect('student/homework/list')->with('success', "Documents Successfully Updated");
}

    
    public function facultydelete($id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->is_delete= 1;
        $homework->save();

        return redirect()->back()->with('succes',"Documents Successfully Deleted");
    }


    public function accept(Request $request, string $id)
{
    $documents = HomeworkModel::findOrFail($id);
    
    $documents->status = 'accepted';
    $documents->save();

    return redirect()->back()->with('succes',"Documents Successfully Accepted");
}

public function decline(Request $request, string $id)
{
    $documents = HomeworkModel::findOrFail($id);
    
    $documents->status = 'declined';
    $documents->save();

    return redirect()->back()->with('succes',"Documents Successfully Decline");
}

}

