<?php
    $tmp_nama = DB::table('data_pengguna')->select('nama_pengguna')->where('user_id', $data['user_id'])->value('nama_pengguna');
    $tmp_jenis = DB::table('data_jenis_pajak')->select('jenis_pajak')->where('id_jenis_pajak', $data['id_jenis_pajak'])->value('jenis_pajak');
?>
<h3>Halo</h3>

<br>Dengan ini kami sampaikan invoice dibawah ini
<p>Berikut data tunggakan pajak Bapak/Ibu</p>
<br>Nama Pengguna : {{ $tmp_nama }}
<br>ID Usaha : {{ $data['id_usaha'] }}
<br>Pendapatan Usaha : Rp. {{ $data['omset'] }}
<br>kategori Pajak : {{ $tmp_jenis }}
<br>Pajak Yang Harus Dibayar : {{ $data['bayaran'] }}
<br>Status : {{ $data['status'] }}
<br>
<p>Berdasarkan data tersebut terindikasi bahwa Bapak/Ibu telah MENUNGGAK pembayaran pajak</p>
<br>Mohon Bapak/Ibu untuk segera melakukan pelunasan pembayaran pajak sesuai data yang diatas
<p>Sekian pemberitahuan dari kami, Kami harap Bapak/Ibu segera melakukan pelunasan tunggakan dan mengupload bukti pembayaran pada sistem</p>
<br>
<p>Terima Kasih</p>