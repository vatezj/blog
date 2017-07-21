@extends('admin.layouts.app')
@section('title','用户')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-user fa-fw"></i>用户</h6>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-hover table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>注册日期</th>
                            <th>邮箱</th>
                            <th>来源</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if(isAdminById($user->id))
                                    <td>{{ $user->id }}<span class="role-label">Admin</span></td>
                                @else
                                    <td>{{ $user->id }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('user.show',$user->name) }}">{{ $user->name }}</a>
                                    @if($user->github_id)
                                        <a href="https://github.com/{{ $user->github_name }}"> [GitHub]</a>
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                <td>{{ $user->register_from }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($users->lastPage() > 1)
                        {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
