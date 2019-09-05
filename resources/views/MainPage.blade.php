@extends('layouts.app')
@section('pageTitle', 'Главная Страница')
@section('CssFile','test.css')
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
.AdvContainer
{
    margin-top: 10px;
}
.row
{
    margin-right: 0px;
}
.FirstElement
{
    background-color: gray;
}
.SecondElement
{
    color: white;
    text-align: left;
}

.AdvContainer > row
{
    max-width: 200px;
}
.PlusImg
{
    width: 200px;
}
.PlusHeader
{
    font-size: 20px;
    font-weight: bold;
}
.plus
{
    margin-bottom: 10px;
}
</style>
<div class="FirstBody">
    <div class="Logo text-center">
        <img src="https://mystat.itstep.org/assets/images/logo.png">
    </div>
    <div class='container AdvContainer text-center'>
        <div class="row plus">
            <div class="col-sm FirstElement">
                <img src="img/testimage.bmp" class="PlusImg">
            </div>
            <div class="col-sm SecondElement">
                <div class="PlusHeader">Заголовок</div>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
            <div class="col">
            </div>
        </div>
        <div class="row plus">
            <div class="col">
            </div>
            <div class="col-sm SecondElement">
            <div class="PlusHeader">Заголовок</div>
                    orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
            <div class="col-sm FirstElement">
                <img src="img/testimage.bmp" class="PlusImg">
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
@endsection