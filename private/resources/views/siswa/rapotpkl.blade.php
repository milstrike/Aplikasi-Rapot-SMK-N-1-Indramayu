@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="siswa"><small>Dashboard</small></a></li>
                            <li><a href="rapotumumsiswa"><small>Penilaian Rapot</small></a></li>
                            <li class="active"><a href="rapotpklsiswa"><small>Penilaian PKL</small></a></li>
                            <li><a href="rapotekskulsiswa"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="editdatasiswa"><small>Edit Data Siswa</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div class="paneleverything">
                        @if($nilaipkl -> count() > 0)
                            <div>
                                <h3 style="text-align:center">Raport Penilaian PKL</h3>
                                    <dl class="dl-horizontal">
                                        <dt>NIS</dt>
                                        <dd>{{ $nilaipkl -> first() -> nis }}</dd>
                                        <dt>Kelas</dt>
                                        <dd>{{ $nilaipkl -> first() -> kelas }}</dd>
                                        <dt>Angkatan</dt>
                                        <dd>{{ $nilaipkl -> first() -> angkatan }}</dd>
                                        <dt>Nama</dt>
                                        <dd>{{ $nilaipkl -> first() -> nama_siswa }}</dd>
                                        <dt>Nilai</dt>
                                        <dd>{{ $nilaipkl -> first() -> nilai }}</dd>
                                        <dt>Deskripsi Nilai</dt>
                                        <dd>{{ $nilaipkl -> first() -> keterangan }}</dd>
                                    </dl>
                            </div>
                        @else
                            <div>
                                <h3 style="text-align: center;">Anda Belum melaksanakan PKL</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
</div>
@endsection