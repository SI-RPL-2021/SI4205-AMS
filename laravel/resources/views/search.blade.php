@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h3>Search Aset</h3>

	<form action="/aset/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari aset .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
		
	<br/>
 
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
 
	<br/>
	Halaman : {{ $aset->currentPage() }} <br/>
	Jumlah Data : {{ $aset->total() }} <br/>
	Data Per Halaman : {{ $aset->perPage() }} <br/>
 
 
	{{ $aset->links() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop