@extends('layouts.app')

@section('title')
Servicios
@endsection

@section('content')
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <h3>Usuario:{{Auth::user()->name}}</h3>
        </div>
    </nav>

<table class="table is-fullwidth">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
    @isset($services)
    @foreach($services as $service)
    <tr>
        <td>{{$service->id}}</td>
        <td>{{$service->name}}</td>
        <td>{{$service->status}}</td>
    </tr>
    @endforeach
    @if($services->isEmpty())
    <tr>
        <td colspan="3"><p>No tiene servicios registrados</p></td>
    </tr>
    @endif
    @endisset
    </tbody>
</table>
@endsection