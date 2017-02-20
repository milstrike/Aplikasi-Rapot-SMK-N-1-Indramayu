@section('modalcontent1')
<div id="tambahjurusan" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Jurusan</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdatajurusan">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode Jurusan</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Jurusan" name="inputKode" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama Jurusan</label></td>
        <td><input type="text" id="inputNama" placeholder="Nama Jurusan" name="inputNama" class="span5"></td>
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