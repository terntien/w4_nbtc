<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Law;
class LawController extends Controller
{
     public function index()
    {
        $law = Law::all();
        return view('laws.index', compact('law'));
    }


    public function create()
    {
         return view('laws.index');
    }


    public function store(Request $request)
    {
        $law = new law();
   
        $law->heading = $request->input('heading');
        $law->url = $request->input('url');
       
       
        $law->save();
        return redirect('/laws')->with('success', ' saved!');
    }



    public function show($id)
    {
        $law = Law::find($id);
        return view('laws.index', compact('law'));
    }





    public function edit($id)
    { 
        $law = Law::find($id);
        return view('laws.edit', compact('law')); 


    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'heading'     => 'required',
            'url'    => 'required',
            
        ]);

        $law = Law::find($id);
        $law->heading = $request->get('heading');
        $law->url = $request->get('url');
        
        $law->save();

        return redirect('/laws')->with('success', ' updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $law = Law::find($id);
        $law->delete();

        return redirect('/laws')->with('success', ' delete');
    }
}
