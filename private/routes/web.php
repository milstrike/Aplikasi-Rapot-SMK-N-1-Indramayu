<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/  

Route::get('/', function () {
    return view('login/home');
});
Route::post('loginsiswa', 'Rapotcontroller@loginsiswa');

Route::get('/loginwalikelas', function () {
    return view('login/home2');
});
Route::post('loginwalikelas', 'Rapotcontroller@loginwalikelas');

Route::get('/loginadministratorsekolah', function () {
    return view('login/home3');
});
Route::post('loginadministratorsekolah', 'Rapotcontroller@loginadministratorsekolah');

Route::get('/administrator', function () {
    return view('login/home4');
});


//Administrator Sekolah
//home Administrator Sekolah
Route::get('/adminsekolah', 'Rapotcontroller@getAllDataHome');
//Menampilkan Semua Data Guru
Route::get('/manajemenguru', 'Rapotcontroller@getAllDataGuru');
//Menambah Data Guru
Route::post('tambahdataguru', 'Rapotcontroller@tambahDataGuru');
//Mengedit Data Guru
Route::post('editdataguru', 'Rapotcontroller@editDataGuru');
//Menghapus Data Guru
Route::get('hapusdataguru/{id}', 'Rapotcontroller@hapusDataGuru');
//Import CSV Data Guru
Route::post('importcsvdataguru', 'Rapotcontroller@importcsvguru');



//Menampilkan semua data bidang studi
Route::get('/manajemenbidangstudi', 'Rapotcontroller@getAllDataBidangStudi');
//Menambahkan data bidang studi
Route::post('tambahdatabidangstudi', 'Rapotcontroller@tambahDataBidangStudi');
//Mengedit Data Bidang Studi
Route::post('editdatabidangstudi', 'Rapotcontroller@editDataBidangStudi');
//Menghapus Data Bidang Studi
Route::get('hapusdatabidangstudi/{id}', 'Rapotcontroller@hapusDataBidangStudi');



//Menampilkan semua data jurusan dan kelas
Route::get('/manajemenjurusan', 'Rapotcontroller@getAllDataJurusan');
//Menambah Data Jurusan
Route::post('tambahdatajurusan', 'Rapotcontroller@tambahDataJurusan');
//Mengedit Data Jurusan
Route::post('editdatajurusan', 'Rapotcontroller@editDataJurusan');
//Menghapus Data Jurusan
Route::get('hapusdatajurusan/{id}', 'Rapotcontroller@hapusDataJurusan');



//Menambah Data Kelas
Route::post('tambahdatakelas', 'Rapotcontroller@tambahDataKelas');
//Mengedit Data Kelas
Route::post('editdatakelas', 'Rapotcontroller@editDataKelas');
//Menghapus Data Kelas
Route::get('hapusdatakelas/{id}', 'Rapotcontroller@hapusDataKelas');
//Set Bidang Studi
Route::post('setbidangstudi', 'Rapotcontroller@setBidangStudi');



//Menampilkan semua data ekstrakulikuler
Route::get('/manajemenekstrakulikuler', 'Rapotcontroller@getAllDataEkstrakulikuler');
//Menambahkan data ekstrakulikuler
Route::post('tambahdataekstrakulikuler', 'Rapotcontroller@tambahDataEkstrakulikuler');
//Mengedit Data ekstrakulikuler
Route::post('editdataekstrakulikuler', 'Rapotcontroller@editDataEkstrakulikuler');
//Menghapus Data ekstrakulikuler
Route::get('hapusdataekstrakulikuler/{id}', 'Rapotcontroller@hapusDataEkstrakulikuler');



//Menampilkan semua data siswa
Route::get('/manajemensiswa', 'Rapotcontroller@getAllDataSiswa');
//Menambahkan data siswa
Route::post('tambahdatasiswa', 'Rapotcontroller@tambahDataSiswa');
//Mengedit Data Siswa
Route::post('editdatasiswa', 'Rapotcontroller@editDataSiswa');
//Menghapus data siswa
Route::get('hapusdatasiswa/{id}', 'Rapotcontroller@hapusDataSiswa');

//Import CSV Data Guru
Route::post('importcsvdatasiswa', 'Rapotcontroller@importcsvsiswa');

Route::get('/manajemenakun', function () {
    return view('admin_sekolah/akun');
});



//Manajemen Rapot
Route::get('/manajemenrapot', 'Rapotcontroller@getAllDataTahunRapot');
//Menambah Data Rapot
Route::post('tambahtahunajaran', 'Rapotcontroller@tambahDataTahunAjaran');
//Aktivasi Tahun Rapot
Route::get('aktivasitahunrapot/{id}', 'Rapotcontroller@setActiveTahunAjaran');
//Hapus Tahun Rapot
Route::get('hapusdatatahunajaran/{id}', 'Rapotcontroller@hapusDataTahunAjaran');
//Hapus Tahun Rapot
Route::get('setuprapot/{id}', 'Rapotcontroller@getAllDataRapot');
//Mengimport Data Siswa untuk rapot
Route::get('installrapot/{id}', 'Rapotcontroller@importDataSiswa');



//Menampilkan semua data wali
Route::get('/manajemenwali', 'Rapotcontroller@getAllDataWali');
//Mengupdate akun wali kelas
Route::post('editdatawali', 'Rapotcontroller@createDataWali');

//Mengupdate akun admin
Route::post('updateakunadmin', 'Rapotcontroller@updateAkunAdmin');





//Guru Wali kelas
Route::get('/walikelas', 'Rapotcontroller@walikelashome');

Route::get('/akunwalikelas', 'Rapotcontroller@akunwali');

Route::post('updateakunwali', 'Rapotcontroller@updateakunwali');

Route::post('updatecredentialakunwali', 'Rapotcontroller@updateCredentialAkunWali');

Route::get('rapotumum', 'Rapotcontroller@rapotumum');

//Memilih kelas -> melihat daftar siswa
Route::get('rapotkelas/{id}/kelas/{kelas}', 'Rapotcontroller@getDetailRapot');

//Memilih siswa -> melakukan penilaian semester 1
Route::get('nilaieditor1/{id}/idrapot/{idrapot}', 'Rapotcontroller@getRapotSiswa');

//Memilih siswa -> melakukan penilaian semester 2
Route::get('nilaieditor2/{id}/idrapot/{idrapot}', 'Rapotcontroller@getRapotSiswa2');

//Menyimpan nilai semester 1
Route::post('setnilai1', 'Rapotcontroller@updatenilai1');

//Menyimpan nilai semester 2
Route::post('setnilai2', 'Rapotcontroller@updatenilai2');

//Menampilkan data rapot PKL
Route::get('/rapotpkl', 'Rapotcontroller@getDetailRapotPKL');

//Memasukkan nilai PKL
Route::post('setnilaipkl', 'Rapotcontroller@updatenilaipkl');

//Memilih kelas -> melakukan penilaian
Route::get('/rapotkelaspkl', function () {
    return view('guru/rapotkelaspkl');
});

//get kelas berdasarkan wali kelas
Route::get('/rapotekskul', 'Rapotcontroller@rapotekskul');
//Memilih kelas -> melihat daftar siswa
Route::get('/rapotkelasekskul/{id}/kelas/{kelas}', 'Rapotcontroller@getDetailRapotEkskul');
//UpdateNilaiEkskul
Route::post('updatenilaiekskul','Rapotcontroller@getDataNilaiEkskul');

//siswa
Route::get('/siswa', 'Rapotcontroller@siswahome');
//Rapot umum siswa
Route::get('/rapotumumsiswa', 'Rapotcontroller@rapotumumsiswa');
//Rapot pkl siswa
Route::get('/rapotpklsiswa', 'Rapotcontroller@rapotpklsiswa');
//Rapot ekskul siswa
Route::get('/rapotekskulsiswa', 'Rapotcontroller@rapotekskulsiswa');
//Edit akun siswa
Route::get('/editdatasiswa', 'Rapotcontroller@editakunsiswa');
//Edit akun siswa
Route::get('lihatnilairapot/{id}', 'Rapotcontroller@lihatnilaiumum');
//Update data siswa
Route::post('updatedatasiswa', 'Rapotcontroller@updateDataSiswa');
//Update password siswa
Route::post('updatepasswordsiswa', 'Rapotcontroller@updateAkunSiswa');

Route::get('/logout', function () {
    Session::flush();
    return Redirect::to('/');;
});

