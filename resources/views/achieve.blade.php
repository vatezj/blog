@extends('layouts.app')
@section('title','归档')
@section('content')
    <div class="container">
        @if($posts_count)
            <div class="posts-count">共{{ $posts_count }}篇文章</div>
            <div id="cd-timeline" class="cd-container" style="margin: 0 0">
                @foreach($posts as $post)
                    <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-picture">
                        </div>
                        <div class="cd-timeline-content">
                            <a href="{{ route('post.show',$post->slug) }}">
                                <div class="title">{{ $post->title }}</div>
                            </a>
                            <span class="cd-date">{{ $post->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="dot"></div>
        @else
            <p class="meta-item center-block">No posts.</p>
        @endif

    </div>
@endsection