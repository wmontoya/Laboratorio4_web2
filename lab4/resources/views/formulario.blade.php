@extends('plantillas.base')

@section('titulo', 'Laboratorio 4')

@section('menu')
    @parent

    <nav style="--bs-breadcrumb-divider: '>'; background: white !important; " aria-label="breadcrumb" class ="blancoletras">
		<div class="row m-2">
		<div class ="col-10">
			<ol class="breadcrumb m-auto">
				<li class="breadcrumb-item"><a href="#">Inicio</a></li>
				<li class="breadcrumb-item active" aria-current="page">Productos</li>
			</ol>
		</div>
		<div class ="col-2 text-end">
		<form method="post" id="frm_salir" name="frm_salir" action="{{ route('salir') }}">
                @csrf
			<button type="submit" class="btn btn-danger" >Cerrar Sesión</button>
		</form>	
		</div>
		</div>
	
	</nav>
@endsection

@section('contenido')

	<div class="row">
		<div class ="col-6">
			<form method="post" id="frm_productos" name="frm_productos" action="insertar">
				{{ csrf_field() }}

				<div class="card" >
				<div class="card-header">
					Manejo de Productos
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<div class="row">
							<div class ="col-4">
								<label>C&oacute;digo:</label>
							</div>	
							<div class ="col-8">
								<input  type="text" class="campo_texto" maxlength="8" value="" tabindex="1" id="txt_cod" name="txt_cod">	
							</div>	
						</div>
						
						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class ="col-4">
								<label>Nombre:</label>
							</div>	
							<div class ="col-8">
								<input  type="text" class="campo_texto" maxlength="64" value="" tabindex="2" id="txt_nom" name="txt_nom">	
							</div>	
						</div>
						
						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class ="col-4">
								<label>Precio:</label>
							</div>	
							<div class ="col-8">
								<input  type="text" class="campo_texto" maxlength="11" value="" tabindex="3" id="txt_prec" name="txt_prec">	
							</div>	
						</div>
						
						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class ="col-4">
								<label>Cantidad:</label>
							</div>	
							<div class ="col-8">
								<input  type="text" class="campo_texto" maxlength="11" value="" tabindex="4" id="txt_cant" name="txt_cant">	
							</div>	
						</div>
						
					</li>
					<li class="list-group-item">
					@auth
					<div class="row">
							<div class ="col-6">
								<input class="campo_texto" type="submit" value="Guardar" name="btn_guardar" tabindex="5">
							</div>	
							<div class ="col-6">
								<input class="campo_texto"  type="submit" value="Eliminar" name="btn_eliminar" tabindex="6">	
							</div>	
						</div>
						
						
					@endauth
					</li>

				</ul>
				</div>

			</form>
		</div>
		<div class ="col-6">
			<div class="card">
				<div class="card-body">
					<form method="post" id="frm_busqueda" name="frm_busqueda">
						<input class="campo_texto" type="text" value="" placeholder="Nombre o Código del Producto" size="50" name="txt_busq" id="txt_busq" tabindex="7">
					</form>
					<div id="resultados">
						<table id="grid" class="table table-striped">
							<thead>
								<tr>
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
							@isset($productos)
								@foreach ($productos as $producto)
									<tr>
										<td>{{ $producto->codigo }}</td>
										<td>{{ $producto->nombre }}</td>
										<td>{{ $producto->precio }}</td>
										<td>{{ $producto->cantidad }}</td>
									</tr>
								@endforeach
							@endisset
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>



	<span id="msjbox" style="color: #F00;"></span>
@endsection
