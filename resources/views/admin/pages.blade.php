@extends('admin.layouts.app')
@section('title','页面')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-file fa-fw"></i>页面</h6>
                </div>
                <div class="widget-body">
                    <a class="btn pull-right" href="{{ route('page.create') }}">
                        <i class="fa fa-file"></i>
                    </a>
                    @if($pages->isEmpty())
                        <div class="center-block">No pages.</div>
                    @else
                        <table class="table table-striped table-hover table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>名称</th>
                                <th>url</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->display_name }}</td>
                                    <td>/{{ $page->name }}</td>
                                    <td>
                                        <div>

                                            <a href="{{ route('page.edit',$page->id) }}"
                                               data-toggle="tooltip" data-placement="top" title="编辑"
                                               class="btn btn-info">
                                                <i class="fa fa-pencil fa-fw"></i>
                                            </a>
                                            <a href="/{{ $page->name }}"
                                               data-toggle="tooltip" data-placement="top" title="查看"
                                               class="btn btn-success">
                                                <i class="fa fa-eye fa-fw"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
