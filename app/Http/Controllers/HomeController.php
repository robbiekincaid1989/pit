<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsPost;
use App\Models\NewsPostCategory;
class HomeController extends Controller
{
    // Display the Home Page
    public function index()
    {
        $categories = NewsPostCategory::all();
        $posts = NewsPost::when(request('category_id'), function($query) {
            $query->where('blogcategory_id', request('category_id'));
        })->latest()->get();

        return view('index', [
            'categories' => $categories,
            'newsposts' => $posts
        ]);
    }
}
