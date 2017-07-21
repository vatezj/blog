@extends('layouts.app')
@section('title','分类')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('post.index') }}">博客</a></li>
                    <li class="active">分类</li>
                </ol>
                @include('widget.categories')
            </div>
        </div>
    </div>
@endsection
