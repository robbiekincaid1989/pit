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
        $posts = NewsPost::when(request('newscategory_id'), function($query) {
            $query->where('newscategory_id', request('category_id'));
        })->latest()->get();

        return view('welcome', [
            'categories' => $categories,
            'newsposts' => $posts
        ]);
    }
}
