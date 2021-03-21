@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session :: has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif

           
       
        <a href="{{url('empleado/create')}}" class="btn btn-success">Registrar nuevo empleado</a>
        <br>
        <br>

        <!--SEARCH EMPLOYES-->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <br>

        <table>
            <thead class="p-3 mx-auto bg-primary text-dark">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <thebody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{$empleado->id}}</td>
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">
                        </td>

                        <td>{{$empleado->Nombre}}</td>
                        <td>{{$empleado->ApellidoPaterno}}</td>
                        <td>{{$empleado->ApellidoMaterno}}</td>
                        <td>{{$empleado->Correo}}</td>
                        <td>{{$empleado->Direccion}}</td>
                        <td>
                        
                        <a href="{{url ( '/empleado/'.$empleado->id.'/edit' )}}" class="btn btn-warning">
                            Editar
                        </a>
                        
                        <form action="{{url( '/empleado/'.$empleado->id )}}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                                <input type="submit" 
                                    onclick="return confirm('¿Quieres Borrar?')" 
                                    value="Borrar"
                                    class="btn btn-danger">
                        </form>
                        </td>
                    </tr>
                @endforeach
            </thebody>
        </table>
        {!! $empleados->links() !!}
    </div>
@endsection