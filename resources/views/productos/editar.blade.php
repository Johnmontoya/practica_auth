@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form action="{{ route('productos.update', $productos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="forNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" 
                    name="nombre" id="forNombre"
                    value="{{ $productos->nombre }}" placeholder="ingrese nombre del producto">
                </div>
                <div class="mb-3">
                    <label for="forDescripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="forDescripcion"
                    rows="3">{{ $productos->descripcion }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="forPrecio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="forPrecio"
                    value="{{ $productos->precio }}" placeholder="ingrese el precio del producto">
                </div>
                <div class="mb-3">                    
                    <label for="forPhoto" class="form-label">Ingrese una imagen</label>
                    <input class="form-control" type="file" name="photo" id="forPhoto">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection