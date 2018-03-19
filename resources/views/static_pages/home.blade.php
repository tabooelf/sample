@extends('layouts.default')
@section('title', 'Home')
@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>
                <h3>最新动态</h3>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info',['user' => Auth::user()])
                </section>
            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">这里帝国的首页</p>
            <p>从这里开始,并不代表结束</p>
            <p><a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">用户注册</a></p>
        </div>
    @endif

@endsection