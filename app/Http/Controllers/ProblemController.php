<?php

namespace App\Http\Controllers;
use App\Problem;
use DB;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    
    public function index()
    {
        $problem = Problem::all();
        return view('reports.type',compact('problem'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $problem = new Problem();
        
        $problem->name = $request->input('name');
        $problem->save();
        return view('reports.type')->with('success','บันทึกข้อมูลสำเร็จ');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
