@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="siswa"><small>Dashboard</small></a></li>
                            <li><a href="rapotumumsiswa"><small>Penilaian Rapot</small></a></li>
                            <li><a href="rapotpklsiswa"><small>Penilaian PKL</small></a></li>
                            <li class="active"><a href="rapotekskulsiswa"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="editdatasiswa"><small>Edit Data Siswa</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div class="paneleverything">
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle;" rowspan="2">#</th>
                                        <th style="text-align: center; vertical-align: middle;" rowspan="2">Tahun Ajaran</th>
                                        <th style="text-align: center; vertical-align: middle;" rowspan="2">Ekstrakulikuler</th>
                                        <th style="text-align: center; vertical-align: middle;" colspan="4">Nilai</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;" >Semester 1</th>
                                        <th style="text-align: center;" >Keterangan</th>
                                        <th style="text-align: center;" >Semester 2</th>
                                        <th style="text-align: center;" >Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @if($rapotekskul->count() > 0)
                                    @foreach($rapotekskul as $rapot)
                                        @foreach($tahunrapot as $tahun)
                                            @if($tahun->id_rapot == $rapot->id_rapot)
                                                <tr>
                                                    <td style="text-align: right;">{{ $no++ }}</td>
                                                    <td>{{ $tahun -> tahun_ajaran }}</td>
                                                    <td style="text-align: center;">{{ $rapot -> nama_ekskul }}</td>
                                                    <td style="text-align: center;">{{ $rapot -> nilai_1 }}</td>
                                                    <td style="text-align: center;">{{ $rapot -> deskripsi_1 }}</td>
                                                    <td style="text-align: center;">{{ $rapot -> nilai_2 }}</td>
                                                    <td style="text-align: center;">{{ $rapot -> deskripsi_2 }}</td>
                                                </tr>
                                            @else
                                            @endif
                                        @endforeach
                                    @endforeach
                                    @else
                                        <tr><td colspan="6" style="text-align: center;"><strong>Belum ada nilai ekstrakulikuler</strong></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection