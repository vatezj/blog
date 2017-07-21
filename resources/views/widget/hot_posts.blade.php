<div class="widget widget-default">
    <div class="widget-header"><h6><i class="fa fa-fire fa-fw"></i>热门文章</h6></div>
    <ul class="widget-body hot-posts">
        @foreach($hotPosts as $post)
            <a class="list-group-item" title="{{ $post->title }}" href="{{ route('post.show',$post->slug) }}">
                <span class="badge">{{ $post->view_count.'+'.$post->comments_count }}</span>
                {{ str_limit($post->title,32) }}
                <span class="clearfix"></span>
            </a>
        @endforeach
    </ul>
</div>