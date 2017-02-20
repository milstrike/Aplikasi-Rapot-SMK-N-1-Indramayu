@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="../../../walikelas"><small>Dashboard</small></a></li>
                            <li class="active"><a href="../../../rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li style="padding-left: 40px;"><small>Penilaian Siswa</small></li>
                            <li><a href="../../../rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li><a href="../../../rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="../../../akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="../../../logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div class="paneleverything">
                        <strong>INFORMASI KELAS</strong>
                        @if($detailrapot->count() > 0)
                            <table border="0" width="100%">
                            <tr>
                                <td width="10%">Kelas</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detailrapot->first()->kelas }} angkatan {{ $detailrapot->first()->angkatan }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Tahun Ajaran</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $masterrapot->first()->tahun_ajaran }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Jumlah Siswa</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detailrapot->count() }} siswa</td>
                            <tr>    
                            </table>
                        @else
                            <table border="0" width="100%">
                            <tr>
                                <td><strong>Data rapot belum siap, hubungi administrator sekolah</strong></td>
                            <tr>                            
                        </table>
                        @endif
                        
                    </div>
                    <div class="paneleverything" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="10%" rowspan="2"><small>NIS</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="30%" rowspan="2"><small>Nama</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="10%" rowspan="2"><small>Angkatan</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;" width="50%" colspan="2"><small>Set Nilai</small></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; padding:0;"><small>Semester 1</small></th>
                                    <th style="text-align: center; vertical-align: middle; padding:0;"><small>Semester 2</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($detailrapot->count() >0)
                                    @foreach($detailrapot as $detail)
                                        <tr>
                                            <td>{{ $detail -> nis }}</td>
                                            <td>{{ $detail -> nama_siswa}}</td>
                                            <td style="text-align: center;">{{ $detail -> angkatan}}</td>
                                            <td style="text-align: center;"><a href="../../../nilaieditor1/{{ $detail -> nis }}/idrapot/{{ $detail -> id_rapot }}" onclick="window.open('../../../nilaieditor1/{{ $detail -> nis }}/idrapot/{{ $detail -> id_rapot }}', 'Setup-Rapot', 'width=1100, height=768'); return false;" title="Set Nilai">Set Nilai</a></td>
                                            <td style="text-align: center;"><a href="../../../nilaieditor2/{{ $detail -> nis }}/idrapot/{{ $detail -> id_rapot }}" onclick="window.open('../../../nilaieditor2/{{ $detail -> nis }}/idrapot/{{ $detail -> id_rapot }}', 'Setup-Rapot', 'width=1100, height=768'); return false;" title="Set Nilai">Set Nilai</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                    <td colspan="5" style="text-align: center;"><small>Belum Ada data</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="pagination" style="text-align: right;">
                             <ul>
                                <small>{{ $detailrapot->links() }}</small>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection