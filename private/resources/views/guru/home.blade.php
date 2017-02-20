@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="walikelas"><small>Dashboard</small></a></li>
                            <li><a href="rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li><a href="rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li><a href="rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span5">
                    <div class="paneleverything">
                        <strong>INFORMASI DASAR</strong>
                        <dl class="dl-horizontal">
                            @foreach($detailakun as $dataakun)
                            <dt>Nama</dt>
                            <dd>{{ $dataakun->nama }}</dd>
                            <dt>NIP</dt>
                            <dd>{{ $dataakun->nip }}</dd>
                            <dt>No. Telepon</dt>
                            <dd>{{ $dataakun->telepon}}</dd>
                            @endforeach
                        </dl>
                    </div>
                </div>
                <div class="span5">
                    <div class="paneleverything">
                        <strong>INFORMASI KEWALIAN</strong>
                        @if($datakelas->count() > 0)
                        @foreach($datakelas as $kelas)
                        <dl class="dl-horizontal">
                            <dt>Kelas</dt>
                            <dd>{{ $kelas -> nama_kelas }}</dd>
                            <dt>Jumlah Murid</dt>
                            <dd>{{ $datasiswa->where('kelas', '=', $kelas->nama_kelas)->count() }} siswa</dd>
                        </dl>
                        @endforeach
                        @else
                        @endif
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection