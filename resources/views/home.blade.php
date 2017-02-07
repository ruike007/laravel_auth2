@extends('layouts.app')
        <!-- 设备查询页面 -->
@section('content')

@if((Auth::user()->token_id)<=0)
    <img src="{{asset('image/msekko.png')}}" width="450" height="150" alt="Msekko Logo" >
    <h3>您已经登录了系统，但还没获得用户权限，请联系管理员开通用户权限</h3>
@else
    <!-- 目前任务 -->
    @if (!empty($tasks))
        <h2>目前项目</h2>
        <div >
            <div class="panel-body">
                <table class="table table-bordered table-hover">

                    <!-- 表头 -->
                    <thead>
                    <tr>
                        <th>类型</th>
                        <th>地址</th>
                        <th>项目</th>
                        <th>用户</th>
                        <th>密码</th>
                        <th>备注</th>
                    </tr>
                    </thead>
                    <!-- 表身 -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task['team'] }}</td>
                            <td>{{ $task['place'] }}</td>
                            <td>{{ $task['item'] }}</td>
                            <td>{{ $task['name'] }}</td>
                            <td>{{ $task['password'] }}</td>
                            <td>{{ $task['others'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h2>目前项目为空</h2>
    @endif
@endif
@endsection
