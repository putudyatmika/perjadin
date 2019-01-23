@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Pangkat/Golongan</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Pangkat-Golongan</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-8 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Pangkat dan Golongan</h3>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Golongan</th>
                                            <th>Pangkat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DataGolongan as $Gol)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $Gol -> kode }}</a></td>
                                            <td>{{ $Gol -> gol }}</td>
                                            <td>{{ $Gol -> pangkat }} </td>
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
