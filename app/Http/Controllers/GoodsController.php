<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsReviews;
use Illuminate\Support\Facades\Storage;
use App\Models\Shops;

class GoodsController extends Controller
{
    public function create(){
        return view('createGoods', ['shops'=>Shops::all()]);
    }

    public function save(Request $request){
        $good= new Goods;
        $good->name=request('name');
        $good->type=request('type');
        $good->manufacturer=request('manufacturer');
        $good->description=request('description');
        $request->validate(['image'=>'required|image|mimes:jpg,png,jpeg,svg|max:10240']);
        $good->image=$request->file('image')->store('public/images');
        $good->price=request('price');
        $good->save();
        $shops = Shops::all();
        foreach ($shops as $shop){
            $available = request('shops_'.$shop->id);
            $good->shops()->attach($shop->id,['available' => $available]);
        }
        
        return redirect ('/goods');
        
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
        unlink(storage_path('app/'.$good->image));
        $good->shops()->detach();
        $reviews=GoodsReviews::where('goods_id',$id);
        $reviews->delete();
        $good->delete();
        return redirect('/goods');
    }

    public function edit($id){
        $good = Goods::findOrFail($id);
        return view('edit', ['good'=>$good,'shops'=>Shops::all()]);
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
        $good->price=request('price');
        $good->save();
        $good->shops()->detach();
        $shops = Shops::all();
        foreach ($shops as $shop){
            $available = request('shops_'.$shop->id);
            $good->shops()->attach($shop->id,['available' => $available]);
        }
        return redirect('/goods/'.$id);
    }

    public function show($id){
        $good = Goods::findOrFail($id);
        $reviews = $good->reviews; 
        return view('show', ['good'=>$good, 'reviews'=>$reviews]);
    }
}
