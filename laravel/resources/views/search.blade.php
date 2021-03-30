@extends('adminlte::page')

@section('content')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

	<h3>Search Aset</h3>

	<form action="/searchh/cari" method="GET">
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
	Halaman : {{ $assets->currentPage() }} <br/>
	Jumlah Data : {{ $assets->total() }} <br/>
	Data Per Halaman : {{ $assets->perPage() }} <br/>
 
 
	{{ $assets->links() }}
@endsection