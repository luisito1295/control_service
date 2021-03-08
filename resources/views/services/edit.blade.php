@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')
    @if(auth()->user()->rol_id=='1')
        <form method="POST" action="{{ route('service.update', $service->id)}}">
            {{csrf_field()}}
            {!! method_field('PUT') !!}
            <hr>
                <input name="name"
                    type="text"
                    class="input @error('name') is-danger @enderror"
                    value="{{ old('name') }}{{ isset($service)?$service->name:null }}"
                    placeholder="Nombre del servicio"
                    required
                    autofocus>
                <br>
                <br>
                <span class="select is-fullwidth @error('status') is-danger @enderror">
                    <select name="status">
                    <option selected disabled>Estado del servicio</option>
                    <option value="1">habilitar</option>
                    <option value="0">Deshabilitado</option>
                    </select>
                </span>
            <hr>
            <div class="field">
                <p class="control">
                    <button class="btn btn-success">Guardar</button>
                </p>
            </div>
        </form>
    @else
        <h1>No se puede</h1>
    @endif

@endsection