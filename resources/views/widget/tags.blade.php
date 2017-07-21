<div class="widget widget-default">
    <div class="widget-header"><h6><i class="fa fa-tags fa-fw"></i>标签</h6></div>
    <ul class="widget-body">
        <div class="tag-list">
            @forelse($tags as $tag)
                @if(str_contains(urldecode(request()->getPathInfo()),'tag/'.$tag->name))
                    <span class="tag tag-active" title="{{ $tag->name }}">
                        {{ $tag->name }}
                        <span class="badge badge-active">{{ $tag->posts_count }}</span>
                    </span>
                @else
                    <a  title="{{ $tag->name }}" href="{{ route('tag.show',$tag->name) }}" class="tag">
                        {{ $tag->name }}
                        <span class="badge">{{ $tag->posts_count }}</span>
                    </a>
                @endif
            @empty <p class="meta-item center-block">No tags.</p>
            @endforelse
        </div>
    </ul>
</div>