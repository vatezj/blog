@extends('admin.layouts.app')
@section('title','分类')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-folder fa-fw"></i>分类</h6>
                </div>
                <div class="widget-body">
                    <a class="btn pull-right" role="button" data-toggle="modal" data-target="#add-category-modal">
                        <i class="fa fa-folder-o"></i>
                    </a>
                    <table class="table table-hover table-striped table-bordered table-responsive" style="overflow: auto">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>日期</th>
                            <th>文章</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                <td>{{ $category->posts_count }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info"
                                           data-toggle="tooltip" data-placement="top" title="编辑">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>
                                        <button class="btn btn-danger swal-dialog-target"
                                                data-toggle="tooltip" data-placement="top" title="删除"
                                                data-url="{{ route('category.destroy',$category->id) }}"
                                                data-dialog-msg="删除{{ $category->name }}?">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.modals.add-category-modal')
@endsection