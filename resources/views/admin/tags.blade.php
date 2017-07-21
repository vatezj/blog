@extends('admin.layouts.app')
@section('title','标签')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-tags fa-fw"></i>标签</h6>
                </div>
                <div class="widget-body">
                    <a class="btn pull-right" role="button" data-toggle="modal" data-target="#add-tag-modal">
                        <i class="fa fa-tag"></i>
                    </a>
                    <table class="table table-striped table-hover table-bordered table-responsive" style="overflow: auto">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>文章</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->posts_count }}</td>
                                <td>
                                    <button type="submit"
                                            class="btn btn-danger swal-dialog-target"
                                            data-dialog-msg="确定删除{{ $tag->name }}？"
                                            data-url="{{ route('tag.destroy',$tag->id) }}"
                                            title="删除">
                                        <i class="fa fa-trash-o fa-fw"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modals.add-tag-modal')
@endsection
