@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="siswa"><small>Dashboard</small></a></li>
                            <li class="active"><a href="rapotumumsiswa"><small>Penilaian Rapot</small></a></li>
                            <li><a href="rapotpklsiswa"><small>Penilaian PKL</small></a></li>
                            <li><a href="rapotekskulsiswa"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="editdatasiswa"><small>Edit Data Siswa</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div class="paneleverything">
                        <div>
                            <?php $tahun = $detailsiswa -> first() -> telepon ?>
                            <table class="table table-bordered" style="width:300px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Tahun Ajaran</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: right;">1</td>
                                        <td>{{ $tahun }}/{{ $tahun+1}}</td>
                                        <td style="text-align: center;"><a href="lihatnilairapot/{{$tahun}}-{{$tahun+1}}" onclick="window.open('lihatnilairapot/{{$tahun}}-{{$tahun+1}}', 'Lihat-Rapot', 'width=1100, height=768'); return false;">Lihat Nilai</a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">2</td>
                                        <td>{{ $tahun+1 }}/{{ $tahun+2}}</td>
                                        <td style="text-align: center;"><a href="lihatnilairapot/{{$tahun+1}}-{{$tahun+2}}" onclick="window.open('lihatnilairapot/{{$tahun+1}}-{{$tahun+2}}', 'Lihat-Rapot', 'width=1100, height=768'); return false;">Lihat Nilai</a></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">3</td>
                                        <td>{{ $tahun+2 }}/{{ $tahun+3}}</td>
                                        <td style="text-align: center;"><a href="lihatnilairapot/{{$tahun+2}}-{{$tahun+3}}" onclick="window.open('lihatnilairapot/{{$tahun+2}}-{{$tahun+3}}', 'Lihat-Rapot', 'width=1100, height=768'); return false;">Lihat Nilai</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection