@section('modalcontent2')
<div id="tambahkelas" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Kelas</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdatakelas">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: middle;" width="20%"><label>Kode Kelas</label></td>
        <td width="80%"><input type="text" id="inputKode" placeholder="Kode Kelas" name="inputKode" class="span5"></td>
      </tr>
      <tr>
        <td colspan="2">
          <table width="100%">
            <tr>
              <td>
                <label>Kelas</label>
                <select id="inputKelas" name="inputKelas">
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </td>
              <td>
                <label>Jurusan</label>
                <select id="inputJurusan" name="inputJurusan">
                  @foreach($jurusan as $datajurusan)
                  <option value="{{ $datajurusan -> nama }}">{{ $datajurusan -> nama }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Wali kelas</label></td>
        <td>
          <select id="inputWaliKelas" name="inputWaliKelas" class="span4">
            @foreach($guru as $dataguru)
            <option value="{{ $dataguru -> nama }}">{{ $dataguru -> nama }}</option>
            @endforeach
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