@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-95px">
			<div class="card-header">
				<div class="row ml-auto">
					
					<h1 style="font-family:Optima;font-size: 30px;">Lista de clientes</h1>

					<div style="margin-left: 91.5%;margin-top: -4%;">
						<a href="{{route('clientes.create')}}" style="height:38px;" name="btn_nuevo" class="btn btn-outline-success">Nuevo</a>
					</div>

					<div style="margin-left: -2.9%;" class="row card-body">
						<table class="table">
							<thead class="table-dark">
								<th>#</th>
								<th>Apellido</th>
								<th>Nombre</th>
								<th>Cédula</th>
								<th>Correo</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Acciones</th>
							</thead>
							@foreach($clientes as $cli)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$cli->cli_apellido}}</td>
								<td>{{$cli->cli_nombre}}</td>
								<td>{{$cli->cli_cedula}}</td>
								<td>{{$cli->email}}</td>
								<td>{{$cli->cli_direccion}}</td>
								<td>{{$cli->cli_telefono}}</td>
								<td>

									<div class="row">
										
										<a class="btn btn-outline-info" style="color: #217AC6; margin-left: 2%" href="{{route('clientes.edit',$cli->cli_id)}}" class="btn btn-primary">Editar</a>

										<a class="btn btn-outline-secondary" style="margin-left: 2%;" href=" {{route('vehiculo',$cli->cli_id)}} ">Vehiculo</a>
										
										<form style="margin-left: 2%" action="{{route('clientes.destroy',$cli->cli_id)}}" method="POST" onsubmit="return confirm('Desea eliminar?')">
											@csrf     
											<button class="btn btn-outline-danger">Eliminar</button>
										</form>
									</div>

								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
