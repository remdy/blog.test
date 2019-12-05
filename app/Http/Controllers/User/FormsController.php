<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts_id = Post::all()->pluck('id');
        foreach ($posts_id as $key => $value){
            $result[] = $value;
        }

        $posts = Post::find($result)->where('user_id','==', Auth::id());

        return view('user.forms.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');
        return view('user.forms.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::add($request->all());
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tag'));
        $post->status = 0;
        $post->save();

        return redirect()->route('forms.index')->with('status', 'Ваш прост будет рассмотрен модераторами и вскоре добавлен!');
    }

}
