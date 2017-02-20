@section('modalcontent1')
<div id="tambahsiswa" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Data Siswa</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdatasiswa">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-top;" width="20%">NIS</td>
        <td width="80%"><input type="text" id="inputNIS" placeholder="NIS" name="inputNIS" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Nama Siswa</td>
        <td><input type="text" id="inputNama" placeholder="Nama" name="inputNama" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Kelas</td>
        <td>
          <select id="inputKelas" name="inputKelas">
            @foreach($kelas as $datakelas)
            <option value="{{ $datakelas -> nama_kelas }}">{{ $datakelas -> nama_kelas }}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;">Angkatan</td>
        <td>
          <select id="inputAngkatan" name="inputAngkatan">
            @for ($tahun = 2000; $tahun < 2030; $tahun++)
              @if($tahun == date('Y'))
              <option value="{{ $tahun }}" selected>{{ $tahun }}</option>
              @else
              <option value="{{ $tahun }}">{{ $tahun }}</option>
              @endif
            @endfor
          </select>
        </td>
      </tr>
    </table>
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-small" value="Simpan Data">
    </form>
  </div>
</div>
@endsection