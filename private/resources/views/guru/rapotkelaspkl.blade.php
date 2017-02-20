@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="walikelas"><small>Dashboard</small></a></li>
                            <li><a href="rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li class="active"><a href="rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li style="padding-left: 40px;"><small>Penilaian Siswa</small></li>
                            <li><a href="rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
                    <div style="height: 82%">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%"><small>#</small></th>
                                    <th style="text-align: center;" width="10%"><small>NIS</small></th>
                                    <th style="text-align: center;" width="25%"><small>Nama</small></th>
                                    <th style="text-align: center;" width="20%"><small>Kelas</small></th>
                                    <th style="text-align: center;" width="10%"><small>Nilai</small></th>
                                    <th style="text-align: center;" width="30%"><small>Keterangan</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" style="text-align: center;"><small>Belum Ada data</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@endsection