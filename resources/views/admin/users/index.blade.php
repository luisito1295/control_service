@extends('layouts.app')

@section('title')
    Panel de administración
@endsection

@section('content')
    <table class="table is-fullwidth">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Estado</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @isset($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->gender}}</td>
                    <td>
                        <form method="post" action="{{route('admin.users.update', [$user->id])}}" id="formUserStatus{{$user->id}}">
                            @csrf
                            @method('PUT')
                            <div class="field" onclick="document.getElementById('formUserStatus{{$user->id}}').submit()">
                                <input id="switchRoundedSuccess{{$user->id}}" type="checkbox" name="status" class="switch is-rounded is-success" {{$user->status?'checked':null}}>
                                <label for="switchRoundedSuccess{{$user->id}}"></label>
                            </div>
                        </form>
                    </td>
                    <td>{{--<a href="{{route('admin.services.index', ['id'=>$user->id])}}" class="button is-info">Ver servicios</a>--}}</td>

                </tr>
            @endforeach
            @if($users->isEmpty())
                <tr>
                    <td colspan="3"><p>No hay usuarios registrados</p></td>
                </tr>
            @endif
        @endisset
        </tbody>
    </table>
@endsection