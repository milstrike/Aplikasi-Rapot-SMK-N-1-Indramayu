@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span12">

                    <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 4000);
                    </script>
                    @if(Session::has('messageUpdate'))
                          <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageUpdate') }} </div>
                    @endif

                    <a href="../installrapot/{{ $idrapot }}" role="button" class="btn btn-small btn-primary" style="margin-top:0;"><i class="icon-list-alt icon-white"></i>&nbsp;Muat data siswa</a>
                    <div class="paneleverything" style="margin-top: 10px;">
                        <strong>INFORMASI DASAR</strong>
                        <dl class="dl-horizontal">
                            @foreach($datarapot as $data)
                            <dt>Tahun Ajaran</dt>
                            <dd>{{ $data -> tahun_ajaran }}</dd>
                            <dt>Jumlah Siswa Terdaftar</dt>
                            <dd>{{ $jumlahsiswa }}</dd>
                            @endforeach
                        </dl>
                    </div>
                    <div class="tabbable" style="margin-top: 10px;">
                            <ul class="nav nav-tabs" style="margin-bottom:0;">
                                <li class="active"><a href="#tab1" data-toggle="tab">Rapot Bidang Studi</a></li>
                                <li><a href="#tab2" data-toggle="tab">Rapot Ekstrakulikuler</a></li>
                                <li><a href="#tab3" data-toggle="tab">Rapot PKL</a></li>
                            </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        
                                                            <div class="paneleverything" style="border: 1px solid #CCCCCC">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>NIS</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Nama Siswa</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Kelas</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Angkatan</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" colspan="2"><small><strong>Semester</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Aksi</strong></small></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; font-weight: normal; margin: 0; padding:0;"><small><strong>1</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; margin: 0; padding:0;"><small><strong>2</strong></small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($datasiswa) > 0)
                                @foreach($datasiswa as $siswa)
                                <tr>                                    
                                    <td>{{ $siswa -> nis }}</td>
                                    <td>{{ $siswa -> nama_siswa }}</td>
                                    <td>{{ $siswa -> kelas }}</td>
                                    <td style="text-align:center;">{{ $siswa -> angkatan }}</td>
                                    <td style="text-align:center;">
                                        @if(!$siswa -> semester_1 == '0')
                                            <span class="text-success">Nilai sudah masuk</span>
                                        @else
                                            <span class="text-error">Belum ada nilai masuk</span>
                                        @endif
                                    </td>
                                    <td style="text-align:center;">
                                         @if(!$siswa -> semester_2 == '0')
                                            <span class="text-success">Nilai sudah masuk</span>
                                        @else
                                            <span class="text-error">Belum ada nilai masuk</span>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" style="text-align: center;"><small><strong>Belum ada data siswa, muat dengan tombol "Muat data siswa"</strong></small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="paneleverything" style="border: 1px solid #CCCCCC">
                                            <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>NIS</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Nama Siswa</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Kelas</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Angkatan</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Ekstrakulikuler</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" colspan="2"><small><strong>Semester</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; vertical-align: middle; margin: 0; padding:0;" rowspan="2"><small><strong>Aksi</strong></small></th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; font-weight: normal; margin: 0; padding:0;"><small><strong>1</strong></small></th>
                                    <th style="text-align: center; font-weight: normal; margin: 0; padding:0;"><small><strong>2</strong></small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($dataekskulsiswa) > 0)
                                @foreach($dataekskulsiswa as $ekskulsiswa)
                                <tr>                                    
                                    <td>{{ $ekskulsiswa -> nis }}</td>
                                    <td>{{ $ekskulsiswa -> nama_siswa }}</td>
                                    <td>{{ $ekskulsiswa -> kelas }}</td>
                                    <td>{{ $ekskulsiswa -> angkatan }}</td>
                                    <td>{{ $ekskulsiswa -> nama_ekskul }}</td>
                                    <td style="text-align:center;">
                                        @if(!$ekskulsiswa -> semester_1 == '0')
                                            <span class="text-success">Nilai sudah masuk</span>
                                        @else
                                            <span class="text-error">Belum ada nilai masuk</span>
                                        @endif
                                    </td>
                                    <td style="text-align:center;">
                                         @if(!$ekskulsiswa -> semester_2 == '0')
                                            <span class="text-success">Nilai sudah masuk</span>
                                        @else
                                            <span class="text-error">Belum ada nilai masuk</span>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" style="text-align: center;"><small><strong>Belum ada data siswa, muat dengan tombol "Muat data siswa"</strong></small></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                                        </div>
                                    </div>

                            <div class="tab-pane" id="tab3">
                                <div class="paneleverything" style="border: 1px solid #CCCCCC">
                                    <table class="table table-hover table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; font-weight: normal;" rowspan="2"><small><strong>NIS</strong></small></th>
                                                <th style="text-align: center; font-weight: normal;" rowspan="2"><small><strong>Nama Siswa</strong></small></th>
                                                <th style="text-align: center; font-weight: normal;" rowspan="2"><small><strong>Kelas</strong></small></th>
                                                <th style="text-align: center; font-weight: normal;" rowspan="2"><small><strong>Angkatan</strong></small></th>
                                                <th style="text-align: center; font-weight: normal;" rowspan="2"><small><strong>Nilai</strong></small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @if(count($datapkl) > 0)
                                @foreach($datapkl as $pkl)
                                <tr>                                    
                                    <td>{{ $pkl -> nis }}</td>
                                    <td>{{ $pkl -> nama_siswa }}</td>
                                    <td>{{ $pkl -> kelas }}</td>
                                    <td>{{ $pkl -> angkatan }}</td>
                                    <td>{{ $pkl -> nilai }}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" style="text-align: center;"><small><strong>Belum ada data siswa, muat dengan tombol "Muat data siswa"</strong></small></td>
                                </tr>
                                @endif
                            </tbody>
                                </div>
                            </div>



                                </div>
                        </div>
            </div>
        </div>
</div>
@endsection