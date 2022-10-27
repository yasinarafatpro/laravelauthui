<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=DB::table('employees')->orderBy('employee_id','ASC')->get();
        return view('admin.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designations=DB::table('designations')->get();
        return view('admin.employee.create',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation_id'=>'required',
            'name'=>'required',
            'employee_id'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $data=array(
            'designation_id'=>$request->designation_id,
            'name'=>$request->name,
            'employee_id'=>$request->employee_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        );
        DB::table('employees')->insert($data);
        return redirect()->back()->with('success','successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=DB::table('employees')->where('id',$id)->first();
        return Response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designations=DB::table('designations')->get();
        $employee=DB::table('employees')->where('id',$id)->first();
        return view('admin.employee.edit',compact('designations','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'designation_id'=>'required',
            'name'=>'required',
            'employee_id'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $data=array(
            'designation_id'=>$request->designation_id,
            'name'=>$request->name,
            'employee_id'=>$request->employee_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        );
        DB::table('employees')->where('id',$id)->update($data);
        return redirect()->route('employees.index')->with('success','successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Db::table('employees')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully deleted');
    }
}
