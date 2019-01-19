@extends('layout.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Master Data Pegawai</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Data Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Pegawai BPS Provinsi NTB </h3>
                            <p class="text-muted m-b-20">Keadaan <code>31 Desember 2018</code></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Bidang/Bagian</th>
                                            <th>Jabatan</th>
                                            <th>Pangkat/Gol</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="javascript:void(0)">196704281989011001</a></td>
                                            <td>Anang Zakaria</td>
                                            <td>IPDS </td>
                                            <td>Kabid IPDS</td>
                                            <td>Penata Tk. I (III/d)</td>
                                            <td><div class="label label-table label-success">Aktif</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">198203192004121002</a></td>
                                            <td>I Putu Dyatmika</td>
                                            <td>IPDS </td>
                                            <td>Kasi DLS</td>
                                            <td>Penata Tk. I (III/d)</td>
                                            <td><div class="label label-table label-success">Aktif</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">198708152010121005</a></td>
                                            <td>Chairul Fatikhin Putra</td>
                                            <td>IPDS </td>
                                            <td>Kasi IPDS</td>
                                            <td>Penata (III/c)</td>
                                            <td><div class="label label-table label-success">Aktif</div></td>
                                        </tr>
                                        <tr>
                                            <td><a href="javascript:void(0)">196808171992121001</a></td>
                                            <td>I Gusti Lanang Putra</td>
                                            <td>NWAS </td>
                                            <td>Kabid NWAS</td>
                                            <td>Pembina Tingkat I (IV/b)</td>
                                            <td><div class="label label-table label-success">Aktif</div></td>
                                        </tr>
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
