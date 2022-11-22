@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Listado
                        <a href="{{ route('pizza.create') }}">
                            <button class="btn btn-success" style="float: right;">Agregar Pizza</button>
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Precio chica</th>
                                    <th scope="col">Precio meidana</th>
                                    <th scope="col">Precio grande</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $pizzas as $key => $pizza )
                                <tr>
                                    <th scope="row"{{ $key+1 }}></th>
                                    <td><img src="{{ Storage::url($pizza->image) }}" width="80" alt=""> </td>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ $pizza->description }}</td>
                                    <td>{{ $pizza->category }}</td>
                                    <td>{{ $pizza->small_price }}</td>
                                    <td>{{ $pizza->medium_price }}</td>
                                    <td>{{ $pizza->large_price }}</td>
                                    <td>
                                        <a href="{{ route('pizza.edit', $pizza->id) }}">
                                            <button class="btn btn-primary">Editar</button>
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Eliminar</button>
                                        </form>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pizzas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
