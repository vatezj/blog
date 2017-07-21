@can('manager',$user)

    <form method="post" action="{{ route('user.upload.avatar') }}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="patch">
        {{--<img class="img-thumbnail" src="{{ $user->avatar }}" width="256" height="256">--}}
        <div class="form-group">
            <label class="control-label">修改头像：</label>
            <input type="file" class="form-control" name="image" required="">
        </div>
        <button class="btn btn-primary" id="upload-button" type="submit">上传头像</button>
    </form>

    <form class="mt-30" method="post" action="{{ route('user.upload.profile') }}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="patch">
        <div class="form-group">
            <label>修改简介图片：</label>
            <input class="form-control" type="file" name="image" required="">
        </div>
        <button class="btn btn-primary" id="upload-button" type="submit">上传简介图片</button>
    </form>

    @if(!$user->github_id)
        <div class="form-group mt-30">
            <a style="text-decoration: none" class="btn btn-primary" href="{{ route('github.login') }}">
                绑定<i class="fa fa-github fa-lg fa-fw"></i>
            </a>
        </div>
    @endif

    <div class="alone-divider"></div>
    <form class="mt-30" action="{{ route('user.update.info') }}" method="post">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="patch">
        <div class="form-group">
            <label>名称：</label>
            <input class="form-control" name="name" type="text" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label>真实姓名：</label>
            <input class="form-control" name="real_name" type="text" value="{{ $user->real_name }}">
        </div>
        <div class="form-group">
            <label>个人网站：</label>
            <input class="form-control" name="website" type="text" value="{{ $user->website }}">
        </div>
        <div class="form-group">
            <label>描述：</label>
            <input class="form-control" name="description" type="text" value="{{ $user->description }}">
        </div>
        <div class="form-group">
            <label>Github：</label>
            <input {{ $user->github_id ? "readonly=''" : '' }} class="form-control" name="github" type="text"
                   value="{{ array_safe_get($user->meta,'github') }}">
        </div>
        <div class="form-group">
            <label>Facebook：</label>
            <input class="form-control" name="facebook" type="text"
                   value="{{ array_safe_get($user->meta,'facebook') }}">
        </div>
        <div class="form-group">
            <label>Weibo：</label>
            <input class="form-control" name="weibo" type="text" value="{{ array_safe_get($user->meta,'weibo') }}">
        </div>
        <div class="form-group">
            <label>Twitter：</label>
            <input class="form-control" name="twitter" type="text" value="{{ array_safe_get($user->meta,'twitter') }}">
        </div>
        <input type="submit" class="btn btn-primary" value="修改">
    </form>
@endcan
