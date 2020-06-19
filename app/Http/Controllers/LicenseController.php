<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;
use DB;
class LicenseController extends Controller
{
    public function index()
    {
        $license = License::all();
        return view('licenses.index', compact('license'));
    }


    public function create()
    {
         return view('licenses.index');
    }


    public function store(Request $request)
    {
        $license = new license();
   
        $license->heading = $request->input('heading');
        $license->url = $request->input('url');
       
       
        $license->save();
        return redirect('/licenses')->with('success', ' saved!');
    }



    public function show($id)
    {
        $license = License::find($id);
        return view('licenses.index', compact('license'));
    }





    public function edit($id)
    { 
        $license = License::find($id);
        return view('licenses.edit', compact('license')); 


    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'heading'     => 'required',
            'url'    => 'required',
            
        ]);

        $license = License::find($id);
        $license->heading = $request->get('heading');
        $license->url = $request->get('url');
        
        $license->save();

        return redirect('/licenses')->with('success', ' updated!');
    
    }

    
    public function destroy($id)
    {
        $license = License::find($id);
        $license->delete();

        return redirect('/licenses')->with('success', ' delete');
    }
}
