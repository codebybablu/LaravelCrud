<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy("id","desc")->paginate(5);
        return view('Student.index', compact('students'));
    }
    
    public function create(){
        return view('Student.create');
    }

    public function store(Request $request){
        $validator  = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Image validation rules
        ]);
        if($validator->passes()){
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->address = $request->input('address');

            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName = time(). '_' . $image->getClientOriginalExtension();
                $image->move(public_path('images/students'), $imageName);
                $student->image = $imageName;
            }

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
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Image validation rules
        ]);        

        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        
        // Handle image upload if an image is provided
        if ($request->hasFile('image')) {
            // Optionally, delete the old image if it exists
            if ($student->image && file_exists(public_path('images/students/' . $student->image))) {
                unlink(public_path('images/students/' . $student->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/students'), $imageName);
            $student->image = $imageName; 
        }
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
