@if(!$recommendedPosts->isEmpty())
    <div class="alert alert-dismissable alert-info"
         style="background-color: #fff;color:inherit;padding:15px 20px 10px;border-color:#ededed;border-radius: 0">
        <button style="margin-right: 20px" type="button" class="close" data-dismiss="alert"
                aria-hidden="true">&times;</button>
        <label>推荐阅读 :</label>
        @foreach($recommendedPosts as $post)
            <div style="padding-top: 5px;padding-bottom: 5px;">
                <a style="font-size: 1.15em" href="{{ route("post.show",$post->slug) }}">{{ str_limit($post->title,36) }}</a>
                <span style="color: #ccc;margin-left: 15px;">{{ $post->created_at->format('Y-m-d') }}</span>
            </div>
        @endforeach
    </div>
@endif