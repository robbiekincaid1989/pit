@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-10">
            @foreach ($newsposts as $post)
                <div>
                    <article>
                        <a href="{{ route('posts.show', $post->id) }}"><h5>{{ $post->title }}</h5></a>
                        <p>Posted on {{ $post->created_at }}. Posted in {{ $post->newspostcategory_id }}.</p>
                        <p>{{ $post->content }}</p>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="col-2">
            <aside class="categories">
                <h4>News Categories</h4>
                <ul class="nav flex-column">
                @foreach($categories as $category)
                    <li><a href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
                </ul>
            </aside>
        </div>
    </div>
</div>

@endsection