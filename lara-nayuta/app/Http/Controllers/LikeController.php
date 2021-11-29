<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*この記述でAuthクラスが使えるようになる* */
use App\Like;

class LikeController extends Controller
{
    //
    public function store(Request $request)
    {
        $like = new Like(); //新しくLikeTable作成、$likeで変数化
        $like->post_id = $request->post_id;//LikeTableのtweet_idカラムに数字を入れる
        $like->user_id = Auth::user()->id;
        $like->save();//セーブする
        // return redirect('/timeline');//↓一連が終わったらURLtimelineに戻る
        return back(); //いいえ、paginateによってtimelineのページは複数あるので、URLtimelineだとどこにいても1ページ目に戻ってしまいだめ
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();

        // return redirect('/timeline');
        return back();

    }
}
