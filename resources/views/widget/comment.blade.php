<?php
$final_comment_type = $commentable->getCommentType();
?>
@if($final_comment_type == 'raw')
    @include('widget.raw_comment')
@elseif($final_comment_type == 'duoshuo')
    @include('widget.duoshuo_comment')
@elseif($final_comment_type == 'disqus')
    @include('widget.disqus_comment')
@endif