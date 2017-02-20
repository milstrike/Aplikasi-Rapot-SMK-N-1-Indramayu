
@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span2">
                    <div>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="home"><small>Dashboard</small></a></li>
                            <li><a href="rapotumum"><small>Penilaian Rapot</small></a></li>
                            <li><a href="rapotpkl"><small>Penilaian PKL</small></a></li>
                            <li><a href="rapotekskul"><small>Penilaian Ekstrakulikuler</small></a></li>
                            <li class="active"><a href="akunwalikelas"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span5">
                        <form method="POST" enctype="multipart/form-data" action="updateakunwali">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <dl class="dl-horizontal">
                            <dt>Nama</dt>
                            <dd><input type="text" name="displayName" id="displayName" value='{{ $detail_akun->first()->nama }}' disabled></dd>
                            <dt>Tingkatan</dt>
                            <dd><input type="text" name="displayLevel" id="displayLevel" value='Wali Kelas' disabled></dd>
                        </dl>
                        <!-- Editable -->
                        <dl class="dl-horizontal">
                            <dt>Jabatan</dt>
                            <dd><input type="text" name="displayJabatan" id="displayJabatan" value='{{ $detail_akun->first()->jabatan }}' disabled></dd>
                            <dt>NIP</dt>
                            <dd><input type="text" name="displayNIP" id="displayNIP" value="{{ $detail_akun->first()->nip }}" disabled></dd>
                            <dt>Kontak</dt>
                            <dd><input type="text" name="displayKontak" id="displayKontak" value="{{ $detail_guru->first()->telepon }}" required></dd>
                            <dt>Email</dt>
                            <dd><input type="text" name="displayEmail" id="displayEmail" value="{{ $detail_guru->first()->email }}" required></dd>
                            <dt>Alamat</dt>
                            <dd><textarea name="displayAlamat" id="displayAlamat" required>{{ $detail_guru->first()->alamat }}</textarea></dd>
                            <dt></dt>
                            <dd><input type="submit" class="btn btn-primary btn-small" value="Simpan Perubahan"></dd>
                        </dl>
                    </form>
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
                        <dl class="dl-horizontal">
                            <dt>Username</dt>
                            <dd><input type="text" name="displayUsername" id="displayUsername" value="{{ $detail_user->first()->user_mask}}" disabled></dd>
                        </dl>
                         <form method="POST" enctype="multipart/form-data" action="updatecredentialakunwali">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <dl class="dl-horizontal">
                            <dt><span class="text-info">Mengganti Password</span></dt>
                            <dd>&nbsp;</dd>
                            <dt>Password Lama</dt>
                            <dd><input type="password" name="oldpassword" id="oldpassword" required></dd>
                            <dt>Password Baru</dt>
                            <dd><input type="password" name="newpassword" id="newpassword" required></dd>
                            <dt>Ulangi Password</dt>
                            <dd><input type="password" name="newpassword2" id="newpassword2" required></dd>
                            <dt></dt>
                            <dd><input type="submit" class="btn btn-primary btn-small" value="Ganti Password"></dd>
                        </dl>    
                    </form> 
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection