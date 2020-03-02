<!DOCTYPE html>
<html lang="en">
<head>
    <title>SPD_{{strtoupper($dataTransaksi[0]->peg_nama)}}_TRX_ID_{{$dataTransaksi[0]->kode_trx}}</title>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- Bootstrap Core CSS -->
    <link href="{{ asset('tema/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('tema/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    
    <!-- color CSS -->
    <style type="text/css">
       
/* Setting content width, unsetting floats and margins */
/* Attention: the classes and IDs vary from theme to theme. Thus, set own classes here */
body {
    font-size : 10pt;
    font-family: Helvetica !important;
    background: #fff !important;
    color: #000;
}
@page {
    margin: 60px;
}
 #dataSuratTugas {
    width: 100%;
    height: 100%;
    }
h1 {
font-size: 20pt;
}

h2, h3, h4 {
font-size: 12pt;
margin-top: 10px;
}
.namakuitansi h2, .namakuitansi {
    font-size: 16pt !important;
}

/* Defining all page breaks */
a {
    page-break-inside:avoid;
}
blockquote {
    page-break-inside: avoid;
}
h1, h2, h3, h4, h5, h6 { page-break-after:avoid;
     page-break-inside:avoid }
img { page-break-inside:avoid;
     page-break-after:avoid; }
table, pre { page-break-inside:avoid }
ul, ol, dl  { page-break-before:avoid }
/* Displaying link color and link behaviour */

/* Hiding unnecessary elements for the print */

#cetak, #cetak1, #cetak2, #cetak3 {
    display: none;
}
.kopsurat {
font-size: 13pt;
margin-top: 10pt !important;
}
.nomor {
font-size:11pt;
}

.aturan table {
    border: none !important;
    font-size: 10pt;
    margin:0pt !important;
    }
.aturan table th, .aturan table td { padding:2pt !important; border: none !important;font-size: 10pt;}
.tulisan {
font-size:11pt !important;
}
.namabps {
    font-family: Arial, Helvetica, sans-serif !important;
}
.namatable table, .namatable table td {
    padding:1pt !important;
    border: none !important;
}
.bawah {
    width: 95%;
    font-size:9pt !important;
    position: absolute;
    bottom: 0px;
    padding: 5px;
    text-align: center;
}

footer {
    position: fixed; 
    bottom: -60px; 
    left: 0px; 
    right: 0px;
    height: 60px; 
    font-size:9pt !important;
    text-align: center;
    
}
.qrcode {
    position: relative;
    bottom: 0px;
    padding: 0px;
    text-align: left;
    line-height: 0px;
}

.pindah-halaman {
    page-break-after: always;
}
    </style>

</head>
<body>
    
    <footer>
        Jl. Gunung Rinjani No. 2 Mataram 83125  Telp. (0370) 621385, 638321  Fax (0370) 623801 <br />
        Email: bps5200@bps.go.id   Website: http://ntb.bps.go.id
    </footer>
    <main>

        <p style="page-break-after: never;">
           
                <!---isi yg akan diprint--->
                <div class="text-center">
                        <img src="{{asset('img/logo-bps.png')}}" height="80">
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
                    <table width="100%" class="table">
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
                <div class="text-center text-uppercase"><b>Memberikan tugas</b></div>
                
                <div class="row namatable">
                    <table width="100%" class="table">
                        <tr>
                            <td width="17%">Kepada : </td>
                            <td width="3%"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="17%">Nama</td>
                            <td width="3%">:</td>
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
                                    <div class="qrcode" style="margin-top:80pt;">
                                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                        ->size(100)->margin(0)->generate('https://perjadin.bpsntb.id/view/'.$dataTransaksi[0]->kode_trx)) !!}" width="80px">

                                    <div style="font-size:7pt;padding-left:3px;">TRXID : {{$dataTransaksi[0]->kode_trx}}</div>
                                </div>
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
        
        </p>
    </main>
    
<!-- jQuery -->
<script src="{{ asset('tema/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->

<script src="{{ asset('tema/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('tema/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js')}}"></script>
<script src="{{asset('js/numberformat.js')}}"></script>
<script src="{{asset('tema/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
</body>
</html>
