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
                            <li><a href="rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li><a href="akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10">
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
                    <div class="paneleverything">
                        <?php $no = 1; $index = 0;?>
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%"><small>#</small></th>
                                    <th style="text-align: center;" width="10%"><small>NIS</small></th>
                                    <th style="text-align: center;" width="25%"><small>Nama</small></th>
                                    <th style="text-align: center;" width="30%"><small>Kelas</small></th>
                                    <th style="text-align: center;" width="10%"><small>Nilai</small></th>
                                    <th style="text-align: center;" width="20%"><small>Keterangan</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="POST" enctype="multipart/form-data" action="setnilaipkl">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                @if($datapkl->count()>0)
                                @foreach($datapkl as $pkl)
                                    @if($kelas->count()>0)
                                        @foreach($kelas as $datakelas)
                                            @if($pkl->kelas == $datakelas->nama_kelas)
                                            <input type="hidden" name="idnilai[]" value="{{ $pkl->id }}">
                                            <tr>
                                                <td style="text-align: right;">{{ $no++ }}</td>
                                                <td style="text-align: center;">{{ $pkl->nis }}</td>
                                                <td>{{ $pkl->nama_siswa }}</td>
                                                <td style="text-align: center;">{{ $pkl->kelas }}</td>
                                                <td style="text-align: center;"><input type="text" style="text-align: right;" class="span5" name="nilaipkl[]" value="{{ $pkl->nilai }}"></td>
                                                <td style="text-align: center;"><textarea name="keteranganpkl[]">{{ $pkl->keterangan }}</textarea></td>
                                            </tr>
                                            @else
                                            @endif
                                        @endforeach
                                    @else
                                    @endif
                                @endforeach
                                @else
                                    <tr>
                                    <td colspan="6" style="text-align: center;"><small>Belum Ada data</small></td>
                                </tr>
                                @endif
                                @if($datapkl->count()>0)
                                    <input type="submit" class="btn btn-primary btn-small pull-left" style="margin-bottom: 10px;" value="Simpan Nilai">
                                @else
                                    <input type="submit" class="btn btn-small pull-left" style="margin-bottom: 10px;" value="Simpan Nilai" disabled>
                                @endif
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@endsection