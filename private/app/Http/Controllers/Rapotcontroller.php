<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;
use Session;
use View;
use Auth;


class Rapotcontroller extends Controller
{

    public function generateSerializeID($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function accountCreator($idUser, $username, $password, $level){
            $data = array(
                    'id_user' => $idUser,
                    'username' => md5($username),
                    'user_mask' => $username,
                    'password' => md5($password),
                    'pass_mask' => $password,
                    'level' => $level,
                    'remember_token' => ''
                    );

            DB::table('user')->insert($data);
    }

    public function detailAccountCreator($idUser, $nama, $jabatan, $nip, $telepon){
            $data = array(
                    'id_user' => $idUser,
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'nip' => $nip,
                    'telepon' => $telepon
                    );

            DB::table('detail_user')->insert($data);
    }

    public function updatePassword($password){
        $data = array(
            'password' => md5($password),
            'pass_mask' => $password
            );
        DB::table('user')->where('id_user','=',Session::get('id_user'))->update($data);
    }

    public function updatePasswordAdmin($password){
        $data = array(
            'password' => md5($password),
            'pass_mask' => $password
            );
        DB::table('user')->where('level','=','3')->update($data);
    }

    public function checkpassword($password){
        $data = DB::table('user')->where('pass_mask','=',$password)->get();
        return $data;
    }

    public function accountfinderbyName($name){
        $data = DB::table('detail_user')->where('nama', '=', $name)->get();
        $counter = count($data);
        return $counter;
    }

    public function accountfinderbyId($iduser){
        $data = DB::table('detail_user')->where('id_user', '=', $iduser)->get();
        return $data;   
    }

    public function accountfinderbyId2($user){
        $data = DB::table('user')->where('user_mask', '=', $user)->get();
        return $data;      
    }

    public function loginsiswa(){
    	$level = "1";
    	$matchThese = ['username' => md5(Input::get('user_id')), 'password' => md5(Input::get('pass_id')), 'level' => $level];
		$resultData = DB::table('user')->where($matchThese)->get();
    	if(count($resultData)){
            $userid = $this->accountfinderbyId2(Input::get('user_id'));
            Session::put('id_user',$userid->first()->id_user);
            Session::put('siswa', 'ok');
    		return Redirect::to('/siswa');
    	}
    	else{
    		return Redirect::to('/')->with('message','Username atau password salah!');	
    	}
    }

    public function loginwalikelas(){
    	$level = "2";
        $idaccount = "";
    	$matchThese = ['username' => md5(Input::get('user_id')), 'password' => md5(Input::get('pass_id')), 'level' => $level];
		$resultData = DB::table('user')->where($matchThese)->get();
    	if(count($resultData)){
            foreach($resultData as $resultdata){
                $idaccount = $resultdata -> id_user;
            }
            Session::put('walikelas', 'ok');
            Session::put('id_user', $idaccount);
    		return Redirect::to('/walikelas');
    	}
    	else{
    		return Redirect::to('/loginwalikelas')->with('message','Username atau password salah!');	
    	}
    }

    public function loginadministratorsekolah(){
    	$level = "3";
    	$matchThese = ['username' => md5(Input::get('user_id')), 'password' => md5(Input::get('pass_id')), 'level' => $level];
		$resultData = DB::table('user')->where($matchThese)->get();
    	if(count($resultData)){
            Session::put('adminsekolah', 'ok');
    		return Redirect::to('/adminsekolah');
    	}
    	else{
    		return Redirect::to('/loginadministratorsekolah')->with('message','Username atau password salah!');	
    	}
    }

    public function getAllDataHome(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $dataKelas = DB::table('siswa')->select('kelas', DB::raw('count(kelas) as total'))->groupBy('kelas')->get();
            $dataSiswa = DB::table('siswa')->get();
            $dataGuru = DB::table('guru')->get();
            $dataJurusan = DB::table('jurusan')->get();
            $Kelas = DB::table('kelas')->get();
            $dataBidangStudi = DB::table('bidang_studi')->get();
            return View::make('admin_sekolah/home')->with('datakelas',$dataKelas)->with('dataguru',$dataGuru)->with('datajurusan', $dataJurusan)->with('dataclass', $Kelas)->with('databidangstudi', $dataBidangStudi)->with('datasiswa', $dataSiswa);
        }

    }

    public function getAllDataGuru(){

        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('guru')->orderBy('nama', 'ASC')->paginate(10);
            return view('admin_sekolah.guru', ['guru' => $data]);
        }
    }


    public function tambahDataGuru(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id_guru = $this->generateSerializeID(8);
        $data = array(
            'id' => NULL,
            'id_guru' => $id_guru,
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon'),
            'email' => Input::get('inputEmail')
        );

        DB::table('guru')->insert($data);
        return Redirect::to('manajemenguru')->with('message', 'Berhasil menambah data guru.');
        }
    }  

    public function getDataGuruByName($name){
        $data = DB::table('guru')->where('nama','=',$name)->get();
        return $data;
    }

    public function hapusDataGuru($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('guru')->where('id_guru','=',$id)->delete();
            return Redirect::to('manajemenguru')->with('messageDelete', 'Berhasil menghapus data guru.');   
        }
    }

    public function editDataGuru(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('id_guru');
            $data = array(
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon'),
            'email' => Input::get('inputEmail')
            );
            DB::table('guru')->where('id_guru','=',$id)->update($data);
            return Redirect::to('manajemenguru')->with('messageUpdate', 'Berhasil mengupdate data guru.');   
        }
        
    }

    public function importcsvguru(){
    if (Input::hasFile('importdataguru')){

        $file = Input::file('importdataguru');
        $name = time() . '-' . $file->getClientOriginalName();
        // Moves file to folder on server
        $file->move(public_path() . '/uploads/CSV', $name);

        $this->addcsvtodatabase($name);

        return Redirect::to('manajemenguru')->with('messageUpdate', 'Berhasil mengupload csv guru.');   
        }
    else{
        return Redirect::to('manajemenguru')->with('messageDelete', 'Gagal memproses file');   
    }
    }

    public function addcsvtodatabase($filename){
        $handle = fopen(public_path() . '/uploads/CSV/'.$filename, "r");
        $header = true;
            while ($csvLine = fgetcsv($handle, 1000, ";")) {
                if ($header) {
                    $header = false;
                } else {
                    $data = array(
                        'id' => NULL,
                        'id_guru' => $this->generateSerializeID(8),
                        'nip' => $csvLine[0],
                        'nama' => $csvLine[1],
                        'alamat' => $csvLine[2],
                        'telepon' => $csvLine[3],
                        'email' => $csvLine[4],
                    );
                    DB::table('guru')->insert($data);
                }
            }
    }


    public function getAllDataBidangStudi(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('bidang_studi')->orderBy('id_pelajaran', 'ASC')->paginate(5);
            $guru = DB::table('guru')->orderBy('nama', 'ASC')->get();
            return view('admin_sekolah.bidangstudi', ['bidang_studi' => $data])->with('guru', $guru);
        }
    }

    public function tambahDataBidangStudi(){

        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = array(
            'id' => NULL,
            'id_pelajaran' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => str_replace(',', '-', Input::get('inputNama')),
            'deskripsi' => Input::get('inputDeskripsi'),
            'pengampu' => Input::get('inputGuruPengampu')
        );

        DB::table('bidang_studi')->insert($data);
        return Redirect::to('manajemenbidangstudi')->with('message', 'Berhasil menambah data bidang studi.');   
        }
    }

    public function hapusDataBidangStudi($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('bidang_studi')->where('id_pelajaran','=',$id)->delete();
            return Redirect::to('manajemenbidangstudi')->with('messageDelete', 'Berhasil menghapus data bidang studi.');   
        }
    }

    public function editDataBidangStudi(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('id_edit_bidang_studi');
            $data = array(
            'id_pelajaran' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => Input::get('inputNama'),
            'deskripsi' => Input::get('inputDeskripsi'),
            'pengampu' => Input::get('inputGuruPengampu')
            );
            DB::table('bidang_studi')->where('id_pelajaran','=',$id)->update($data);
            return Redirect::to('manajemenbidangstudi')->with('messageUpdate', 'Berhasil mengupdate data bidang studi.');   
        }
        
    }

    //Data Ekstrakulikuler
    public function getAllDataEkstrakulikuler(){

        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('ekstrakulikuler')->orderBy('nama', 'ASC')->paginate(5); 
            return view('admin_sekolah.ekskul', ['ekstrakulikuler' => $data]);
        }
    }

    public function tambahDataEkstrakulikuler(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = array(
            'id' => NULL,
            'id_ekskul' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => Input::get('inputNama'),
            'pembimbing' => Input::get('inputPembimbing'),
            'waktu' => Input::get('inputWaktu'),
            'deskripsi' => Input::get('inputDeskripsi')
        );

        DB::table('ekstrakulikuler')->insert($data);
        return Redirect::to('manajemenekstrakulikuler')->with('message', 'Berhasil menambah data ekstrakulikuler.');    
        }
    }   

    public function hapusDataEkstrakulikuler($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('ekstrakulikuler')->where('id_ekskul','=',$id)->delete();
            return Redirect::to('manajemenekstrakulikuler')->with('messageDelete', 'Berhasil menghapus data ekstrakulikuler.');   
        }
    }

    public function editDataEkstrakulikuler(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('id_edit_ekstrakulikuler');
        $data = array(
            'id_ekskul' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => Input::get('inputNama'),
            'pembimbing' => Input::get('inputPembimbing'),
            'waktu' => Input::get('inputWaktu'),
            'deskripsi' => Input::get('inputDeskripsi')
        );
        DB::table('ekstrakulikuler')->where('id_ekskul','=',$id)->update($data);
        return Redirect::to('manajemenekstrakulikuler')->with('messageUpdate', 'Berhasil mengupdate data ekstrakulikuler.');   
        }
    }


    //Data Jurusan dan Kelas
    public function getAllDataJurusan(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $datajurusan = DB::table('jurusan')->orderBy('nama', 'ASC')->get();
            $datakelas = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->paginate(5);
            $dataguru =  DB::table('guru')->orderBy('nama', 'ASC')->get();
            $databidangstudi = DB::table('bidang_studi')->orderBy('nama', 'ASC')->get();
            return view('admin_sekolah.jurusan', ['kelas' => $datakelas])->with('jurusan', $datajurusan)->with('guru', $dataguru)->with('bidangstudi', $databidangstudi);
        }
    }

    public function tambahDataJurusan(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = array(
            'id' => NULL,
            'id_jurusan' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => Input::get('inputNama'),
        );

        DB::table('jurusan')->insert($data);
        return Redirect::to('manajemenjurusan')->with('message', 'Berhasil menambah data jurusan.');   
        }
    }

    public function hapusDataJurusan($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('jurusan')->where('id_jurusan','=',$id)->delete();
            return Redirect::to('manajemenjurusan')->with('messageDelete', 'Berhasil menghapus data jurusan.');   
        }
    }

    public function editDataJurusan(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('id_edit_jurusan');
            $data = array(
            'id_jurusan' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama' => Input::get('inputNama'),
        );
            DB::table('jurusan')->where('id_jurusan','=',$id)->update($data);
            return Redirect::to('manajemenjurusan')->with('messageUpdate', 'Berhasil mengupdate data jurusan.');   
        }
    }

    public function cekDataKelas($namakelas){
        $status = 1;
        $statusData = DB::table('kelas')->where('nama_kelas','=',$namakelas)->get();
        if(count($statusData) > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        return $status;
    }

    public function tambahDataKelas(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = array(
            'id' => NULL,
            'id_kelas' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama_kelas' => Input::get('inputKelas')." ".Input::get('inputJurusan'),
            'wali_kelas' => Input::get('inputWaliKelas'),
            'bidang_studi' => '',
            'bidang_studi_2' => ''
        );

        $errorcek = $this->cekDataKelas(Input::get('inputKelas')." ".Input::get('inputJurusan'));
        if($errorcek == 1){
            return Redirect::to('manajemenjurusan')->with('messageDelete', 'Data kelas sudah ada, Anda dapat mengedit data kelas yang sudah pernah dibuat.');   
        }
        else{
            DB::table('kelas')->insert($data);
            return Redirect::to('manajemenjurusan')->with('message', 'Berhasil menambah data kelas.');   
        }
        }
    }

    public function editDataKelas(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('id_edit_kelas');
        $data = array(
            'id_kelas' => preg_replace('/\s+/', '', Input::get('inputKode')),
            'nama_kelas' => Input::get('inputKelas')." ".Input::get('inputJurusan'),
            'wali_kelas' => Input::get('inputWaliKelas')
        );

        DB::table('kelas')->where('id_kelas','=',$id)->update($data);
        return Redirect::to('manajemenjurusan')->with('messageUpdate', 'Berhasil mengupdate data kelas.');   
        }
    }

    public function hapusDataKelas($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('kelas')->where('id_kelas','=',$id)->delete();
            return Redirect::to('manajemenjurusan')->with('messageDelete', 'Berhasil menghapus data jurusan.');   
        }
    }

    public function setBidangStudi(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $bidangstudi1 = "";
            $bidangstudi2 = "";
            $id = Input::get('id_set_bidang_studi');

            if(empty(Input::get('bidangstudi'))){
                $bidangstudi1 = '0'; 
            }
            else{
                $bidangstudi1 = implode(' | ', Input::get('bidangstudi')); 
            }


            if(empty(Input::get('bidangstudi2'))){
                $bidangstudi2 = '0';
            }
            else{
                $bidangstudi2 = implode(' | ', Input::get('bidangstudi2'));
            }

            $data = array(
                    'bidang_studi' => $bidangstudi1,
                    'bidang_studi_2' => $bidangstudi2
                    );
            

            DB::table('kelas')->where('id_kelas','=',$id)->update($data);
            return Redirect::to('manajemenjurusan')->with('messageUpdate', 'Berhasil mengupdate data kelas.');   
        }
    }


    //Data Siswa
    public function getAllDataSiswa(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $datasiswa = DB::table('siswa')->orderBy('angkatan', 'ASC')->paginate(10);
            $datakelas = DB::table('kelas')->orderBy('nama_kelas', 'ASC')->get();
            return view('admin_sekolah.siswa', ['siswa' => $datasiswa])->with('kelas', $datakelas);
        }
    }


    public function tambahDataSiswa(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id_siswa = $this->generateSerializeID(8);
            $level = 1;
            $nis = Input::get('inputNIS');
            $kelas = Input::get('inputKelas');
            $angkatan = Input::get('inputAngkatan');
            $nama = Input::get('inputNama');
            $jabatan = "siswa ".$kelas;

        $data = array(
            'id' => NULL,
            'id_siswa' => $id_siswa,
            'nis' => $nis,
            'nama' => $nama,
            'kelas' => $kelas,
            'angkatan' => $angkatan
        );

        
        $this->accountCreator($id_siswa, $nis, $nis, $level);
        $this->detailAccountCreator($id_siswa, $nama, $jabatan, $nis, $angkatan);


        DB::table('siswa')->insert($data);
        return Redirect::to('manajemensiswa')->with('message', 'Berhasil menambah data siswa.');   
        }
    }  


    public function hapusDataSiswa($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('siswa')->where('id_siswa','=',$id)->delete();
            return Redirect::to('manajemensiswa')->with('messageDelete', 'Berhasil menghapus data siswa.');   
        }
    }

    public function editDataSiswa(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id = Input::get('idSiswa');
            $data = array(
                'nis' => Input::get('inputNIS'),
                'nama' => Input::get('inputNama'),
                'kelas' => Input::get('inputKelas'),
                'angkatan' => Input::get('inputAngkatan')
            );

            DB::table('siswa')->where('id_siswa','=',$id)->update($data);
            return Redirect::to('manajemensiswa')->with('messageUpdate', 'Berhasil mengupdate data siswa.');   
        }
    }

    public function importcsvsiswa(){
    if (Input::hasFile('importdatasiswa')){

        $file = Input::file('importdatasiswa');
        $name = time() . '-' . $file->getClientOriginalName();
        // Moves file to folder on server
        $file->move(public_path() . '/uploads/CSV', $name);

        $this->addcsvsiswatodatabase($name);

        return Redirect::to('manajemensiswa')->with('messageUpdate', 'Berhasil mengupload csv siswa.');   
        }
    else{
        return Redirect::to('manajemensiswa')->with('messageDelete', 'Gagal memproses file');   
    }
    }

    public function addcsvsiswatodatabase($filename){
        $handle = fopen(public_path() . '/uploads/CSV/'.$filename, "r");
        $header = true;

        $level = 1;    

            while ($csvLine = fgetcsv($handle, 1000, ";")) {
                if ($header) {
                    $header = false;
                } else {
                    $id_siswa = $this->generateSerializeID(8);
                    $nis = $csvLine[0];
                    $nama = $csvLine[1];
                    $kelas = $csvLine[2];
                    $angkatan = $csvLine[3];
                    $jabatan = "siswa ".$kelas;
                    $data = array(
                        'id' => NULL,
                        'id_siswa' => $id_siswa,
                        'nis' => $nis,
                        'nama' => $nama,
                        'kelas' => $kelas,
                        'angkatan' => $angkatan
                    );
                    $this->accountCreator($id_siswa, $nis, $nis, $level);
                    $this->detailAccountCreator($id_siswa, $nama, $jabatan, $nis, $angkatan);

                    DB::table('siswa')->insert($data);
                }
            }
    }


    //Data Tahun Ajaran
    public function getAllDataTahunRapot(){

        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('tahun_rapot')->orderBy('tahun_ajaran', 'ASC')->paginate(20); 
            return view('admin_sekolah.rapot', ['tahun_rapot' => $data]);
        }
    }

    public function tambahDataTahunAjaran(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $id_rapot = $this->generateSerializeID(8);
            $data = array(
                'id' => NULL,
                'id_rapot' => $id_rapot,
                'tahun_ajaran' => Input::get('tahunrapot'),
                'semester' => '0',
                'status' => 'Tidak Aktif'
            );

            DB::table('tahun_rapot')->insert($data);
            return Redirect::to('manajemenrapot');   
        }
    }  

    public function setActiveTahunAjaran($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = array(
                'status' => 'Tidak Aktif'
            );
            $data2 = array(
                'status' => 'Aktif'
            );
            DB::table('tahun_rapot')->update($data);
            DB::table('tahun_rapot')->where('id_rapot','=',$id)->update($data2);
            return Redirect::to('manajemenrapot');   
        }
    }

    public function getActiveTahunAjaran(){
        $data = DB::table('tahun_rapot')->where('status','=','Aktif')->get();
        return $data;
    }

    public function getActiveTahunAjaranByTahun($tahun){
        $tahun = str_replace('-', '/', $tahun);
        $data = DB::table('tahun_rapot')->where('tahun_ajaran','=',$tahun)->get();
        return $data;
    }   


    public function hapusDataTahunAjaran($id){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            DB::table('tahun_rapot')->where('id_rapot','=',$id)->delete();
            return Redirect::to('manajemenrapot');   
        }
    }

    //Rapot
    public function getAllDataRapot($idtahunrapot){

        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('tahun_rapot')->where('id_rapot','=',$idtahunrapot)->get();
            $jumlahsiswa = DB::table('rapot')->where('id_rapot','=',$idtahunrapot)->get();
            $jumlahsiswa2 = DB::table('rapot_ekskul')->where('id_rapot','=',$idtahunrapot)->get();
            $jumlahsiswa3 = DB::table('rapot_pkl')->where('id_rapot','=',$idtahunrapot)->get();

            return View::make('admin_sekolah/setuprapot')->with('datarapot',$data)->with('idrapot', $idtahunrapot)->with('jumlahsiswa', count($jumlahsiswa))->with('datasiswa', $jumlahsiswa)->with('dataekskulsiswa', $jumlahsiswa2)->with('datapkl',$jumlahsiswa3);
        }
    }

    //create Data Rapot
    public function createDataRapot($idtahunrapot, $kelas, $angkatan, $nis, $namasiswa){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');
        }
        else{            
            $data = array(
                'id' => NULL,
                'id_rapot' => $idtahunrapot,
                'kelas' => $kelas,
                'angkatan' => $angkatan,
                'nis' => $nis,
                'nama_siswa' => $namasiswa,
                'bidang_studi_1' => $this->getDataBidang1($kelas),
                'semester_1' => '0',
                'keterangan_1' => '0',
                'bidang_studi_2' => $this->getDataBidang2($kelas),
                'semester_2' => '0',
                'keterangan_2' => '0',
                'penginput' => ''
            );

            $data2 = array(
                'id' => NULL,
                'id_rapot' => $idtahunrapot,
                'nama_ekskul' => '',
                'nama_siswa' => $namasiswa,
                'nis' => $nis,
                'kelas' => $kelas,
                'angkatan' => $angkatan,
                'semester_1' => '0',
                'nilai_1' => '0',
                'deskripsi_1' => '',
                'semester_2' => '0',
                'nilai_2' => '0',
                'deskripsi_2' => '',
                'penginput' => ''  
            );

            DB::table('rapot')->insert($data);
            DB::table('rapot_ekskul')->insert($data2);
        }
    }

    //create Data Rapot
    public function createDataRapotPKL($idtahunrapot, $kelas, $angkatan, $nis, $namasiswa){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');
        }
        else{            
            $data = array(
                'id' => NULL,
                'id_rapot' => $idtahunrapot,
                'nis' => $nis,
                'kelas' => $kelas,
                'angkatan' => $angkatan,
                'nama_siswa' => $namasiswa,
                'nilai' => '0',
                'keterangan' => '',
                'penginput' => '' 
            );

            DB::table('rapot_pkl')->insert($data);
        }
    }

    public function getDataBidang1($kelas){
        $bidangstudi = "";
        $datakelas = DB::table('kelas')->where("nama_kelas","=",$kelas)->get();
        foreach ($datakelas as $databidangstudi) {
            $bidangstudi = $databidangstudi->bidang_studi;
        }
        return $bidangstudi;
    }

        public function getDataBidang2($kelas){
        $bidangstudi = "";
        $datakelas = DB::table('kelas')->where("nama_kelas","=",$kelas)->get();
        foreach ($datakelas as $databidangstudi) {
            $bidangstudi = $databidangstudi->bidang_studi_2;
        }
        return $bidangstudi;
    }

    //MenambahkanDataSiswa
    public function importDataSiswa($idtahunrapot){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $data = DB::table('siswa')->get();

            if(count($data)<1){
                return Redirect::to('setuprapot/'.$idtahunrapot)->with('messageUpdate','Data siswa belum ada');; 
            }
            else{
                $datapkl = DB::table('siswa')->where('kelas','LIKE','%XI %')->get();
                if(count($datapkl)<1){

                }
                else{
                    foreach ($datapkl as $datarapotpkl) {
                        $this->createDataRapotPKL($idtahunrapot, $datarapotpkl->kelas, $datarapotpkl->angkatan, $datarapotpkl->nis, $datarapotpkl->nama);
                    }
                }

                foreach ($data as $datasiswa) {
                $this->createDataRapot($idtahunrapot, $datasiswa->kelas, $datasiswa->angkatan, $datasiswa->nis, $datasiswa->nama);
                }
                return Redirect::to('setuprapot/'.$idtahunrapot)->with('messageUpdate','Setup rapot berhasil dilakukan');
            }

        }
    }


    public function getAllDataWali(){
        if(!Session::has('adminsekolah'))
        {
            return Redirect::to('/loginadministratorsekolah');;
        }
        else{
            $dataWali = DB::table('kelas')->orderBy('wali_kelas')->paginate(10);
            return View::make('admin_sekolah/wali', ['datawali' => $dataWali]);
        }

    }


    public function createDataWali(){
        $id_user = $this->generateSerializeID(8);
        $nama = Input::get('id_wali');
        $username = Input::get('inputUsername');
        $password = Input::get('inputPassword');
        $nip = '';
        $telepon = '';
        $level = '2';
        $jabatan = 'wali kelas';
        $dataguru = $this->getDataGuruByName($nama);
        foreach ($dataguru as $dataGuru) {
            $nip = $dataGuru -> nip;
            $telepon = $dataGuru -> telepon;
        }

        if($this->accountfinderbyName($nama) == 0){
            $this->accountCreator($id_user, $username, $password, $level);
            $this->detailAccountCreator($id_user, $nama, $jabatan, $nip, $telepon);
            return Redirect::to('manajemenwali')->with('messageUpdate', 'Akun wali kelas berhasil diupdate dan aktif.');
        }
        else{
            return Redirect::to('manajemenwali')->with('messageDelete', 'Akun wali kelas ini sudah ada dan aktif.');
        }

    }

    public function updateAkunAdmin(){
        $oldpassword = Input::get('oldpassword');
        $newpassword = Input::get('newpassword');
        $repassword = Input::get('newpassword2');

        $cekpassword = $this -> checkpassword($oldpassword);
        if(count($cekpassword) > 0){
            if($newpassword != $repassword){
                return Redirect::to('manajemenakun')->with('messageError','Password baru yang dimasukkan tidak cocok');   
            }
            else{
               $this->updatePasswordAdmin($repassword);
               return Redirect::to('manajemenakun')->with('messageUpdate','Password berhasil diupdate');  
            }
        }
        else{
        return Redirect::to('manajemenakun')->with('messageError','Password lama tidak cocok');
        }
    }


    //ControllerWaliKelas
    public function walikelashome(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $namawali = "";
            $datahome = $this->accountfinderbyId(Session::get('id_user'));
            foreach($datahome as $dataHome){
                $namawali = $dataHome -> nama;
            }
            $datakelas = DB::table('kelas')->where('wali_kelas', '=', $namawali)->get();
            $datasiswa = DB::table('siswa')->get();
            return View::make('guru/home')->with('detailakun', $datahome)->with('datakelas', $datakelas)->with('datasiswa', $datasiswa);
        }        
    }

    public function rapotumum(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $namawali = "";
            $datahome = $this->accountfinderbyId(Session::get('id_user'));
            foreach($datahome as $dataHome){
                $namawali = $dataHome -> nama;
            }
            $detailrapot = $this->getActiveTahunAjaran();
            $datakelas = DB::table('kelas')->where('wali_kelas', '=', $namawali)->get();

            return View::make('guru/rapotumum')->with('detailrapot', $detailrapot)->with('datakelas', $datakelas);
        }
    }

    public function getDetailRapot($id, $kelas){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $id_rapot = $id;
            $kelas = str_replace('_', ' ', $kelas);
            $masterrapot = DB::table('tahun_rapot')->where('id_rapot','=',$id_rapot)->get();
            $detailrapot = DB::table('rapot')->where([['id_rapot', '=', $id_rapot],['kelas','=',$kelas]])->orderBy('nama_siswa', 'ASC')->paginate(10);
            return View::make('guru/rapotkelas',['detailrapot' => $detailrapot])->with('masterrapot', $masterrapot);
        }
    }

    public function getRapotSiswa($id, $idrapot){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');
        }
        else{
            $detailrapot = DB::table('rapot')->where([['nis','=',$id],['id_rapot','=',$idrapot]])->get();
            return View::make('guru/nilaieditor')->with('detailrapot',$detailrapot);
        }
    }

    public function getRapotSiswa2($id, $idrapot){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');
        }
        else{
            $detailrapot = DB::table('rapot')->where([['nis','=',$id],['id_rapot','=',$idrapot]])->get();
            return View::make('guru/nilaieditor2')->with('detailrapot',$detailrapot);
        }
    }

    public function updatenilai1(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');
        }
        else{
            $nis = Input::get('nis');
            $idrapot = Input::get('idrapot');
            $nilai = implode('|', Input::get('skor1')); 
            $keterangan = implode('|', Input::get('keterangan1')); 
            $data = array(
                        'semester_1' => $nilai,
                        'keterangan_1' => $keterangan,
                    );
            DB::table('rapot')->where([['nis','=',$nis],['id_rapot','=',$idrapot]])->update($data);
            return Redirect::to('nilaieditor1/'.$nis.'/idrapot/'.$idrapot)->with('messageUpdate','Data rapot semester 1 berhasil disimpan');
        }   
    }

    public function updatenilai2(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');
        }
        else{
            $nis = Input::get('nis');
            $idrapot = Input::get('idrapot');
            $nilai = implode('|', Input::get('skor2')); 
            $keterangan = implode('|', Input::get('keterangan2')); 
            $data = array(
                        'semester_2' => $nilai,
                        'keterangan_2' => $keterangan,
                    );
            DB::table('rapot')->where([['nis','=',$nis],['id_rapot','=',$idrapot]])->update($data);
            return Redirect::to('nilaieditor2/'.$nis.'/idrapot/'.$idrapot)->with('messageUpdate','Data rapot semester 2 berhasil disimpan');
        }   
    }

    public function updatenilaipkl(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');
        }
        else{
            $idnilai = Input::get('idnilai');
            $nilaipkl = Input::get('nilaipkl');
            $keteranganpkl = Input::get('keteranganpkl');
            $datalength = count($idnilai);
            for($i=0; $i<$datalength; $i++){
                $this->createnilaipkl($idnilai[$i], $nilaipkl[$i], $keteranganpkl[$i]);
            }
            return Redirect::to('rapotpkl')->with('messageUpdate', 'Nilai PKL berhasil diupdate');
        }
    }

    public function createnilaipkl($id, $nilai, $keterangan){
        $data = array(
                'nilai' => $nilai,
                'keterangan' => $keterangan
            );
        DB::table('rapot_pkl')->where('id','=',$id)->update($data);
    }

    public function rapotekskul(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $namawali = "";
            $datahome = $this->accountfinderbyId(Session::get('id_user'));
            foreach($datahome as $dataHome){
                $namawali = $dataHome -> nama;
            }
            $detailrapot = $this->getActiveTahunAjaran();
            $datakelas = DB::table('kelas')->where('wali_kelas', '=', $namawali)->get();

            return View::make('guru/rapotekskul')->with('detailrapot', $detailrapot)->with('datakelas', $datakelas);
        }
    }

    public function getDetailRapotEkskul($id, $kelas){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $id_rapot = $id;
            $kelasidentifier = $kelas;
            $kelas = str_replace('_', ' ', $kelas);
            $masterekskul = DB::table('ekstrakulikuler')->orderBy('nama')->get();
            $masterrapot = DB::table('tahun_rapot')->where('id_rapot','=',$id_rapot)->get();
            $detailrapot = DB::table('rapot_ekskul')->where([['id_rapot', '=', $id_rapot],['kelas','=',$kelas]])->orderBy('nama_siswa', 'ASC')->paginate(10);
            return View::make('guru/rapotkelasekskul',['detailrapot' => $detailrapot])->with('masterrapot', $masterrapot)->with('masterekskul', $masterekskul)->with('idrapotset',$id_rapot)->with('kelasset',$kelasidentifier);
        }
    }

    public function getDataNilaiEkskul(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $idsiswa = Input::get('idnilai');
            $id_rapot = Input::get('idrapot');
            $kelasidentifier = str_replace('_', ' ', Input::get('kelas'));
            $kelas = Input::get('kelas');
            $opsiekskul = Input::get('ekskuloption');
            $nilai1 = Input::get('nilai1');
            $nilai2 = Input::get('nilai2');
            $keterangan1 = Input::get('keterangan1');
            $keterangan2 = Input::get('keterangan2');
            $datalength = count($opsiekskul);
            for($i=0; $i<$datalength; $i++){
                $this->updateNilaiEkskul($idsiswa[$i], $opsiekskul[$i], $nilai1[$i], $keterangan1[$i], $nilai2[$i], $keterangan2[$i]);
            }


            return Redirect::to('rapotkelasekskul/'.$id_rapot.'/kelas/'.$kelas)->with('messageUpdate', 'Nilai Ekstrakulikuler kelas '.$kelasidentifier.' Berhasil diupdate');
        }
    }

    public function updateNilaiEkskul($idrapot, $opsiekskul, $nilai1, $keterangan1, $nilai2, $keterangan2){
        $data = array(
                    'nama_ekskul' => $opsiekskul,
                    'nilai_1' => $nilai1,
                    'deskripsi_1' => $keterangan1,
                    'nilai_2' => $nilai2,
                    'deskripsi_2' => $keterangan2
                );
        DB::table('rapot_ekskul')->where('id','=',$idrapot)->update($data);
    }

    public function getDetailRapotPKL(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            
            $datahome = $this->accountfinderbyId(Session::get('id_user'));
            $namawali = $datahome -> first() -> nama;

            $tahunaktif = $this->getActiveTahunAjaran();
            $idrapot = $tahunaktif->first()-> id_rapot;

            $datakelas = DB::table('kelas')->where('wali_kelas', '=', $namawali)->get();
            $datarapotpkl = DB::table('rapot_pkl')->where('id_rapot', '=', $idrapot)->get();

            return View::make('guru/rapotpkl')->with('kelas', $datakelas)->with('datapkl',$datarapotpkl);
        }
    }

    public function akunwali(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $id_user = Session::get('id_user');
            $user_detail = DB::table('user')->where('id_user','=',$id_user);
            $detail_akun = DB::table('detail_user')->where('id_user','=',$id_user);
            $detail_guru = DB::table('guru')->where('nip','=', $detail_akun->first()->nip);
            return View::make('guru/akun')->with('detail_akun',$detail_akun)->with('detail_guru',$detail_guru)->with('detail_user',$user_detail);
        }
    }

    public function updateakunwali(){
        if(!Session::has('walikelas'))
        {
            return Redirect::to('/loginwalikelas');;
        }
        else{
            $id_user = Session::get('id_user');
            $nama = Input::get('displayName');
            $nip = Input::get('displayNIP');
            $kontak = Input::get('displayKontak');
            $email = Input::get('displayEmail');
            $alamat = Input::get('displayAlamat');

            $data1 = array(
                        'nip' => $nip,
                        'telepon' => $kontak
                    );
            $data2 = array(
                        'nip' => $nip,
                        'alamat' => $alamat,
                        'telepon' => $kontak,
                        'email' => $email
                    );
            $getIDGuru = DB::table('guru')->where('nip','=',$nip)->get();
            $id_guru = $getIDGuru->first()->id_guru;

            DB::table('detail_user')->where('id_user','=',$id_user)->update($data1);
            DB::table('guru')->where('id_guru','=',$id_guru)->update($data2);


            return Redirect::to('akunwalikelas')->with('messageUpdate','Berhasil mengupdate detail akun');
        }   
    }

    public function updateCredentialAkunWali(){
        $oldpassword = Input::get('oldpassword');
        $newpassword = Input::get('newpassword');
        $repassword = Input::get('newpassword2');

        $cekpassword = $this -> checkpassword($oldpassword);
        if(count($cekpassword) > 0){
            if($newpassword != $repassword){
                return Redirect::to('akunwalikelas')->with('messageError','Password baru yang dimasukkan tidak cocok');   
            }
            else{
               $this->updatePassword($repassword);
               return Redirect::to('akunwalikelas')->with('messageUpdate','Password berhasil diupdate');  
            }
        }
        else{
        return Redirect::to('akunwalikelas')->with('messageError','Password lama tidak cocok');
        }
    }

    public function siswahome(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');;
        }
        else{
            $data = $this->getActiveTahunAjaran();
            $idrapot = $data -> first() -> id_rapot;
            $datasiswa = DB::table('siswa')->where('id_siswa','=',Session::get('id_user'))->get();
            $nis = $datasiswa -> first() -> nis;
            $datarapot = DB::table('rapot') -> where([['nis','=',$nis],['id_rapot','=',$idrapot]]) -> get();
            //$detailrapot = DB::table('rapot')->where([['nis','=',$id],['id_rapot','=',$idrapot]])->get();
            return View::make('siswa/home')->with('datanilai', $data)->with('datarapot', $datarapot);
        }
    }

    public function rapotumumsiswa(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
            $detailsiswa = $this->accountfinderbyId(Session::get('id_user'));
            return View::make('siswa/rapotumum')->with('detailsiswa', $detailsiswa);
        }
    }

    public function rapotekskulsiswa(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
            $data = DB::table('siswa')->where('id_siswa','=',Session::get('id_user'))->get();
            $rapotekskul = DB::table('rapot_ekskul')->where('nis','=',$data->first()->nis)->get();
            $tahunrapot = DB::table('tahun_rapot')->get();
            return View::make('siswa/rapotekskul')->with('rapotekskul', $rapotekskul)->with('tahunrapot', $tahunrapot);
        }
    }

    public function rapotpklsiswa(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
            $detailsiswa = $this->accountfinderbyId(Session::get('id_user'));
            $nilairapotpkl = DB::table('rapot_pkl')->where('nis','=',$detailsiswa->first()->nip);
            return View::make('siswa/rapotpkl')->with('nilaipkl', $nilairapotpkl);
        }   
    }

    public function editakunsiswa(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
            $akunsiswa = $this->accountfinderbyId(Session::get('id_user'));
            $detailakunsiswa = $this->accountfinderbyId2(Session::get('id_user'));
            $detailsiswa = DB::table('siswa')->where('id_siswa','=',Session::get('id_user'))->get();
            return View::make('siswa/akunsiswa')->with('akunsiswa',$akunsiswa)->with('detailakunsiswa',$detailakunsiswa)->with('detailsiswa',$detailsiswa);
        }   
    }

    
    public function lihatnilaiumum($tahun){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
                $data = $this->getActiveTahunAjaranByTahun($tahun);
                if(count($data) > 0){
                    $idrapot = $data -> first() -> id_rapot;
                    $datasiswa = DB::table('siswa')->where('id_siswa','=',Session::get('id_user'))->get();
                    $nis = $datasiswa -> first() -> nis;
                    $datarapot = DB::table('rapot') -> where([['nis','=',$nis],['id_rapot','=',$idrapot]]) -> get();
                    return View::make('siswa/lihatnilai')->with('datanilai', $data)->with('datarapot', $datarapot);
                }
                else{
                    return View::make('siswa/nonilai');   
                }

        }
    }

    public function updateDataSiswa(){
        if(!Session::has('siswa'))
        {
            return Redirect::to('/loginsiswa');
        }
        else{
                $id_user = Session::get('id_user');
                $data = array(
                    'nama' => Input::get('nama')
                );

                DB::table('siswa')->where('id_siswa','=',$id_user)->update($data);
                DB::table('detail_user')->where('id_user','=',$id_user)->update($data);

                return Redirect::to('editdatasiswa')->with('messageUpdate','Informasi Siswa berhasil diupdate');  
        }
    }

    public function updateAkunSiswa(){
        $oldpassword = Input::get('oldpassword');
        $newpassword = Input::get('newpassword');
        $repassword = Input::get('newpassword2');

        $cekpassword = $this -> checkpassword($oldpassword);
        if(count($cekpassword) > 0){
            if($newpassword != $repassword){
                return Redirect::to('editdatasiswa')->with('messageError','Password baru yang dimasukkan tidak cocok');   
            }
            else{
               $this->updatePassword($repassword);
               return Redirect::to('editdatasiswa')->with('messageUpdate','Password berhasil diupdate');  
            }
        }
        else{
        return Redirect::to('editdatasiswa')->with('messageError','Password lama tidak cocok');
        }
    }
}
