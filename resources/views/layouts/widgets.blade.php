@include('widget.user')
@if(XblogConfig::getValue('enable_hot_posts') == 'true')
    @include('widget.hot_posts')
@endif
@include('widget.categories')
@include('widget.tags')