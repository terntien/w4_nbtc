<?php

namespace App\Http\Controllers;
use App\Network;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function index()
    {
        $network = Network::all();
        return view('networks.index', compact('network'));
    }


    public function create()
    {
         return view('networks.create');
    }


    public function store(Request $request)
    {
        $network = new Network();
   
        $network->name = $request->input('name');
        $network->code = $request->input('code');
       
       
        $network->save();
        return redirect('/networks')->with('success', ' saved!');
    }



    public function show($id)
    {
        $network = Network::find($id);
        return view('networks.dash', compact('network'));
    }





    public function edit($id)
    { 
        $network = Network::find($id);
        return view('networks.edit', compact('network')); 


    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'     => 'required',
            'code'    => 'required',
            
        ]);

        $network = Network::find($id);
        // $tower->image =  $request->get('image');
        $network->name = $request->get('name');
        $network->code = $request->get('code');
        
        $network->save();

        return redirect('/networks')->with('success', ' updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $network = Network::find($id);
        $network->delete();

        return redirect('/networks')->with('success', ' delete');
    }
}
