@extends('adminlte::page')

@section('title', 'History Asset')
    <link rel=”icon” href=ams.png”>
@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }



            .table-wrapper {
                background: #fff;
                padding: 20px 25px;


                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.8);
            }

            .table-responsive {

                box-shadow: 2px 6px 10px #747f91;
            }

            .table-title {
                padding-bottom: 15px;
                background: #ffffff;
                color: #000000;
                padding: 16px 30px;
                min-width: 100%;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
            }

            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
            }

            .table-title .btn-group {
                float: right;
            }

            .table-title .btn {
                color: #fff;
                float: right;
                font-size: 13px;
                border: none;
                min-width: 50px;
                border-radius: 2px;
                border: none;
                outline: none !important;
                margin-left: 10px;
            }

            .table-title .btn i {
                float: left;
                font-size: 21px;
                margin-right: 5px;
            }

            .table-title .btn span {
                float: left;
                margin-top: 2px;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 60px;
            }

            table.table tr th:last-child {
                width: 100px;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }

            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
                outline: none !important;
            }

            table.table td a:hover {
                color: #2196F3;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #F44336;
            }

            table.table td i {
                font-size: 19px;
            }

            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a,
            .pagination li.active a.page-link {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }

            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }

            /* Custom checkbox */
            .custom-checkbox {
                position: relative;
            }

            .custom-checkbox input[type="checkbox"] {
                opacity: 0;
                position: absolute;
                margin: 5px 0 0 3px;
                z-index: 9;
            }

            .custom-checkbox label:before {
                width: 18px;
                height: 18px;
            }

            .custom-checkbox label:before {
                content: '';
                margin-right: 10px;
                display: inline-block;
                vertical-align: text-top;
                background: white;
                border: 1px solid #bbb;
                border-radius: 2px;
                box-sizing: border-box;
                z-index: 2;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                content: '';
                position: absolute;
                left: 6px;
                top: 3px;
                width: 6px;
                height: 11px;
                border: solid #000;
                border-width: 0 3px 3px 0;
                transform: inherit;
                z-index: 3;
                transform: rotateZ(45deg);
            }

            .custom-checkbox input[type="checkbox"]:checked+label:before {
                border-color: #03A9F4;
                background: #03A9F4;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                border-color: #fff;
            }

            .custom-checkbox input[type="checkbox"]:disabled+label:before {
                color: #b8b8b8;
                cursor: auto;
                box-shadow: none;
                background: #ddd;
            }

            /* Modal styles */
            .modal .modal-dialog {
                max-width: 800px;
            }

            .modal .modal-header,
            .modal .modal-body,
            .modal .modal-footer {
                padding: 20px 30px;
            }

            .modal .modal-content {
                border-radius: 3px;
                font-size: 14px;
            }

            .modal .modal-footer {
                background: #ecf0f1;
                border-radius: 0 0 3px 3px;
            }

            .modal .modal-title {
                display: inline-block;
            }

            .modal .form-control {
                border-radius: 2px;
                box-shadow: none;
                border-color: #dddddd;
            }

            .modal textarea.form-control {
                resize: vertical;
            }

            .modal .btn {
                border-radius: 2px;
                min-width: 100px;
            }

            .modal form label {
                font-weight: normal;
            }

        </style>
       
    </head>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif




    <body>
        <!-- //table -->

        <div class="container-xxl">
            <div class="table-responsive">
                <div class="table-wrapper bg-dark">
                    <div class="table-title bg-dark">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>History Asset</b></h2>

                            </div>

                        
                        </div>

                    </div>
                    <div class="row">
                        <form class="form-inline ml-auto p-2 " type="get" action="{{ url('/searchAsset2') }}">
                            <input type="search" class="form-control " name="search2" placeholder="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="row">
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Asset</th>
                                    <th>Kategori</th>
                                    <th>Foto Barang</th>
                                    @if (Auth::user()->role != 'karyawan')
                                        <th>Action</th>
                                    @else

                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($assets as $asset)
                                    <tr>
                                      
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $asset->name }}</td>
                                        <td class="asset-category">
                                            <ul>
                                                @foreach ($asset->categories as $category)

                                                    <li>
                                                        {{ $category->category }}
                                                    </li>


                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="product-img"><img class="rounded" src="{{ asset($asset->picture) }}"
                                                alt="Img placeholder" height="100px"></td>
                                      

                                            <td>
                                                <a href="/history/update/{{$asset->id}}" class="edit"><i
                                                        class="material-icons" data-toggle="tooltip"
                                                        title="Details">&#xE241;</i></a>
                                           
                                            </td>
                                     

                                        @php
                                            $i++;
                                        @endphp
                                         </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{ $assets->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- add asset -->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">

                        <form action="/Input_Asset/store" method="post" style="color: black;" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Asset</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="asset_category mb-1">Category</label>
                                        <select
                                            class="select2-bg form-control select2 @error('asset_category') is-invalid @enderror"
                                            id="asset_category" name="asset_category[]" placeholder="Category"
                                            value="{{ old('asset_category') }}" required autocomplete="asset_category"
                                            autofocus multiple="multiple">

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                        </select>

                                        @error('asset_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Pembelian</label>
                                        <input type="text" class="form-control" name="asset_purchase_price" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Waktu Pembelian</label>
                                        <input type="date" class="form-control" name="asset_purchase_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Barang</label>
                                        <input class="form-control form-control-sm" id="formFileSm" type="file"
                                            name="picture" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" name="description" style="height: 100px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Asset</label>
                                        <input type="text" class="form-control" placeholder="jumlah" name="qty" required>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
        </div>
        </div>

    </body>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
@stop
