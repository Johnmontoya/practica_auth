@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="forNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="forNombre" placeholder="ingrese nombre del producto">
                </div>
                <div class="mb-3">
                    <label for="forDescripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" name="descripcion" id="forDescripcion" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="forPrecio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="forPrecio" placeholder="ingrese el precio del producto">
                </div>
                <div class="mb-3">
                    <label for="forPhoto" class="form-label">Ingrese una imagen</label>
                    <input class="form-control" type="file" name="photo" id="forPhoto">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
