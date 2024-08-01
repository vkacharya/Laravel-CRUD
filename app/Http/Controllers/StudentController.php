<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $students = DB::table('students')->Paginate(10);
        return view('pages.crud-students.index', ['students' => $students]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $students = DB::table('students');
        return view('pages.crud-students.add-edit', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:students,email|email',
                'mobile' => 'required|numeric',
                'city' => 'required'
            ]
        );
        $students = DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'MoNumber' => $request->mobile,
            'city' => $request->city
        ]);
        if ($students) {
            return redirect()->route('students.index')->with('status', 'student added succesfully');
            ;
        }

    }

    /**
     * Display the specified resource.
     */

    public function edit($id)
    {
        $students = DB::table('students')->find($id);

        return view('pages.crud-students.add-edit', ['students' => $students]);
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'city' => 'required'
            ]
        );
        $students = DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'MoNumber' => $request->mobile,
            'city' => $request->city
        ]);
        if ($students) {
            return redirect()->route('students.index')->with('status', 'student updated succesfully');
            ;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $students = DB::table('students')->where('id', $id)->delete();
        if ($students) {
            return redirect()->route('students.index')->with('status', 'student deleted succesfully');
            ;
        }

    }

    // public function addStudent(StudentRequest $req)
    // {
    //     // $req->validate(
    //     //     [
    //     //         'name' => 'required',
    //     //         'email' => 'required|email',
    //     //         'mobile' => 'required|numeric|size:10',
    //     //         'city' => 'required'
    //     //     ],
    //     //     [
    //     //         // to show custom validation for specific forms
    //     //         "email.email" => "email id is not valid"
    //     //     ]
    //     // );
    //     return $req->all();

    // }
}
