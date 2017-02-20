@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li> 
                            <li><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
                            <li><a href="manajemenjurusan"><small>Jurusan dan Kelas</small></a></li>
                            <li><a href="manajemenwali"><small>Wali Kelas</a></small></li>
                            <li><a href="manajemensiswa"><small>Siswa</small></a></li>
                            <li><a href="manajemenrapot"><small>Rapot</small></a></li>
                            <li><a href="manajemenakun"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div style="height: 82%" class="paneleverything">
                            <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;"><small>#</small></th>
                                    <th width="80%" style="text-align: center;"><small>Data</small></th>
                                    <th width="15%" style="text-align: center;"><small>Value</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: right;"><small>1</small></td>
                                    <td><small><strong>Total Siswa</strong></small></td>
                                    <td style="text-align: right"><small>{{ $datasiswa->count() }}</small></small></td>
                                </tr>
                                @if($datakelas->count() > 0)
                                @foreach($datakelas as $data)
                                <tr>
                                    <td></td>
                                    <td style="padding-left: 40px;"><small>{{ $data -> kelas}}</small></td>
                                    <td style="text-align: right"><small>{{ $data -> total }}</small></td>
                                </tr>
                                @endforeach
                                @else
                                @endif

                                <tr>
                                    <td style="text-align: right;"><small>2</small></td>
                                    <td><small><strong>Jumlah Tenaga Pengajar</strong></small></td>
                                    <td style="text-align: right"><small>{{ $dataguru -> count() }}</small></td>
                                </tr>

                                <tr>
                                    <td style="text-align: right;"><small>3</small></td>
                                    <td><small><strong>Jumlah Jurusan</strong></small></td>
                                    <td style="text-align: right"><small>{{ $datajurusan -> count() }}</small></td>
                                </tr>

                                <tr>
                                    <td style="text-align: right;"><small>4</small></td>
                                    <td><small><strong>Jumlah Kelas</strong></small></td>
                                    <td style="text-align: right"><small>{{ $dataclass -> count() }}</small></td>
                                </tr>

                                <tr>
                                    <td style="text-align: right;"><small>5 </small></td>
                                    <td><small><strong>Jumlah Bidang Studi</strong></small></td>
                                    <td style="text-align: right"><small>{{ $databidangstudi -> count() }}</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection