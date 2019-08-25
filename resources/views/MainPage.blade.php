@extends('layouts.app')
@section('pageTitle', 'Главная Страница')
@section('content')
<style>
.FirstBody
{
    background-image: url("{{url('/')}}/img/laptop.jpg");
    background-size: cover;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: auto;
    background-attachment: fixed;
}
.Logo > img
{
    margin-top: 100px;
}
.FirstTop
{
    max-width: 400px;
}
.list-group-item
{
    background-color: transparent;
    font-size: 24px;
    border: 2px solid rgba(0,0,0,.31);
}
.list-group-item > a
{
    color: black;
}
.list-group-item:hover
{
    background-color: #00000017;
}
.Spacer
{
    max-width: 400px;
}
.Photo
{
    width: 100px;
    border-radius: 100px;
    margin-left: 10px;
    margin-right: 10px;
}
.tableHeader:hover
{
    background-color: transparent;
}
.row
{
    margin-right: 0px;
}
</style>
<div class="FirstBody">
    <div class="Logo text-center">
        <img src="https://mystat.itstep.org/assets/images/logo.png">
    </div>
    <div class="TopsContainer Container">
        <div class="row">
            <div class="FirstTop col-sm">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center tableHeader"><a href="{{url('/GroupTop')}}">Топ группы</a></li>
                    @foreach ($First as $top)
                    @if ($loop->iteration == 6)
                    @break
                    @else
                <li class="list-group-item text-center">{{$top->Place}}<img src='{{$top->Photo}}' class="Photo" onerror="this.onerror=null;this.src='https://mystat.itstep.org/assets/resources/profile.svg?v=67734166db7ccc381ee701f2a11ac7db';"><div>{{$top->Name}}</div></li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm Spacer">
            </div>
            <div class="SecondTop">
                    <ul class="list-group list-group-flush">
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center tableHeader"><a href="{{url('/ClassTop')}}">Топ потока</a></li>
                                    @foreach ($Second as $top)
                                    @if ($loop->iteration == 6)
                                    @break
                                    @else
                                <li class="list-group-item text-center">{{$top->Place}}<img src='{{$top->Photo}}' class="Photo" onerror="this.onerror=null;this.src='https://mystat.itstep.org/assets/resources/profile.svg?v=67734166db7ccc381ee701f2a11ac7db';"><div>{{$top->Name}}</div></li>
                                    @endif
                                    @endforeach
                                </ul>
                    </ul>
            </div>
        </div>
    </div>
    <div class="Platforms Conatiner text-center">
        <div class="row">
            <div class="col-sm">
                <a href="https://discordapp.com/oauth2/authorize?client_id=575955014263111690&scope=bot&permissions=0" target="_blank">
                    <div class="PlatformImg"><i class="fab fa-discord  fa-3x" style="color: white;"></i></div>
                    <div class="PlatformText" style="color: white;">Дискорд бот</div>
                </a>
            </div>
            <div class="col-sm">
                <div class="PlatformImg"><i class="fab fa-chrome  fa-3x" style="color: white;"></i></div>
                <div class="PlatformText" style="color: white;">Разширение для Chrome (скоро)</div>
            </div>
            <div class="col-sm">
                <div class="PlatformImg"><i class="fab fa-firefox  fa-3x" style="color: white;"></i></div>
                <div class="PlatformText" style="color: white;">Разширение для Firefox (скоро)</div>
            </div>
        </div>
    </div>
    <div class="oneMoreThing Conatiner text-center" style="padding-bottom: 10px;">
        <h1 style="color:white; margin-top:10px; margin-bottom:10px;">А также</h1>
            <div class="row">
                <div class="col-sm">
                    <a href="{{url('/DiscordServer')}}" target="_blank">
                        <div class="PlatformImg"><i class="fab fa-discord  fa-3x" style="color: white;"></i></div>
                        <div class="PlatformText" style="color: white;">Дискорд сервер</div>
                    </a>
                </div>
                <div class="col-sm">
                    <div class="PlatformImg"><i class="fas fa-money-bill fa-3x" style="color: white;"></i></div>
                    <div class="PlatformText" style="color: white;">Если хочешь можешь поддержать проект !</div>
                </div>
            </div>
        </div>
</div>
<!--
<div class="SecondBody">
    <div class="NewsContainer">
        <div class="News">

        </div>
    </div>
</div>
-->
@endsection