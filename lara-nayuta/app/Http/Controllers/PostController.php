<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /*この記述でAuthクラスが使えるようになる* */
use App\Post;

class PostController extends Controller
{
    //
    public function showTimelinePage()/*この関数が動いたら　←Roteのweb.phpで定義してる*/
    {
        $posts = Post::latest()->simplePaginate(10); //3つだけ取ってくる、->get()なら全部取ってくる
        // $posts = Post::latest()->get();
        return view('timeline',['posts' => $posts]); /*たら、view('')を動かすよ timeline.blade.phpは手動で作成 */
        //⬆︎$postsの中身をtimeline.blade.phpに渡す処理
    }


    public function postContent(Request $request)
    {
        $validator = $request->validate([
            'post' => ['required','string','max:200'],
        ]);/*tweetは絶対必要（空はだめ）、文字で入力、max200文字までという指定 */

        // LikeController.phpのl11、= new Likeでも作れる;
        Post::create([
            'user_id' => Auth::user()->id,
            'post'    => $request->post, /*formメゾットのname="post"のデータを持ってくる*/

            'rnd-1'   => rand(1,5),
            'rnd-2'   => rand(1,5),
            'rnd-3'   => rand(1,5),

            'now-x'   => 1,
            'now-like'=> 1,
            'now-num' => 1,
            'now-dig' => 1,
            'runstop' => 1,
        ]);
        return back();/*リクエストを送ったページに戻る */
    } 

    public function destroy($id)
    {
        // dd($id);
        $post = Post::find($id);
        $post->delete();

        // return redirect()->route('timeline');
        return back();
    }
}

// $table->integer('rnd-1');
// $table->integer('rnd-2');
// $table->integer('rnd-3');

// $table->integer('now-x');
// $table->integer('now-like');
// $table->integer('now-num'); /*0001~9999 */
// $table->integer('now-dig'); /*1,2,3で */
// $table->boolean('runstop'); /*trueでいいね機構動く */
