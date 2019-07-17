@extends('layouts.master')

@section('seccion')

    <h4>Buscador de alumnos</h4>

  <form class="form-inline" method="POST" action="{{route('buscador')}}" >
  @csrf
    <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Buscar" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
  
        <form action="{{route('actualizar')}}" method="post">
              @csrf
                  <input type="submit" value="hh">
                    @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
        </form>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">matricula</th>
                <th scope="col">nombre</th>
                <th scope="col">apellidoP</th>
                <th scope="col">estatus</th>
                </tr>
            </thead>
            @if(isset($alumn))
              @foreach($alumn as $item)<!-- El foreach recorre la tabla para encontrar todos sus elementos y los guarda en $item -->
                              <tr> 
                              
                              
                              <td>{{$item->id }}</td> <!-- Es necesario llamar al $item y tomar los datos -->
                              <td> 
                                    <a href="{{route('upload', $item->matricula)}}">
                                       {{$item->matricula}}	
                                    </a> 
                                    	
                              </td>
                              <td>{{$item->nombre}}</td>
                              <td>{{$item->apellidop}}</td> 
                              <td>{{$item->estatus}}</td>
                              </tr>
              @endforeach
            @endif
           
        </table>


@endsection

