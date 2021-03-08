@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')

    <p class="level-item float-left ml-5"><a href="{{route('service.create')}}" class="btn btn-success ">Nuevo</a></p>
    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>status</th>
                <th>Opcciones</th>
            </tr>
        </thead>
        <tbody>
            @isset($services)
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->name}}</td>
                        <td>{{$service->status}}</td>
                        <td>
                            <form style="display: inline" method="POST" action="{{ route('service.destroy', $service->id) }}">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!} 
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                            <br>
                            <br>
                            <a style="display: inline" class="btn btn-warning" href="{{route('service.edit', $service->id)}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
                @if($services->isEmpty())
                    <tr>
                        <td colspan="3"><p>No tienes servicios registrados</p></td>
                    </tr>
                @endif
            @endisset
        </tbody>
    </table>    
@endsection