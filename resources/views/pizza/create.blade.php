@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menú</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">View</a>
                            <a href="#" class="list-group-item list-group-item-action">Create</a>
                        </ul>
                    </div>
                </div>
                @if(count($errors)>0)
                    <div class="card mt-5">
                        <div class="card-body">

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pizza</div>
                    <form   action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Nombre de la pizza</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción de la pizza</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Precio ($)</label>
                            <input type="number" name="small_price" class="form-control" placeholder="Pizza chica">
                            <input type="number" name="medium_price" class="form-control" placeholder="Pizza mediana">
                            <input type="number" name="large_price" class="form-control" placeholder="Pizza grande">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoría</label>
                            <select name="category" class="form-control">
                                <option value="">Selecciona una opción</option>
                                <option value="vegetrian">Vegetariana</option>
                                <option value="nonvegetarian">No vegetariana</option>
                                <option value="traditional">Tradicional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <br>
                            <br>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </div>

                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
