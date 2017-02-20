@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="walikelas"><small>Dashboard</small></a></li>
                            <li><a href="rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li><a href="rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li class="active"><a href="rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <?php $no=1; ?>
                    <div class="paneleverything">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%"><small>#</small></th>                                        
                                    <th style="text-align: center;" width="40%"><small>Kelas</small></th>
                                    <th style="text-align: center;" width="15%"><small>Semester</small></th>
                                    <th style="text-align: center;" width="30%"><small>Tahun Ajaran</small></th>
                                    <th style="text-align: center;" width="15%"><small>Aksi</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($datakelas->count()>0)
                                @foreach($datakelas as $kelas)
                                    <tr>
                                        <td style="text-align: right;">{{ $no++ }}</td>
                                        <td>{{ $kelas->nama_kelas }}</td>
                                        <td style="text-align: center;">1 dan 2</td>
                                        <td style="text-align: center;">@foreach($detailrapot as $rapot) {{ $rapot->tahun_ajaran }} </td>
                                        <td style="text-align: center;"><a href="rapotkelasekskul/{{ $rapot->id_rapot }}/kelas/{{ preg_replace('/\s+/', '_', $kelas->nama_kelas) }}">Edit Rapot</a></td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                    <td colspan="4" style="text-align: center;"><small>Belum Ada data</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@endsection