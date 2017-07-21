@extends('layouts.app')
@section('title','标签')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('post.index') }}">博客</a></li>
                    <li class="active">标签</li>
                </ol>
                @include('widget.tags')
            </div>
        </div>
    </div>
@endsection
