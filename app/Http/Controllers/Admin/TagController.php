<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\Tag;

class TagController extends Controller
{
    public function store(Request $request)
    {

        Tag::query()->create([
            'name' => $request->input('name')
        ]);

    }

    public function update(Request $request, \App\Models\Tag $tag)
    {
        $tag->update([
            'name' => $request->input('name')
        ]);
    }

    public function destroy(\App\Models\Tag $tag)
    {
        PostTag::query()->where('tag_id', $tag->id)->delete();
        $tag->delete();
    }

}
