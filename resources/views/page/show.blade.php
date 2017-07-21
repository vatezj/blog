@extends('layouts.app')
@section('title',$page->display_name)
@section('keywords',$page->display_name)
@section('description',$page->display_name)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 phone-no-padding">
                <ol class="breadcrumb">
                    <li><a href="{{ route('post.index') }}">博客</a></li>
                    <li class="active">{{ ucfirst($page->display_name) }}</li>
                </ol>
                @can('update',$page)
                    <div class="btn-group">
                        <a class="btn" href="{{ route('page.edit',$page->id) }}"><i class="fa fa-pencil"></i></a>
                    </div>
                @endcan
                <div class="post-detail">
                    <div class="center-block">
                        <div class="post-detail-title">{{ $page->display_name }}</div>
                    </div>
                    <div class="post-detail-content">
                        {!! $page->html_content !!}
                    </div>
                </div>
                @if($page->isShownComment())
                    @include('widget.comment',[
                        'comment_key'=>'page.'.$page->name,
                        'comment_title'=>$page->display_name,
                        'comment_url'=>route('page.show',$page->name),
                        'commentable'=>$page,
                        'comments'=>isset($comments) ? $comments:[],
                        'redirect'=>request()->fullUrl(),
                        'commentable_type'=>'App\Page'])
                @endif
            </div>
        </div>
    </div>
@endsection