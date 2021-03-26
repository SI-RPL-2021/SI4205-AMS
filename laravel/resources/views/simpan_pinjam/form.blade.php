@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        .container {
            max-width: 2000px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            height: 700px;
        }

        .content form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #9b59b6;
        }

        form .gender-details .gender-title {
            font-size: 20px;
            font-weight: 500;
        }

        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }

        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #d9d9d9;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        form .button {
            height: 45px;
            margin: 35px 0
        }

        form .button input {
            height: 100%;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        form .button input:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            form .category {
                width: 100%;
            }

            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }

        @media(max-width: 459px) {
            .container .content .category {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addSimpanPinjam">
          Tambah
        </button>
        

        <div class="modal fade" id="addSimpanPinjam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Barang</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Pembelian</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Pembelian</label>
                                        <input type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi Pembelian</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Perawatan</label>
                                    <input type="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Foto Barang</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Lokasi Barang</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                </div>
                                </form>
                            </div>
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100"></div>

        <div class="table-responsive mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Waktu Perawatan</th>
                        <th>Kategori Barang</th>
                        <th>Foto Barang</th>
                        <th>Harga Pembelian</th>
                        <th>Lokasi Barang</th>
                        <th>Waktu Pembelian</th>
                        <th>Keterangan</th>
                        <th>Lokasi Pembelian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td><div class="d-flex">
                            <button type="button" class="btn btn-danger mr-2">Hapus</button>
                            <button type="button" class="btn btn-primary">Edit</button>    
                        </div></td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td><div class="d-flex">
                            <button type="button" class="btn btn-danger mr-2">Hapus</button>
                            <button type="button" class="btn btn-primary">Edit</button>    
                        </div></td>
                    </tr>
                    <tr>
                        <td scope="row">1</td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td>Data </td>
                        <td><div class="d-flex">
                            <button type="button" class="btn btn-danger mr-2">Hapus</button>
                            <button type="button" class="btn btn-primary">Edit</button>    
                        </div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>


    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop