<?php

namespace App\Http\Controllers;
use App\Report;
use App\Problem;
use DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
  public function index()
    {

        $report = Report::all();
        return view('reports.dashreport',compact('report'));
    }

    public function selectCus(){
        $list=DB::table('problems')->get();
        return view('reports.report',compact('list') );
    }

    
    public function create()
    {
        return view('reports.report');
    }

    
    public function store(Request $request)
    {
        $report = new Report();

        $report->problem = $request->input('report_select');
        $report->date = $request->input('date');
        $report->detail = $request->input('detail');
        $report->user = $request->input('user');
        $report->address = $request->input('address');
        $report->date = $request->input('date');
        $report->save();
        return redirect('/reports')->with('success','บันทึกการแจ้งปัญหาเรียบร้อย!');
    }

    
    public function show($id)
    {
        $report = Report::all();
        return view('reports.dashreport',compact('report'));
    }

    
    public function edit($id)
    {
        $list=DB::table('report')->get();
        $report = Report::find($id);
        return view('reports.edit', compact('tower','list')); 
    }

    
    public function update(Request $request, $id)
    {
        $report = Report::find($id);

        $report->problem = $request->input('report_select');
        $report->date = $request->input('date');
        $report->detail = $request->input('detail');
        $report->user = $request->input('user');
        $report->address = $request->input('address');
        $report->save();
        return redirect('/reports')->with('success','บันทึกการแจ้งปัญหาเรียบร้อย!');
    }

    
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect('/reports')->with('success','ลบข้อมุลการแจ้งปัญหาสำเร็จ');
    }

}
