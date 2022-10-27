<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDesignation=DB::table('designations')->get();
        return view('admin.designation.index',compact('userDesignation'));
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
            'designation'=>'required | unique:designations',
        ]);
        $data=array(
            'designation'=>$request->designation,
        );
        DB::table('designations')->insert($data);
        return redirect()->back()->with('success','successfully created');
    }
    //create store
    public function create(){
        return view('admin.designation.store');
    }
    //designation delete
    public function delete($id){
        DB::table('designations')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully deleted');
    }

    //edit designation
    public function edit($id){
        $data=DB::table('designations')->where('id',$id)->first();
        return view('admin.designation.edit',compact('data'));
    }
    //update designation
    public function updatedeg(Request $request ,$id){
        $request->validate([
            'designation'=>'required | unique:designations',
        ]);
        $data=array(
            'designation'=>$request->designation,
        );
        DB::table('designations')->where('id',$id)->update($data);
        return redirect()->back()->with('success','successfully updated');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
