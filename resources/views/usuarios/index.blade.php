@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/home" class="btn btn-success mb-2">Inicio</a>
            <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $res)
                        <tr>    
                            <td>{{$res->name}}</td>
                            <td>{{$res->email}}</td>
                            <td>

                                <form action="{{ route('usuarios.destroy', $res->id)}}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete">Borrar</a>
                                </form>                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection