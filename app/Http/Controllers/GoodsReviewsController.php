<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\GoodsReviews;

class GoodsReviewsController extends Controller
{
    public function store($id){
        $good = Goods::FindOrFail($id);

        if ($good){
            $review_name = request('name');
            $review_comment = request('comment');
            if ($review_name && $review_comment){
                $review =new GoodsReviews();
                $review->name = $review_name;
                $review->comment = $review_comment;
                $review->goods()->associate($good);
                $review->save();
                return redirect('goods/'.$good->id);

            }

        } 
    }

    public function destroy($id){
        $review = GoodsReviews::findOrFail($id);
        $review->delete();
        return back();
    }
}
