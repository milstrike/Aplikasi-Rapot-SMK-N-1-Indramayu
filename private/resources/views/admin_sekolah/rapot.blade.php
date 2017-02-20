@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="adminsekolah"><small>Dashboard</small></a></li>
                            <li><a href="manajemenguru"><small>Tenaga Pengajar</small></a></li>
                            <li><a href="manajemenbidangstudi"><small>Bidang Studi</small></a></li>
                            <li><a href="manajemenekstrakulikuler"><small>Ekstrakulikuler</small></a></li>
                            <li><a href="manajemenjurusan"><small>Jurusan dan Kelas</small></a></li>
                            <li><a href="manajemenwali"><small>Wali Kelas</a></small></li>
                            <li><a href="manajemensiswa"><small>Siswa</small></a></li>
                            <li class="active"><a href="manajemenrapot"><small>Rapot</small></a></li>
                            <li><a href="manajemenakun"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span5">
                    <div class="paneleverything">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Tambah Tahun Ajaran
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <form method="POST" enctype="multipart/form-data" action="tambahtahunajaran">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input class="span12" type="text" name="tahunrapot" placeholder="Contoh: 2005/2007">
                                            <button class="btn btn-primary pull-right" type="submit">Tambahkan Tahun</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="paneleverything" style="margin-top:20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Tambah Tahun Ajaran Aktif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                       @if($tahun_rapot->count() > 0)
                                            @foreach ($tahun_rapot as $data)
                                            @if($data-> status == "Aktif")
                                        <h1 class="text-success">{{ $data -> tahun_ajaran }}</h1>
                                            @else
                                            @endif
                                            @endforeach
                                            @else
                                            <h1 class="text-success">-</h1>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    </div>


                    <div class="span5">
                        <div class="paneleverything">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        Arsip Rapot
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><strong>Tahun Ajaran</strong></td>
                                    <td style="text-align: center;"><strong>Status</strong></td>
                                    <td style="text-align: center;"><strong>Aksi</strong></td>
                                </tr>
                                @if($tahun_rapot->count() > 0)
                                @foreach ($tahun_rapot as $data)
                                <tr>
                                    <td style="text-align: center;"><small>{{ $data -> tahun_ajaran }}</small></td>
                                    @if($data -> status == "Tidak Aktif")
                                    <td style="text-align: center;"><small class="text-warning">{{ $data -> status }}</small></td>
                                    @else
                                    <td style="text-align: center;"><small class="text-success">{{ $data -> status }}</small></td>
                                    @endif
                                    <td style="text-align: center;"><small><a href="setuprapot/{{ $data -> id_rapot }}" onclick="window.open('setuprapot/{{ $data -> id_rapot }}', 'Setup-Rapot', 'width=1100, height=768'); return false;" title="Setup Rapot"><i class="icon-eye-open"></i></a>&nbsp;<a href="hapusdatatahunajaran/{{ $data -> id_rapot }}" title="Hapus Tahun Ajaran"><i class="icon-remove"></i></a>&nbsp;<a href="aktivasitahunrapot/{{ $data -> id_rapot }}" title="Aktifkan Tahun Ajaran"><i class="icon-ok"></i></a>&nbsp;<a href="#" title="Kunci Data Rapot"><i class="icon-lock"></i></a></small></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" style="text-align: center;"><small>Belum ada data tersimpan</small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection