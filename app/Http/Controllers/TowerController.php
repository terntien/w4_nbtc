<?php

namespace App\Http\Controllers;
use App\Tower;
use App\Customer;
use DB;
use Illuminate\Http\Request;

class TowerController extends Controller
{
     public function index()
    {
        $tower = Tower::all();
        $tower = DB::table('towers')
                    ->join('customers', 'customers.id','=','towers.towers_customer')
                        ->join('networks', 'networks.id','=','towers.towers_network')
                            ->select('towers.*','namecus','namenet')
                                ->get();
        return view('towers.index', compact('tower'));
    }
    

    public function selectCus(){
        $list=DB::table('customers')->get();
        $nets=DB::table('networks')->get();
        return view('towers.create',compact('list','nets') );
    }

   

    public function create()
    {
        return view('towers.create');
    }
   


    public function store(Request $request)
    {
        $tower = new tower();
        $tower->towers_customer = $request->input('customer_select');
        $tower->towers_network = $request->input('network_select');
        $tower->towers_sending = $request->input('towers_sending');
        $tower->towers_typeleaf = $request->input('towers_typeleaf');
        $tower->towers_parish = $request->input('towers_parish');
        $tower->towers_district = $request->input('towers_district');
        $tower->towers_pravince = $request->input('towers_pravince');
        $tower->towers_code = $request->input('towers_code');
        $tower->LATDEG = $request->input('LATDEG');
        $tower->LONGDEG = $request->input('LONGDEG');
        $tower->towers_license_code = $request->input('towers_license_code');
        $tower->towers_license_date = $request->input('towers_license_date');
       
        $tower->save();
        return redirect('/towers')->with('success', 'เพิ่มข้อมูลเสาสำเร็จ');
    }



    public function show($id)
    {
        $show = Tower::find($id);
        
        $tower = Tower::find($id);
        $tower = $tower->customer;

        $tower2 = Tower::find($id);
        $tower2 = $tower2->network;

        
        return view('towers.show', compact('tower','tower2','show'));    
    }

    


    public function edit($id)
    {
        $list=DB::table('customers')->get();
        $nets=DB::table('networks')->get();

        $tower = Tower::find($id);
       
        return view('towers.edit' ,compact('tower', 'list','nets')); 
    }

    
    public function update(Request $request, $id)
    {
        $tower = Tower::find($id);
        $tower->towers_customer = $request->get('customer_select');
        $tower->towers_network = $request->get('network_select');
        $tower->towers_sending = $request->get('towers_sending');
        $tower->towers_typeleaf = $request->get('towers_typeleaf');
        $tower->towers_parish = $request->get('towers_parish');
        $tower->towers_district = $request->get('towers_district');
        $tower->towers_pravince = $request->get('towers_pravince');
        $tower->towers_code = $request->get('towers_code');
        $tower->LATDEG = $request->get('LATDEG');
        $tower->LONGDEG = $request->get('LONGDEG');
        $tower->towers_license_code = $request->get('towers_license_code');
        $tower->towers_license_date = $request->get('towers_license_date');
        $tower->save();

        return redirect('/towers')->with('success', 'อัพเดทข้อมูลเสาสำเร็จ');
    
    }
    public function xml(){
        // connect db and query tower
        $tower = DB::table('towers')->get();

        // Start XML file, create parent node
        $dom = new \DOMDocument;
        $node = $dom->createElement("markers");
        $parnode = $dom->appendChild($node);
        
        // header("Content-type: text/xml");

        foreach( $tower as $row){
            $node = $dom->createElement("marker");
            $newnode = $parnode->appendChild($node);
            $newnode->setAttribute("id", $row->id);
            // $newnode->setAttribute("image", $row->towers_image);
            $newnode->setAttribute("typeleaf", $row->towers_typeleaf);
            $newnode->setAttribute("sending", $row->towers_sending);
            $newnode->setAttribute("parish", $row->towers_parish);
            $newnode->setAttribute("district", $row->towers_district);
            $newnode->setAttribute("pravince", $row->towers_pravince);
            $newnode->setAttribute("code", $row->towers_code);
            $newnode->setAttribute("customer", $row->towers_customer);
            $newnode->setAttribute("network", $row->towers_network);
            $newnode->setAttribute("license_code", $row->towers_license_code);
            $newnode->setAttribute("license_date", $row->towers_license_date);
            $newnode->setAttribute("lat", $row->LATDEG);
            $newnode->setAttribute("lng", $row->LONGDEG);
            // $newnode->setAttribute("type", $row->customer_id);
        }

        $xmlfile = $dom->saveXML();
        
        header('Content-Type: application/xml: charset="utf-8"');
        header('Content-Length:' . strlen($xmlfile));
        
        die($xmlfile);
    }

    public function destroy($id)
    {
        $tower = Tower::find($id);
        $tower->delete();

        return redirect('/towers')->with('success', 'ลบข้อมุลเสาสำเร็จ');
    }
}
