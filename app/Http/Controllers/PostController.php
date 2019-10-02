<?php

namespace App\Http\Controllers;

use App\Models\Background;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()
            ->where('status', 1)
            ->orderByDesc('id')
            ->paginate(5);
        $background = Background::query()->where('page', 'blog')->first();
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        return view('blog.index', compact('posts', 'categories', 'tags', 'background'));
    }

    public function detail($id)
    {
        $post = Post::with(['tags', 'photos', 'comments'])->find($id);
        $tags = Tag::query()->get();
        $categories = Category::query()->get();
        return view('blog.detail', compact('post', 'tags', 'categories'));
    }

    public function filter(Request $request)
    {
        $id = $request->input('id');
        if ($id == 'all') {
            $posts = Post::query()
                ->where('status', 1)
                ->orderByDesc('id')
                ->get();
            return View::make('blog.result', compact('posts'));
        } else {
            $posts = Post::query()
                ->where('status', 1)
                ->where('category_id', $id)
                ->orderByDesc('id')
                ->get();
            return View::make('blog.result', compact('posts'));
        }
    }

    public function tag(Request $request)
    {
        $id = $request->input('id');
        $tags = PostTag::query()->where('tag_id', $id)->get();
        foreach ($tags as $tag) {
            $ids[] = $tag->post_id;
        }
        $posts = Post::query()->where(function ($q) use ($ids) {
            $q->whereIn('id', $ids);
        })->get();
        return View::make('blog.result', compact('posts'));
    }


}
