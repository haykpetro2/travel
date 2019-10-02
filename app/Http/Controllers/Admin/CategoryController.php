<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\PostTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function store(Request $request)
    {
        Category::query()->create([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);
    }

    public function update(Request $request, \App\Models\Category $category)
    {
        $category->update([
            'name_ru' => $request->input('name_ru'),
            'name_en' => $request->input('name_en'),
        ]);
    }

    public function destroy(\App\Models\Category $category)
    {

        if (isset($category->posts)) {
            foreach ($category->posts as $post) {

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
        $category->delete();
    }
}
