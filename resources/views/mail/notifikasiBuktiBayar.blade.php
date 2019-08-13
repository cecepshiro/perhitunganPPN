<h3>INVOICE PEMBAYARAN</h3>
<?php
    $tmp_data = DB::table('data_pengguna')->select('*')->where('user_id', $data['user_id'])->first();
?>
<br>Terima kasih telah melakukan pembayaran pajak penghasilan anda
<br>Bukti pembayaran anda akan segera kami validasi dengan invoice sebagai berikut
<br>
<br>ID Pengguna : {{ $tmp_data->id_pengguna }}
<br>Nama Pengguna : {{ $tmp_data->nama_pengguna }}
<br>ID Pajak : {{ $data['id_pajak'] }}
<br>
<br>Hasil validasi pembayaran akan kami notifikasikan kembali
<br>
<p>Terima Kasih</p>