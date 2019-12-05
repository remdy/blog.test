<?php

namespace App\Http\Controllers;

use App\About;
use App\Card;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaginateController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', Post::IS_PUBLIC)->paginate(2);

        return view('pages.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $user = Auth::user();

        return view('pages.show', compact('post','user'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->paginate(2);

        return view('pages.list', compact('posts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->paginate(2);

        return view('pages.list', compact('posts'));
    }

    public function about()
    {
        $stories = About::all();

        $cards = Card::all();

        return view('pages.about', compact('stories', 'cards'));
    }
}
