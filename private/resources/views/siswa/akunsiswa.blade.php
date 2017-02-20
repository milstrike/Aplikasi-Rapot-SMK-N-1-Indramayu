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
                            <li><a href="rapotekskulsiswa"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li class="active"><a href="editdatasiswa"><small>Edit Data Siswa</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span5">
                    <div class="paneleverything">
                        <strong>INFORMASI AKUN</strong>
                            <dl class="dl-horizontal">
                                <dt>Nama Akun</dt>
                                <dd><input type="text" name="accountname" value="{{ $akunsiswa -> first() -> nama }}" disabled></dd>
                                <dt>Level Akun</dt>
                                <dd><input type="text" name="accountlevel" value="siswa" disabled></dd>
                            </dl>
                            <strong>MENGGANTI PASSWORD</strong>
                            <form method="POST" enctype="multipart/form-data" action="updatepasswordsiswa">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <dl class="dl-horizontal">
                                <dt>Password lama</dt>
                                <dd><input type="password" name="oldpassword" required></dd>
                                <dt>Password baru</dt>
                                <dd><input type="password" name="newpassword" required></dd>
                                <dt>Masukkan ulang password baru</dt>
                                <dd><input type="password" name="newpassword2" required></dd>
                                <dt>&nbsp;</dt>
                                <dd style="margin-top: 10px;"><input type="submit" name="updateakun" class="btn btn-primary pull-right" value="Simpan Perubahan Akun"></dd>
                            </dl>
                            </form>
                    </div>
                </div>
                <div class="span5">
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
                    @if(Session::has('messageError'))
                          <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageError') }} </div>
                    @endif
                    <div class="paneleverything">
                        <strong>INFORMASI SISWA</strong>
                        <form method="POST" enctype="multipart/form-data" action="updatedatasiswa">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <dl class="dl-horizontal">
                                <dt>NIS</dt>
                                <dd><input type="text" name="nis" value="{{ $detailsiswa -> first() -> nis }}" disabled></dd>
                                <dt>Nama</dt>
                                <dd><input type="text" name="nama" value="{{ $detailsiswa -> first() -> nama }}" required></dd>
                                <dt>Kelas</dt>
                                <dd><input type="text" name="kelas" value="{{ $detailsiswa -> first() -> kelas }}" disabled></dd>
                                <dt>Angkatan</dt>
                                <dd><input type="text" name="angkatan" value="{{ $detailsiswa -> first() -> angkatan }}" disabled></dd>
                                <dt>&nbsp;</dt>
                                <dd style="margin-top: 10px;"><input type="submit" name="updatedata" class="btn btn-primary pull-right" value="Simpan Perubahan Informasi"></dd>
                            </dl>
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection