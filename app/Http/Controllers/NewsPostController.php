<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsPostRequest;
use App\Models\NewsPost;
use App\Models\NewsPostCategory;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsposts = NewsPost::with('newscategory')->get();

        return view('newsposts.index', [
            'newsposts' => $newsposts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form to create a news post
        $categories = NewsPostCategory::all();

        return view('newsposts.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsPostRequest $request)
    {
        // Assign the user_id of the currently signed in user
        $user = Auth()->user()->id;

        // Store the newly created news post
        NewsPost::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'newscategory_id' => $request->input('newscategory_id'),
            'user_id' => $user
        ]);

        return redirect()->route('newsposts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newsPost)
    {
        // Show a single news post
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newspost)
    {
        // Show the form to edit a news post entry
        $categories = NewsPostCategory::all();

        return view('newsposts.edit', [
            'categories' => $categories,
            'newspost' => $newspost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsPostRequest $request, NewsPost $newspost)
    {
        // Store the updated news post entry
        $newspost->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'newscategory_id' => $request->input('newscategory_id')
        ]);

        return redirect()->route('newsposts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newspost)
    {
        // Delete the specified news post
        $newspost->delete();

        return redirect()->route('newsposts.index');
    }
}
