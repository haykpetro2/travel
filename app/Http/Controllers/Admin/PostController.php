<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->orderByDesc('id')->paginate(10);
        $tags = Tag::query()->orderByDesc('id')->get();
        $categories = Category::query()->orderByDesc('id')->get();
        return view('admin.post.index', compact('posts', 'tags', 'categories'));
    }

    public function create()
    {
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        return view('admin.post.create-post', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        $post = Post::query()->create([
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'title_ru' => $request->input('title_ru'),
            'title_en' => $request->input('title_en'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts/'), $fileName);
            imageConvert(public_path('uploads/posts/'), $fileName, $extension);
            $post->image = $fileName . '.webp';
            $post->save();
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoName = time() + rand(1, 9999999) + rand(1, 9999999) + rand(1, 9999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/posts/photos/'), $photoName);
                imageConvert(public_path('uploads/posts/photos/'), $photoName, $extension);
                $postImages = new PostImage();
                $postImages->post_id = $post->id;
                $postImages->name = $photoName . '.webp';
                $postImages->save();
            }
        }

        if ($request->has('tags')) {
            foreach ($request->input('tags') as $tag) {
                $postTag = new PostTag();
                $postTag->post_id = $post->id;
                $postTag->tag_id = $tag;
                $postTag->save();
            }
        }

        return redirect()->route('post.show', $post->id);
    }

    public function show(\App\Models\Post $post)
    {
        $comments = Comment::query()->where('post_id', $post->id)->orderByDesc('id')->get();
        return view('admin.post.show-post', compact('post', 'comments'));
    }

    public function edit(\App\Models\Post $post)
    {
        $categories = Category::query()->get();
        $tags = Tag::query()->get();
        return view('admin.post.edit-post', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, \App\Models\Post $post)
    {

        $post->update([
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'title_ru' => $request->input('title_ru'),
            'title_en' => $request->input('title_en'),
            'short_description_ru' => $request->input('short_description_ru'),
            'short_description_en' => $request->input('short_description_en'),
            'description_ru' => $request->input('description_ru'),
            'description_en' => $request->input('description_en'),
        ]);

        if ($request->hasFile('image')) {
            try {
                File::delete(public_path('uploads/posts/' . $post->image));
            } catch (\Exception $e) {
            }
            $image = $request->file('image');
            $fileName = time() + rand(1, 99999);
            $extension = $image->getClientOriginalExtension();
            $image->move(public_path('uploads/posts/'), $fileName);
            imageConvert(public_path('uploads/posts/'), $fileName, $extension);
            $post->image = $fileName . '.webp';
            $post->save();
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoName = time() + rand(1, 9999999) + rand(1, 9999999) + rand(1, 9999999);
                $extension = $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/posts/photos/'), $photoName);
                imageConvert(public_path('uploads/posts/photos/'), $photoName, $extension);
                $postImages = new PostImage();
                $postImages->post_id = $post->id;
                $postImages->name = $photoName.'.webp';
                $postImages->save();
            }
        }

        if ($request->has('tags')) {
            PostTag::query()->where('post_id', $post->id)->delete();
            foreach ($request->tags as $tag) {
                $postTag = new PostTag();
                $postTag->post_id = $post->id;
                $postTag->tag_id = $tag;
                $postTag->save();
            }
        } else {
            PostTag::query()->where('post_id', $post->id)->delete();
        }

        return redirect()->route('post.show', $post->id);
    }

    public function photoDelete(Request $request)
    {
        $photo = PostImage::query()->find($request->input('id'));
        try {
            File::delete(public_path('uploads/posts/photos/' . $photo->name));
        } catch (\Exception $e) {
        }
        $photo->delete();

        return response()->json([
            'success' => true,
            'id' => $request->input('id')
        ]);

    }

    public function destroy(\App\Models\Post $post)
    {
        PostTag::query()->where('post_id', $post->id)->delete();
        Comment::query()->where('post_id', $post->id)->delete();


        if (isset($post->photos)) {
            foreach ($post->photos as $photo) {
                try {
                    File::delete(public_path('uploads/posts/photos/' . $photo->name));
                } catch (\Exception $e) {
                }
                $photo->delete();
            }
        }

        try {
            File::delete(public_path('uploads/posts/' . $post->image));
        } catch (\Exception $e) {
        }

        $post->delete();
    }

}
