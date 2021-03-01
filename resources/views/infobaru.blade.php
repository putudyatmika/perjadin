@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Info Update Aplikasi Aladin</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Info update</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="white-box">
                            <h2 class="m-b-10">Update Aladin v5.5</h2>
                            <h3 class="box-title">Penambahan fitur :</h3>
                                    <ul class="list-icons">
                                        <li><i class="fa fa-check text-success"></i> <b>Multi Tujuan</b>
                                            <p class="m-l-20">fitur ini untuk perjadin yang lebih dari 1 tujuan, max 5 tujuan dalam 1 perjadin. bisa diakses oleh operator melalui menu <b>Matrik</b></p></li>
                                        <li><i class="fa fa-check text-success"></i> <b>Form-JLN</b>
                                            <p class="m-l-20">Operator sudah bisa membuat Form-JLN sesuai dengan matrik perjadin yang telah dibuat sebelumnya. untuk dapat mengajukan perjadin (menu transaksi) setelah alokasi matrik perjadin harus membuat dulu Form-JLN.</p></li>
                                        <li><i class="fa fa-check text-success"></i> <b>Kalendar Pengajuan</b>
                                            <p class="m-l-20">Menu kalendar ada pilihan untuk kalendar perjadin yang telah disetujui dan perjadin yang telah diajukan</p>
                                        </li>
                                        <li><i class="fa fa-check text-success"></i> <b>Perubahan Alur Perjadin</b>
                                            <p class="m-l-20">Operator membuat matrik perjadin, setelah dialokasikan harus membuat Form-JLN terlebih dahulu, agar matrik yang ditelah dibuat bisa diajukan. Tanpa Form-JLN, matrik yang telah dibuat tidak akan bisa diajukan</p>
                                        </li>
                                        <li><i class="fa fa-check text-success"></i> <b>Jenis Kendaraan</b>
                                            <p class="m-l-20">Jenis kendaraan pada versi sebelumnya hanya bisa di set oleh operator keuangan pada menu kelengkapan, pada versi ini operator terlebih dahulu menentukan jenis kendaraan yang digunakan pada waktu membuat matrik, begitu juga pada waktu pembuatkan kuitansi operator keuangan bisa merubah jenis kendaraan sesuai dengan bukti fisik jenis kendaraan yang digunakan</p>
                                        </li>
                                        <li><i class="fa fa-check text-success"></i> <b>Import Matrik Perjadin</b>
                                            <p class="m-l-20">Untuk matrik perjadin yang banyak diusulkan lebih baik penggunakan fitur Import Matrik dengan terlebih dahulu mengunduh format file excel untuk import matrik.</p>
                                        </li>
                                        <li><i class="fa fa-check text-success"></i> <b>Perbaikan Bug Program</b>
                                            <p class="m-l-20">perbaikan minor pada aplikasi Aladin, dan penyesuaian nama unitkerja, dll.</p>
                                        </li>
                                        <li><i class="fa fa-check text-success"></i> <b>Menemukan error program</b>
                                            <p class="m-l-20">silakan menghubungi Admin Aplikasi atau Fungsi IPDS.</p>
                                        </li>
                                    </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
@endsection
