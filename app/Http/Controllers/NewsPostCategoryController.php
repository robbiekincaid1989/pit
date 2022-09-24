<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsCategoryRequest;
use App\Models\NewsPostCategory;
use Illuminate\Http\Request;

class NewsPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = NewsPostCategory::all();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the create category form
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsCategoryRequest $request)
    {
        // Store the category name
        $category = new NewsPostCategory;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPostCategory  $newsPostCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPostCategory $newsPostCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPostCategory  $newsPostCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPostCategory $category)
    {
        // Display the edit form
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPostCategory  $newsPostCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPostCategory $category)
    {
        // Update the category from the form entry
        $category->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPostCategory  $newsPostCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPostCategory $category)
    {
        // Delete the selected category
        $category->delete();
        return redirect()->route('categories.index');
    }
}
