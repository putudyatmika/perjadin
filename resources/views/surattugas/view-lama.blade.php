@section('css')
<style type = "text/css">
@media screen, print {
.kopsurat {
    font-size: 20px;
    margin-top:10px;
}
.nomor {
    font-size:12px;
}
}
@media print {
    .tombol {
        display: none;
    }
}
</style>
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
                        <div class="col-lg-12">
                                @if (Session::has('message'))
                                <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                                @endif
                                </div>
                    <div class="col-lg-12">
                            <div class="white-box printableArea">
                                <div class="text-center">
                                    <img src="{{asset('img/logo-bps.png')}}" height="100">
                                    <h4><p><i><b>BADAN PUSAT STATISTIK <br />PROVINSI NUSA TENGGARA BARAT</b></i></p></h4>
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
                            <div class="row">
                                    Menimbang	:	Bahwa untuk kelancaran pelaksanaan kegiatan di Badan Pusat Statistik Provinsi Nusa Tenggara Barat maka diperlukan dukungan administrasi perkantoran;
                            </div>
                            <div class="row">
                                   Mengingat	:
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
                            </div>
                            <div class="text-center"><b>Memberikan tugas</b></div>
                            <div class="row">
                                    <div class="pull-left text-left">
                                        Kepada :
                                    </div>
                            </div>

                            <div class="row">
                                Nama : <b>{{$dataTransaksi[0]->TabelPegawai->nama}}</b>
                            </div>

                            <div class="row">
                                        <div class="pull-left text-left">
                                                Jabatan : @if ($dataTransaksi[0]->TabelPegawai->jabatan<4)
                                                    Kepala {{$dataTransaksi[0]->TabelPegawai->Unitkerja->nama}}
                                                    @else
                                                    Staf {{$dataTransaksi[0]->TabelPegawai->Unitkerja->nama}}
                                                    @endif
                                        </div>
                            </div>
                            <div class="row">
                                    <div class="pull-left text-left">
                                            Anggota : -
                                    </div>
                        </div>
                        <div class="row">
                                <div class="pull-left text-left">
                                        Tujuan / Tugas : {{$dataTransaksi[0]->Matrik->Tujuan->nama_kabkota}} / {{$dataTransaksi[0]->tugas}}
                                </div>
                         </div>
                         <div class="row" style="margin-top:30px">
                                <div class="col-sm-8">
                                </div>
                                <div class="col-sm-4">
                                        <div class="text-center">
                                                An. Kepala Badan Pusat Statistik
                                                <br />
                                                Provinsi Nusa Tenggara Barat
                                                <br />
                                                {{$dataTransaksi[0]->SuratTugas->ttd_jabatan}}

                                        </div>
                                    </div>

                         </div>
                         <div class="row" style="margin-top:60px">
                                <div class="col-sm-8">
                                   </div>
                                   <div class="col-sm-4">
                                           <div class="text-center">
                                                  {{$dataTransaksi[0]->SuratTugas->ttd_nama}}
                                           </div>
                                       </div>

                            </div>
                                    <div class="row">
                                        <div class="col-md-12">


                                        </div>
                                        <div class="col-md-12">

                                        </div>
                                        <div class="col-md-12">

                                            <div class="text-right">
                                                <button id="print" class="btn btn-default btn-outline tombol" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

@endsection
