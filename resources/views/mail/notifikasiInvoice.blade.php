<h3>INVOICE PEMBAYARAN</h3>
<?php
    $tmp_data = DB::table('data_pengguna')->select('*')->where('user_id', $data['user_id'])->first();
    $tmp_jenis = DB::table('data_jenis_pajak')->select('*')->where('id_jenis_pajak', $data['id_jenis_pajak'])->first();
?>
<br>Terima kasih telah memasukan data hasil pendapatan anda pada sistem
<br>Data hasil pendapatan anda telah kami proses dengan invoice sebagai berikut
<br>
<br>ID Pengguna : {{ $tmp_data->id_pengguna }}
<br>Nama Pengguna : {{ $tmp_data->nama_pengguna }}
<br>ID Pajak : {{ $data['id_pajak'] }}
<br>ID Dokumen : {{ $data['id_dokumen'] }}
<br>Besar Pendapatan / Omset : Rp. {{ $data['omset'] }}
<br>Kategori Pajak : {{ $tmp_jenis->jenis_pajak }}
<br>Persentase Pajak : {{ $tmp_jenis->besar_pajak }} %
<br>Besar Pajak : Rp. {{ $data['bayaran'] }}
<br>Status : {{ $data['status'] }}
<br>
<br>Mohon Bapak/Ibu untuk melakukan pembayaran berdasarkan data keterangan invoice tersebut dan mengupload bukti pembayaran pada sistem
<br>
<p>Terima Kasih</p>