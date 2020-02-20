@section('css')
<link href="{{asset('css/print.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('js')
<!-- end - This is for export functionality only -->
 <script src="{{asset('tema/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
 <script>
 $(document).ready(function() {
     $("#print").click(function() {
         var mode = 'iframe'; //popup
         var close = mode == "popup";
         var options = {
             mode: mode,
             popClose: close
         };
         $("div.printableArea").printArea(options);
     });
 });

            // fungsi dijalankan setelah seluruh dokumen ditampilkan
            $(document).ready(function(e) {

                // aksi ketika tombol cetak ditekan
                $("#cetak").bind("click", function(event) {
                    // cetak data pada area <div id="#data-mahasiswa"></div>
                    $('#dataSuratTugas').printArea();
                });
            });
$(document).ready(function () {
    
    window.onload = $('#dataSuratTugas').printArea();
    setTimeout(function(){ window.close(); }, 3000);
});
 </script>

@stop
@extends('layouts.default')

@section('content')
<div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Print Surat Tugas</h4>
                    </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li><a href="{{url('')}}">Dashboard</a></li>
                            <li><a href="{{route('surattugas.index')}}">Data Surat Tugas</a></li>
                            <li class="active">Print Surat Tugas</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!-- .row -->
                <div class="row">
                        <div class="col-md-12">
                            <div class="white-box" id="dataSuratTugas">
                                <!---isi yg akan diprint--->
                                <div class="text-center">
                                        <img src="{{asset('img/logo-bps.png')}}" height="90">
                                        <h4 class="namabps"><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
                                        <span class="kopsurat"><u><b>SURAT TUGAS</b></u></span>
                                        <br />
                                        <span class="nomor">No : {{$dataTransaksi[0]->SuratTugas->nomor_surat}}</span>
                                </div>
                                <div class="text-center">
                                        <h4><b>
                                            @if ($dataTransaksi[0]->SuratTugas->flag_ttd==0)
                                            KEPALA BADAN PUSAT STATISTIK PROVINSI NUSA TENGGARA BARAT
                                            @else
                                            {{$FlagTTD[$dataTransaksi[0]->SuratTugas->flag_ttd]}} KEPALA BADAN PUSAT STATISTIK PROVINSI NUSA TENGGARA BARAT
                                            @endif

                                        </b>
                                        </h4>
                                </div>
                                <div class="row aturan">
                                    <table class="table">
                                        <tr>
                                            <td>Menimbang</td>
                                            <td>:</td>
                                            <td>Bahwa untuk kelancaran pelaksanaan kegiatan di Badan Pusat Statistik Provinsi Nusa Tenggara Barat maka diperlukan dukungan administrasi perkantoran;</td>
                                        </tr>
                                        <tr>
                                            <td>Mengingat</td>
                                            <td>:</td>
                                            <td>
                                                <ol>
                                                    <li>Undang-Undang Dasar Negara Republik Indonesia Tahun 1945;</li>
                                                    <li>Undang-Undang Nomor 17 Tahun 2003 tentang Keuangan Negara;</li>
                                                    <li>Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara;</li>
                                                    <li>Peraturan Pemerintah Nomor 51 Tahun 1999 tentang Penyelenggaraan Statistik;</li>
                                                    <li>Peraturan Presiden Nomor 163 Tahun 2007 tentang Badan Pusat Statistik;</li>
                                                    <li>Keputusan Kepala Badan Pusat Statistik Nomor 121 tahun 2001 tentang Organisasi dan Tata Kerja Perwakilan Badan Pusat Statistik; Negara, Pegawai Negeri, dan Pegawai Tidak Tetap;</li>
                                                    <li>Peraturan Kepala Badan Pusat Statistik Nomor 7 Tahun 2008 tentang Organisasi dan tata Kerja Badan Pusat Statistik;</li>
                                                    <li>Peraturan Menteri Keuangan Nomor 113/PMK.05/2012 tentang Perjalanan Dinas Dalam Negeri bagi Pejabat Negara, Pegawai Negeri, dan Pegawai Tidak Tetap;</li>
                                                    <li>Peraturan Kepala Badan Pusat Statistik Nomor 103 Tahun 2014 tentang Pedoman Pelaksanaan Perjalanan Dinas Jabatan Di Lingkungan Badan Pusat Statistik;</li>
                                                </ol>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-center"><b>Memberikan tugas</b></div>
                                <div class="row">
                                <div class="pull-left text-left">Kepada :</div>
                                </div>
                                <div class="row namatable">
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><b>{{strtoupper($dataTransaksi[0]->peg_nama)}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td>
                                                @if ($dataTransaksi[0]->peg_jabatan<4)
                                                Kepala {{$dataTransaksi[0]->PegUnitkerja->nama}}
                                                @else
                                                Staf {{$dataTransaksi[0]->PegUnitkerja->nama}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Anggota</td>
                                            <td>:</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tujuan/Tugas</td>
                                            <td>:</td>
                                            <td>{{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}} / {{$dataTransaksi[0]->tugas}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jangka Waktu</td>
                                            <td>:</td>
                                            <td>{{$dataTransaksi[0]->bnyk_hari}} ({{strtolower($Bilangan[$dataTransaksi[0]->bnyk_hari])}}) Hari,
                                                @php
                                                    $tgl_brkt = explode('-',$dataTransaksi[0]->tgl_brkt);
                                                    $tgl_balik = explode('-',$dataTransaksi[0]->tgl_balik);

                                                    $bln_brkt = (int)($tgl_brkt[1]);
                                                    $bln_balik = (int)($tgl_balik[1]);

                                                    $tgl_surat = explode('-',$dataTransaksi[0]->SuratTugas->tgl_surat);
                                                    $bln_surat = (int)($tgl_surat[1]);

                                                    $tgl_berangkat = (int)($tgl_brkt[2]) .' '.$Bulan[$bln_brkt].' '.$tgl_brkt[0];
                                                    $tgl_blk = (int)($tgl_balik[2]) .' '.$Bulan[$bln_balik].' '.$tgl_balik[0];
                                                    $tanggal_surat = (int)($tgl_surat[2]) .' '.$Bulan[$bln_surat].' '.$tgl_surat[0];
                                                @endphp
                                                @if ($dataTransaksi[0]->bnyk_hari==1)
                                                {{ $tgl_berangkat }}
                                                @else
                                                {{ $tgl_berangkat }} s/d {{ $tgl_blk }}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="row">
                                        <table width="100%" style="margin-top:22px;">
                                            <tr>
                                                <td width="50%">

                                                </td>
                                                <td width="50%">
                                                    <div class="text-center">
                                                        Mataram, {{ $tanggal_surat }}
                                                        <br />
                                                        @if ($dataTransaksi[0]->SuratTugas->flag_ttd>0)
                                                        {{$FlagTTD[$dataTransaksi[0]->SuratTugas->flag_ttd]}}
                                                        @endif
                                                        Kepala Badan Pusat Statistik
                                                        <br />
                                                        Provinsi Nusa Tenggara Barat
                                                        <br />
                                                        @if ($dataTransaksi[0]->SuratTugas->flag_ttd>0)
                                                        {{$dataTransaksi[0]->SuratTugas->ttd_jabatan}}
                                                        @endif
                                                        <p style="margin-top:60pt;text-transform: uppercase;">{{$dataTransaksi[0]->SuratTugas->ttd_nama}}</p>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>
                                 </div>
                                 <div class="qrcode">
                                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                        ->size(80)->margin(0)->generate('https://perjadin.bpsntb.id/view/'.$dataTransaksi[0]->kode_trx)) !!} ">

                                    <div style="font-size:8pt;padding-left:3px;">TRX ID : {{$dataTransaksi[0]->kode_trx}}</div>
                                </div>
                                 <div style="margin-top:20px">

                                    <div class="bawah text-center">
                                        Jl. Gunung Rinjani No. 2 Mataram 83125  Telp. (0370) 621385, 638321  Fax (0370) 623801 <br />
                                        Email: bps5200@bps.go.id   Website: http//ntb.bps.go.id
                                    </div>
                                 </div>
                                <div class="text-right">
                                        <button id="cetak" class="btn btn-default">Print</button>
                                </div>
                                <!----batas isi yang diprint--->
                            </div>
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

@endsection
