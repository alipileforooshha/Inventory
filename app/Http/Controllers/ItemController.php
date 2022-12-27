<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        foreach($items as $item){
            // dd(Jalalian::fromDateTime(Carbon::parse($item->created_at))->format('Y-m-d'));
            // $item->created_at = 2;
            // $item->created_at = Jalalian::fromCarbon(Carbon::parse($item->created_at))->format('Y-m-d');
            $item->created_at = Jalalian::fromDateTime(Carbon::parse($item->created_at))->format('Y-m-d');
            // dd($item->created_at);
        }
        return view('dashboard',['items'=>$items]);
    }
    
    public function store(Request $request){
        // dd($request->all());
        if(!isset($request->is_vaghf))
            $request->is_vaghf = 0;
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'location' => 'required'
        ]);
        
        $item = Item::create([
            'name' => $request->name,
            'code' => $request->code,
            'location' => $request->location,
            'is_vaghf' => $request->is_vaghf
        ]);
        
        if($item){
            return redirect('/dashboard');
        }else{
            return back();
        }
    }
    
    public function update($id, Request $request){
        // dd($request->all());
        $item = Item::findOrFail($id);
        $result = $item->update($request->all());
        if($result){
            return redirect('/dashboard');
        }
    }
    
    public function delete($id){
        $item = Item::findOrFail($id);
        $result = $item->delete();
        if($result){
            return redirect('/dashboard');
        }
    }
    
    public function search(Request $request)
    {
        // dd($request->all());
        $items = Item::Search($request->name, $request->code, $request->location, $request->is_vaghf);
        return view('dashboard',['items'=>$items]);
    }
}
