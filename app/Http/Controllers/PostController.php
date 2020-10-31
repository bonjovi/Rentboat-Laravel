<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use \Spatie\Tags\HasTags;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();
        $tags = Tag::get();
        return view('blog', compact('posts', 'tags'));
    }

    public function postsbytag($language, $slug) {
        $posts = Post::withAnyTags([$slug])->get();
        $currenttag = $slug;

        $tags = Tag::get();
        return view('blog', compact('posts', 'tags', 'currenttag'));
    }

    public function post($language, $slug) {
        $post = Post::select(
            'posts.*',
            'users.name as user_name'
        )
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->where('slug', $slug)
            ->firstOrFail()->translate($language);

        $post_id = $post->id;

        $tagIds = \DB::table('taggables')
            ->distinct()
            ->select('tag_id')
            ->where('taggable_id', $post->id)
            ->get()
            ->pluck('tag_id');

        $tags = Tag::whereIn('id', $tagIds)->get();

        return view('post', compact('post',  'tags'));
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%$query%")->get();

        return view('blog-searchresults', compact('posts'));
    }
}

