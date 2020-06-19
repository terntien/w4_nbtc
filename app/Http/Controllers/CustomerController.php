<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
     public function index()
    {
        $customer = Customer::all();
        return view('customers.index', compact('customer'));
    }


    public function create()
    {
         return view('customers.create');
    }


    public function store(Request $request)
    {
        $customer = new Customer();
   
        $customer->namecus = $request->input('namecus');
        $customer->codecus = $request->input('codecus');
        $customer->save();
        return redirect('/customers')->with('success', ' saved!');
    }



    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.dash', compact('customer'));
    }





    public function edit($id)
    { 
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer')); 


    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'namecus'    => 'required',
            'codecus'    => 'required',
            
        ]);

        $customer = Customer::find($id);
       
        $customer->namecus = $request->get('namecus');
        $customer->codecus = $request->get('codecus');
        
        $customer->save();

        return redirect('/customers')->with('success', ' updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('customers')->with('success', ' delete');
    }
}
