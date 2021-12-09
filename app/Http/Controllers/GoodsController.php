<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsReviews;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    public function save(Request $request){
        $good= new Goods;
        $good->name=request('name');
        $good->type=request('type');
        $good->manufacturer=request('manufacturer');
        $good->description=request('description');
        $request->validate(['image'=>'required|image|mimes:jpg,png,jpeg,svg|max:10240']);
        $good->image=$request->file('image')->store('public/images');
        $good->save();
        if(request('shops_1') === NULL){$shops_1= 0;} else {$shops_1=1;}
        if(request('shops_2') === NULL){$shops_2= 0;} else {$shops_2=1;}
        if(request('shops_3') === NULL){$shops_3= 0;} else {$shops_3=1;}
        if(request('shops_4') === NULL){$shops_4= 0;} else {$shops_4=1;}
        $good->shops()->attach([1=>['available' => $shops_1],
        2=>['available' => $shops_2],
        3=>['available' => $shops_3],
        4=>['available' => $shops_4]]);
        return redirect('/goods');
        
    }

    public function index(){
        $good= Goods::all();
        return view('goods', ['goods' =>$good]);
    }

    public function filter(){
        $type=request('type');
        $good= Goods::where('type',$type)->get();
        return view('goods',['goods'=>$good]);
    }

    public function destroy($id){
        $good = Goods::findOrFail($id);
        Storage::delete($good->image);
        $good->shops()->detach();
        $good->delete();
        return redirect('/goods');
    }

    public function edit($id){
        $good = Goods::findOrFail($id);
        return view('edit', ['good'=>$good]);
    }
    
    public function update($id, Request $request){
        $good = Goods::findOrFail($id);
        $good->name=request('name');
        $good->type=request('type');
        $good->manufacturer=request('manufacturer');
        $good->description=request('description');
        if(!empty(request('image'))){
            $request->validate(['image'=>'required|image|mimes:jpg,png,jpeg,svg|max:10240']);
            Storage::delete($good->image);
            $good->image=$request->file('image')->store('public/images');
        }
        $good->save();
        $good->shops()->detach();
        if(request('shops_1') === NULL){$shops_1= 0;} else {$shops_1=1;}
        if(request('shops_2') === NULL){$shops_2= 0;} else {$shops_2=1;}
        if(request('shops_3') === NULL){$shops_3= 0;} else {$shops_3=1;}
        if(request('shops_4') === NULL){$shops_4= 0;} else {$shops_4=1;}
        $good->shops()->attach([1=>['available' => $shops_1],
        2=>['available' => $shops_2],
        3=>['available' => $shops_3],
        4=>['available' => $shops_4]]);
        return redirect('/goods/'.$id);
    }

    public function show($id){
        $good = Goods::findOrFail($id);
        $reviews = $good->reviews; 
        return view('show', ['good'=>$good, 'reviews'=>$reviews]);
    }
}
