<div class="comments" id="comments">
    <div class="comments-body">
        <div class="ds-thread" data-thread-key="{{ $comment_key }}" data-title="请替换成文章的标题" data-url="{{ $comment_url }}"></div>
        <script type="text/javascript">
            var duoshuoQuery = {short_name:'{{ $duoshuo_shortname }}'};
            (function() {
                var ds = document.createElement('script');
                ds.type = 'text/javascript';ds.async = true;
                ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                ds.charset = 'UTF-8';
                (document.getElementsByTagName('head')[0]
                || document.getElementsByTagName('body')[0]).appendChild(ds);
            })();
        </script>
    </div>
</div>