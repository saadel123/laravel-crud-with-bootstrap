<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listemps =Employee::all();
        return view('empmodel',['listemps' => $listemps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp =new Employee();
        $emp->fname=$request->fname;
        $emp->lname=$request->lname;
        $emp->adresse=$request->adresse;
        $emp->mobile=$request->mobile;

        $emp->save();
        return redirect('emp')->with('success','Employee added succussefuly'); 

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'adresse'=>'required',
            'mobile'=>'required',
        ]);
        $emp =Employee::find($id);
        $emp->fname=$request->fname;
        $emp->lname=$request->lname;
        $emp->adresse=$request->adresse;
        $emp->mobile=$request->mobile;

        $emp->save();
        return redirect('emp')->with('success','Employee updated succussefuly'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp =Employee::find($id);
        $emp->delete();
        return redirect('emp')->with('dange','Employee deleted succussefuly'); 
    }
}
