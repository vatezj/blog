@extends('layouts.app')
@section('title','项目')
@section('content')
    <div class="container">
        <div id="repo-template" style="display:none">
            <div class="col-md-4 col-sm-6">
                <div class="widget widget-default">
                    <div class="widget-header">
                        <a href="[repo.html_url]" target="_blank" class="collection-card-image geopattern"
                           data-pattern-id="[repo.name]">
                            <h3 class="collection-card-title" style="white-space: nowrap;text-overflow: ellipsis;">[repo.name]</h3>
                        </a>
                    </div>
                    <div class="widget-body"
                         style=" height: 9em;overflow : hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-box-orient: vertical;">
                        <p>[repo.description]</p>
                    </div>
                    <div class="widget-footer">
                        <div class="widget-meta">
                        <span class="meta-item">
                            <i class="fa fa-code"></i>
                            [repo.language]
                        </span>
                            <span class="meta-item">
                            <i class="fa fa-star"></i>
                            [repo.stargazers_count]
                        </span>
                            <span class="meta-item">
                            <i class="fa fa-code-fork"></i>
                            [repo.forks_count]
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="projects row">
            <div class="center-block">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                <h3>加载中...</h3>
            </div>
        </div>
    </div>
@endsection