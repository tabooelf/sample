@extends('layouts.default')
@section('title', 'Home')
@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">这里帝国的首页</p>
        <p>从这里开始,并不代表结束</p>
        <p><a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">用户注册</a></p>
    </div>
@endsection