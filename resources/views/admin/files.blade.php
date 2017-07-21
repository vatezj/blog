@extends('admin.layouts.app')
@section('title','文件')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-file fa-fw"></i>文件</h6>
                </div>
                <div class="widget-body">
                    <form role="form" class="form-horizontal" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="js">
                        <div class="form-group">
                            <label class="col-xs-2 col-xs-offset-1 control-label">
                                Js
                            </label>
                            <div class="col-xs-6">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-primary">
                                    上传
                                </button>
                            </div>
                        </div>
                    </form>

                    <form role="form" class="form-horizontal" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="css">

                        <div class="form-group">
                            <label class="col-xs-2 col-xs-offset-1 control-label">
                                Css
                            </label>
                            <div class="col-xs-6">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-primary">
                                    上传
                                </button>
                            </div>
                        </div>
                    </form>
                    <form role="form" class="form-horizontal" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="type" value="font">

                        <div class="form-group">
                            <label class="col-xs-2 col-xs-offset-1 control-label">
                                Font
                            </label>
                            <div class="col-xs-6">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-primary">
                                    上传
                                </button>
                            </div>
                        </div>
                    </form>

                    <form role="form" class="form-horizontal" action="{{ route('upload.file') }}"
                          enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-xs-2 col-xs-offset-1 control-label">
                                其他文件（如文章附件）
                            </label>
                            <div class="col-xs-6">
                                <input class="form-control" type="file" name="file">
                            </div>
                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-primary">
                                    上传
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="col-sm-10 col-sm-offset-1 mt-30">
                        <table class="table table-hover table-bordered table-responsive">
                            <tbody>
                            @forelse($files as $file)
                                <tr>
                                    <td>{{ $file->type }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>
                                        <button id="clipboard-btn" class="btn btn-default"
                                                type="button"
                                                data-clipboard-text="{{ getUrlByFileName($file->key) }}"
                                                data-toggle="tooltip"
                                                data-placement="left"
                                                title="Copied">
                                            <i class="fa fa-copy fa-fw"></i>
                                        </button>
                                        <a class="btn btn-info"
                                           href="{{ getUrlByFileName($file->key) }}"
                                                data-method="delete">
                                            <i class="fa fa-cloud-download fa-fw"></i>
                                        </a>
                                        <button class="btn btn-danger swal-dialog-target"
                                                data-dialog-msg="确定删除{{ $file->key }}？"
                                                data-url="{{ route('delete.file').'?key='.$file->key."&type=".$file->type }}">
                                            <i class="fa fa-trash-o fa-fw"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="//cdn.bootcss.com/clipboard.js/1.5.12/clipboard.min.js"></script>
    <script>
        new Clipboard('.btn');
        $('.btn').tooltip({
            trigger: 'click',
        });
    </script>
@endsection
