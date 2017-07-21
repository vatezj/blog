@extends('admin.layouts.app')
@section('title','文章')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-sticky-note fa-fw"></i>文章</h6>
                </div>
                <div class="widget-body">
                    <table class="table table-hover table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>状态</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <?php
                            $class = '';
                            $status = '未发表';
                            if ($post->trashed()) {
                                $class = 'danger';
                                $status = 'Deleted';
                            } else if ($post->isPublished()) {
                                $class = 'success';
                                $status = '已发表';
                            }
                            ?>
                            <tr class="{{ $class }}">
                                <td title="{{ $post->title }}">{{ str_limit($post->title,64) }}</td>
                                <td>{{ $status }}</td>
                                <td>
                                    <div>
                                        <a {{ $post->trashed()?'disabled':'' }} href="{{ $post->trashed()?'javascript:void(0)':route('post.edit',$post->id) }}"
                                           data-toggle="tooltip" data-placement="top" title="编辑"
                                           class="btn btn-info">
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>
                                        @if($post->trashed())
                                            <form style="display: inline" method="post"
                                                  action="{{ route('post.restore',$post->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="恢复">
                                                    <i class="fa fa-repeat fa-fw"></i>
                                                </button>
                                            </form>

                                        @elseif($post->isPublished())
                                            <a href="{{ route('post.show',$post->slug) }}"
                                               data-toggle="tooltip" data-placement="top" title="查看"
                                               class="btn btn-success">
                                                <i class="fa fa-eye fa-fw"></i>
                                            </a>
                                            <form style="display: inline" method="post"
                                                  action="{{ route('post.publish',$post->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-warning" data-toggle="tooltip"
                                                        data-placement="top" title="撤销发布">
                                                    <i class="fa fa-undo fa-fw"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('post.preview',$post->slug) }}" data-toggle="tooltip"
                                               data-placement="top" title="预览"
                                               class="btn btn-default">
                                                <i class="fa fa-eye fa-fw"></i>
                                            </a>
                                            <form style="display: inline" method="post"
                                                  action="{{ route('post.publish',$post->id) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-default" data-toggle="tooltip"
                                                        data-placement="top" title="发布">
                                                    <i class="fa fa-send-o fa-fw"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <button class="btn btn-danger swal-dialog-target"
                                                data-title="{{ $post->title }}"
                                                data-dialog-msg="确定删除文章<label>{{ $post->title }}</label>？"
                                                title="删除"
                                                data-dialog-enable-html="1"
                                                data-url="{{ route('post.destroy',$post->id) }}"
                                                data-dialog-confirm-text="{{ $post->trashed()?'删除(这将永久刪除)':'删除' }}">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                        </button>
                                        <a class="btn btn-default" href="{{ route('post.download',$post->id) }}">
                                            <i class="fa fa-cloud-download fa-fw"></i>
                                        </a>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                操作
                                                <span class="caret"></span>
                                            </button>
                                            <?php $commentable = $post?>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @if($commentable->allowComment())
                                                        <a href="#" data-url="{{ route('post.config',$post->id) }}"
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="禁止评论"
                                                           data-request-data="allow_resource_comment=false"
                                                           class="swal-dialog-target">
                                                            禁止评论
                                                        </a>
                                                    @else
                                                        <a href="#" data-url="{{ route('post.config',$post->id) }}"
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="允许评论"
                                                           data-request-data="allow_resource_comment=true"
                                                           class="swal-dialog-target">
                                                            允许评论
                                                        </a>
                                                    @endif
                                                    @if($commentable->isShownComment())
                                                        <a href="#" data-url="{{ route('post.config',$post->id) }}"
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="不显示评论"
                                                           data-request-data="comment_info=force_disable"
                                                           class="swal-dialog-target">
                                                            不显示评论
                                                        </a>
                                                    @else
                                                        <a href="#" data-url="{{ route('post.config',$post->id) }}"
                                                           data-method="post"
                                                           data-enable-ajax="1"
                                                           data-dialog-title="显示评论"
                                                           data-request-data="comment_info=force_enable"
                                                           class="swal-dialog-target">
                                                            显示评论
                                                        </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

