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
                            <li><a href="manajemenrapot"><small>Rapot</small></a></li>
                            <li class="active"><a href="manajemenakun"><small>Akun</small></a></li>
                            <li><a href="logout"><small>Keluar</small></a></li>
                        </ul>
                    </div>
                </div>
                <div class="span5">
                        <form method='POST'>
                        <dl class="dl-horizontal">
                            <dt>Nama</dt>
                            <dd><input type="text" name="displayName" id="displayName" disabled></dd>
                            <dt>Tingkatan</dt>
                            <dd><input type="text" name="displayLevel" id="displayLevel" disabled></dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt>Jabatan</dt>
                            <dd><input type="text" name="displayJabatan" id="displayJabatan" disabled></dd>
                            <dt>NIP</dt>
                            <dd><input type="text" name="displayNIP" id="displayNIP" value="123456" disabled></dd>
                            <dt>Kontak</dt>
                            <dd><input type="text" name="displayKontak" id="displayKontak" value="08123456789" disabled></dd>
                            <dt>Email</dt>
                            <dd><input type="text" name="displayEmail" id="displayEmail" value="admin@admin.com" disabled></dd>
                            <dt>Alamat</dt>
                            <dd><textarea name="displayAlamat" id="displayAlamat" disabled></textarea></dd>                            
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
                            <dd><input type="text" name="displayUsername" id="displayUsername" disabled></dd>
                        </dl>
                        <form method="POST" enctype="multipart/form-data" action="updateakunadmin">
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