@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
<br>
@stop

@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <br>
    <!-- First modal dialog -->
    <div class="modal fade" id="modal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-lg">
            <<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle" style="left:40px;">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama barang">Nama Barang</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="ategori barang">Kategori Barang</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="Kerusakan barang">Kerusakan Barang</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Kerusakan barang">Nama Pengaju</label>
                                <input type="email" class="form-control" id="kerusakan barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="umur barang">Umur Barang</label>
                                <input type="password" class="form-control" id="umur barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="status barang">Status Barang</label>
                                <input type="email" class="form-control" id="status barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Biaya Barang</label>
                                <input type="password" class="form-control" id="Biaya Barang" placeholder="">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <!-- modal detail -->
    <div class="modal fade" id="detail" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-lg">
            <<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredScrollableTitle" style="left:40px;">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama barang">Nama Barang</label>
                                <input type="email" class="form-control" id="nama barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="ategori barang">Kategori Barang</label>
                                <input type="password" class="form-control" id="kategori barang" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="Kerusakan barang">Kerusakan Barang</label>
                                <input type="email" class="form-control" id="kerusakan barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="Kerusakan barang">Nama Pengaju</label>
                                <input type="email" class="form-control" id="kerusakan barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="umur barang">Umur Barang</label>
                                <input type="password" class="form-control" id="umur barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="status barang">Status Barang</label>
                                <input type="email" class="form-control" id="status barang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Biaya Barang</label>
                                <input type="password" class="form-control" id="Biaya Barang" placeholder="">
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Back</button>
                        <button type="button" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
        </div>
    </div>
    </div>


    <!-- Open first dialog -->
    <a class="btn btn-success" data-bs-toggle="modal" href="#modal" role="button" style="margin-left: 865px;">+Add barang</a>
    <button type="button" class="btn btn-outline-danger" style="margin-left: 785px;margin-top:-65px;">Delete</button>
    <br>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1"></label>
                    </div>
                </th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kategori Barang</th>
                <th scope="col">Kerusakan Barang</th>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Aksi</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1"></label>
                    </div>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a class="btn btn-primary" data-bs-toggle="modal" href="#detail" role="button">Detail</a>
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                </td>

            </tr>

            </div>
            <tr>



            </tr>
            <tr>


            </tr>
        </tbody>
    </table>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div>

    <!-- Modal Detail -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop