<h3>Aplikasi Perjalanan Dinas - BPS Provinsi NTB</h3>
<p>Menunggu persetujuan <b>{{ $objEmail->setuju}}</b> pengajuan perjalanan dinas dari <br/>
<strong>{{$objEmail->bidang}}</strong>
</p>
 
<div>
<p>Detil perjalanan dinas :<br/>
<b>Trx ID :</b>&nbsp;{{ $objEmail->trx_id}}<br/>
<b>Nama :</b>&nbsp;{{ $objEmail->nama }}<br/>
<b>NIP :</b>&nbsp;{{ $objEmail->nip }}<br/>
<b>Tugas :</b>&nbsp;{{ $objEmail->tugas }}<br/>
<b>Tgl berangkat :</b>&nbsp;{{ $objEmail->tgl_brkt }}<br/>
<b>Tgl kembali :</b>&nbsp;{{ $objEmail->tgl_kembali }}<br/>
<b>Tujuan :</b>&nbsp;{{ $objEmail->tujuan }}<br/>
<b>Durasi :</b>&nbsp;{{ $objEmail->durasi }}<br/>
<b>Subject Matter :</b>&nbsp;{{ $objEmail->sm }}<br/>
<b>Unit Pelaksana :</b>&nbsp;{{ $objEmail->up }}<br/>
</p>
</div>
<div>
    <p>Sumber Dana :<br/>
    <b>MAK :</b>&nbsp;{{ $objEmail->mak}}<br/>
    <b>Komponen :</b>&nbsp;{{ $objEmail->komponen }}<br/>
    <b>Detil :</b>&nbsp;{{ $objEmail->detil }}<br/>
    <b>Total biaya :</b>&nbsp;{{ $objEmail->totalbiaya }}<br/>
</p>
</div>
<br/>
<p><i>Silakan Masuk ke sistem (https://perjadin.bpsntb.id/setuju) menyetujui pengajuan ini.</i></p>
<p><img src="{{ asset('img/aladin-logo-teks.png')}}" /></p>
<br/>
Terimakasih,