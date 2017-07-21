@extends('layouts.plain')
@section('content')
    <div id="particles" class="home-color-bg"></div>
    <div class="home-box">
        <h2 title="{{ $site_title or 'title' }}" style="margin: 0;">
            {{ $site_title or '我的个人博客' }}
            <a aria-hidden="true" href="{{ route('post.index') }}">
                <img class="img-circle" src="{{ $avatar or 'https://raw.githubusercontent.com/lufficc/images/master/Xblog/logo.png' }}" alt="{{ $author or 'Author' }}">
            </a>
        </h2>
        <h3 title="{{ $description or 'description' }}" aria-hidden="true" style="margin: 0">
            {{ $description or 'Stay Hungry. Stay Foolish.' }}
        </h3>
        <p class="links">
            <font aria-hidden="true">»</font>
            <a href="{{ route('post.index') }}" aria-label="点击查看博客文章列表">博客</a>
            @foreach($pages as $page)
                <font aria-hidden="true">/</font><a href="{{ route('page.show',$page->name) }}"
                                                    aria-label="查看{{ $author or 'author' }}的{{ $page->display_name }}">{{$page->display_name }}</a>

            @endforeach
        </p>
        <p class="links">
            <font aria-hidden="true">»</font>
            @foreach(config('social') as $key => $value)
                <a href="{{ $value['url'] }}" target="_blank"
                   aria-label="{{ $author or 'author' }} 的 {{ ucfirst($key) }} 地址">
                    <i class="{{ $value['fa'] }}" title="{{ ucfirst($key) }}"></i>
                </a>
            @endforeach
        </p>
    </div>
@endsection

@section('js')
    <script src="//cdn.bootcss.com/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles',
                {particles:{number:{value:20,density:{enable:!0,value_area:1E3}},color:{value:"#e1e1e1"},shape:{type:"circle",stroke:{width:0,color:"#000000"},polygon:{nb_sides:5}},opacity:{value:.5,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:15,random:!0,anim:{enable:!1,
                    speed:180,size_min:.1,sync:!1}},line_linked:{enable:!0,distance:650,color:"#cfcfcf",opacity:.26,width:1},move:{enable:!0,speed:2,direction:"none",random:!0,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:1,mode:"repulse"},onclick:{enable:0,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},
                    push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0}
        );
    </script>
@endsection