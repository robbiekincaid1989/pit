<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsPostCategory;
use App\Models\NewsPost;

class NewsPostController extends Controller
{
    // Fetch a single post
    public function show(NewsPost $post)
    {
        $categories = NewsPostCategory::all();

        return view('newsposts.show', [
            'categories' => $categories,
            'post' => $post
        ]);
    }
}
