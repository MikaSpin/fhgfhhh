@extends('layouts.app')
@section('content')
<h1>Comenzando la facturacion</h1>
<a href="{{route('facturas.create')}}" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-plus-fill" viewBox="0 0 16 16">
  <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
  <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM8.5 6.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5a.5.5 0 0 1 1 0Z"/>
</svg> Nuevo</a>
<div class="container">
<table class="table">
  <tr>
    <th>#</th>
    <th>Factura</th>
    <th>Fecha</th>
    <th>Cliente</th>
    <th>Acciones</th>
  </tr>
  @foreach($facturas as $f)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$f->fac_no}}</td>
    <td>{{$f->fac_fecha}}</td>
    <td>{{$f->cli_id}}</td>
    <td>
      <a href="{{route('facturas.edit',$f->fac_id)}}">Editar</a>
    </td>
  </tr>
  @endforeach
</table>
</div>
@endsection