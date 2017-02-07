@extends('layouts.app')

@section('content')

    @if((Auth::user()->token_id)<2)
        <img src="{{asset('image/msekko.png')}}" width="450" height="150" alt="Msekko Logo" >
        <h3>您已经登录了系统，但还没获得用户权限，请联系管理员开通用户权限</h3>
    @else
        <div class="panel-body">
            <!-- 显示验证错误 -->
            @include('errors.errors')
                    <!-- 新任务的表单 -->
            <!-- 增加任务按钮-->
            <div class="container-fluid" style="text-align: center">
                <h2>添加项目</h2>
                <form name="input" action="/task" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <table class="table table-bordered table-condensed">
                        <thead>
                          <tr>
                            <th>类型</th>
                            <th>地址</th>
                            <th>项目</th>
                            <th>用户</th>
                            <th>密码</th>
                            <th>备注</th>
                            <th>提交</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                                <label class="sr-only" for="place">类型选框</label>
                                <select name="team" id="team" class = "form-control" >
                                    <option value="1" >资产库</option>
                                    <option value="3" >密码库</option>
                                    <option value="2" >其他库</option>
                                </select>
                            </td>
                            <td>
                                <label class="sr-only" for="place">地址选框</label>
                                <select name="place" id="place" class = "form-control">
                                    @foreach( $addrs as $addr)
                                        <option value="{{$addr->addr}}" >{{$addr->addr}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <label class="sr-only" for="task-item">项目</label>
                                <input type="text" name="item" id="task-item" value="{{old('item')}}" style=" width:100%">
                            </td>
                            <td>
                                <label class="sr-only" for="task-name2">名字</label>
                                <input type="text" name="name" id="task-name2" value="{{old('name')}}" style=" width:100%">
                            </td>
                            <td>
                                <label class="sr-only" for="password">密码</label>
                                <input type="text" name="password" id="password" value="{{old('password')}}" style=" width:100%">
                            </td>
                            <td>
                                <label class="sr-only" for="others">其他</label>
                                <input type="text" name="others" id="others" value="{{old('others')}}" style=" width:100%">
                            </td>
                            <td><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <!-- 目前任务 -->
        @if (!empty($tasks))
               <h2>目前项目</h2>
                <div class="panel-body text-left">
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
                            <th style="width: 120px;">编辑与删除</th>
                            </tr>
                        </thead>
                        <!-- 表身 -->
                        <tbody>
                        @foreach ($tasks as $task)
                        <tr >
                            <td>{{ $task['team'] }}</td>
                            <td>{{ $task['place'] }}</td>
                            <td>{{ $task['item'] }}</td>
                            <td>{{ $task['name'] }}</td>
                            <td>{{ $task['password'] }}</td>
                            <td>{{ $task['others'] }}</td>
                        <!-- 删除按钮 -->
                            <td>
                                <form  action="/task/{{ $task['id'] }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a class="btn btn-info active" href="/task/{{ $task['id'] }}/edit" >编辑</a>
                                    <button class="btn btn-danger active"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        @else
            <h2>目前项目为空</h2>
        @endif
    @endif
@endsection
