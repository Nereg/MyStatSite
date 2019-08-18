    @extends('layouts.app')

@section('content')
<style>
.Photo
{
    height:100px;
}
</style>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Место</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фотка</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($Top as $top)
                 <tr>
                    <th scope="row">{{$top->Place}}</th>
                    <td>{{$top->Name}}</td>
                    <td><img class="Photo" src="{{$top->Photo}}"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection