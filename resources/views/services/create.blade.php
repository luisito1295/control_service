@extends('layouts.app')

@section('title')
    Servicios
@endsection

@section('content')

        <form method="POST" action="{{ route('service.store') }}">
            @csrf
            <hr>
                <input name="name"
                       type="text"
                       class="input @error('name') is-danger @enderror"
                       value="{{ old('name') }}{{ isset($service)?$service->name:null }}"
                       placeholder="Nombre del servicio"
                       required
                       autofocus>
               
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

@endsection