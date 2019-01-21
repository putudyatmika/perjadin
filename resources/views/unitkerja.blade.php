@extends('layout.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Unitkerja</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Unitkerja</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-8 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Unitkerja</h3>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Parent</th>
                                            <th>Eselon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataUnitkerja as $Unit)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $Unit -> kode }}</a></td>
                                            <td>{{ $Unit -> nama }}</td>
                                            <td>{{ $Unit -> parent }} </td>
                                            <td>{{ $Unit -> eselon }} </td>
                                            <td><div class="label label-table label-success">Edit</div></td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection
