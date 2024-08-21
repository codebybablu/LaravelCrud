<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy("id","desc")->paginate(10);
        return view('Student.index', compact('students'));
    }
    
    public function create(){
        return view('Student.create');
    }

    public function store(Request $request){
        $validator  = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string',
            'address' => 'required|string|max:255'
        ]);
        if($validator->passes()){
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->address = $request->input('address');
            $student->save();
            return redirect()->route('index');
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
    
    public function edit($id){
        $student = Student::find($id);
        return view('Student.edit',  compact('student'));
    }
    
    public function update(Request $request,$id){
        
        $student = Student::find($id);

        $validator  = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string',
            'address' => 'required|string|max:255'
        ]);        

        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->save();
        return redirect()->route('index');
    }
    
    public function destroy($id){
        $student = Student::find($id);
        if($student){
            $student->delete();
        }
        return redirect()->route('index');
    }
}
