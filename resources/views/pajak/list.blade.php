@extends('layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">Data Omset</h4>
            <p class="category"></p>
            <div class="card">
                <div class="card-content">
                    <div class="toolbar">
                        <!--Here you can write extra buttons/actions for the toolbar-->
                    </div>
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="fresh-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                            width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pajak</th>
                                    <th>ID Dokumen</th>
                                    <th>Omset</th>
                                    <th>Kategori</th>
                                    <th>Persentase</th>
                                    <th>Pajak</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pajak</th>
                                    <th>ID Dokumen</th>
                                    <th>Omset</th>
                                    <th>Kategori</th>
                                    <th>Persentase</th>
                                    <th>Pajak</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting">Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=0; ?>
                                @foreach($data as $row)
                                <?php $no++ ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->id_pajak }}</td>
                                    <td>{{ $row->id_dokumen }}</td>
                                    <td>{{ $row->omset }}</td>
                                    <td>@if($row->id_jenis_pajak == null)
                                        menunggu konfirmasi
                                        @else
                                        <?php
                                            $tmp = DB::table('data_jenis_pajak')->select('jenis_pajak')->where('id_jenis_pajak', $row->id_jenis_pajak)->value('jenis_pajak');
                                            $tmp2 = DB::table('data_jenis_pajak')->select('besar_pajak')->where('id_jenis_pajak', $row->id_jenis_pajak)->value('besar_pajak');
                                        ?>
                                        {{ $tmp }}
                                        @endif
                                    </td>
                                    <td>{{ $tmp2 }} %</td>
                                    <td>{{ $row->bayaran }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        @if($row->status=="belum terbayar")
                                        <a href="{{ url('pajak/formUploadBukti/'. $row->id_pajak) }}"
                                            class="btn btn-warning btn-sm "></i>Upload Bukti Bayar</a>
                                        @elseif($row->status=="pembayaran dikonfirmasi")
                                        <button
                                            class="btn btn-success btn-sm "></i>Selesai</button>
                                        @else

                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>
@endsection
