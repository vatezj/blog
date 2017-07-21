@forelse($comments as $comment)
    <div class="comment">
        <div class="pull-left">
            <?php
            if ($comment->user_id) {
                $href = route('user.show', $comment->username);
            } else {
                $href = $comment->site ? httpUrl($comment->site) : 'javascript:void(0);';
            }
            $imgSrc = $comment->user ? $comment->user->avatar : config('app.avatar');
            $imgSrc = processImageViewUrl($imgSrc, 40, 40);
            ?>
            <a name="comment{{ $loop->index + 1 }}" href="{{ $href }}">
                <img width="40px" height="40px" class="img-circle"
                     src="{{ $imgSrc }}">
            </a>
        </div>
        <div class="comment-info">
            <div class="comment-head">
                <span class="name">
                    <a href="{{ $href }}">{{ $comment->username }}</a>
                    @if(isAdminById($comment->user_id))
                        <label class="role-label">博主</label>
                    @endif
                </span>
                <span class="comment-operation pull-right">
                    <a href="#comment{{ $loop->index + 1 }}"
                       style="color: #ccc;font-size: 12px">#{{ $loop->index	+ 1 }}</a>
            </span>
            </div>
            <div class="comment-time">
                <span>{{ $comment->created_at->format('Y-m-d H:i') }}</span>
            </div>
            <div class="comment-content">
                {!! $comment->html_content !!}
            </div>
            <div class="comment-operation">
                @can('manager',$comment)
                    <a class="comment-operation-item swal-dialog-target"
                       title="删除"
                       href="javascript:void (0)"
                       data-dialog-msg="删除这条评论？"
                       data-url="{{ route('comment.destroy',$comment->id) }}">
                        删除
                    </a>
                    <a class="comment-operation-item"
                       title="编辑"
                       href="{{ route('comment.edit',[$comment->id,'redirect'=>(isset($redirect) && $redirect.'#'.$loop->index ? $redirect : '')]) }}">
                        编辑
                    </a>
                @endcan
                <a class="comment-operation-item"
                   title="回复"
                   href="javascript:void (0);"
                   onclick="replySomeone('{{ $comment->username }}')">
                    回复
                </a>
            </div>
        </div>
    </div>
@empty
    <p class="meta-item center-block" style="padding:10px">暂无评论~~</p>
@endforelse
