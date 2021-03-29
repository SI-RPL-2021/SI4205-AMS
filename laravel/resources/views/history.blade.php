@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>History Aset</h1>
@stop

@section('content')
<table border="1">
		<tr>
			<th>Nama</th>
			<th>id</th>
			<th>Kategori</th>
			<th>Status</th>
		</tr>
		@foreach($assets as $p)
		<tr>
			<td>{{ $p->name }}</td>
			<td>{{ $p->id }}</td>
			<td>{{ $p->asset_category }}</td>
			<td>{{ $p->status }}</td>
		</tr>
		@endforeach
	</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop