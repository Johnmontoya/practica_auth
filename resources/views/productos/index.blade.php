@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/home" class="btn btn-success mb-2">Inicio</a>
            <a href="/productos/crear" class="btn btn-primary mb-2">Agregar</a>
            <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $res)
                        <tr>    
                            <td>{{$res->nombre}}</td>
                            <td>{{$res->descripcion}}</td>
                            <td>{{$res->precio}}</td>
                            <td>
                                <img src="img/productos/{{$res->id}}{{$res->photo}}" width="100"/>
                            </td>
                            <td>

                                <a href="{{ route('productos.edit', $res->id)}}" class="btn btn-success mb-2"> Editar </a>

                                <form action="{{ route('productos.destroy', $res->id)}}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete" class="btn btn-danger">Borrar</a>
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