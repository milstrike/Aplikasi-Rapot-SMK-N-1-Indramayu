@section('modalcontent1')
<div id="tambahguru" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Data Guru</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdataguru">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="20%"><label>NIP</label></td>
        <td width="80%"><input type="text" id="inputNIP" placeholder="NIP" name="inputNIP" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><input type="text" id="inputNama" placeholder="Nama" name="inputNama" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Alamat</label></td>
        <td><textarea id="inputAlamat" placeholder="Alamat" name="inputAlamat" class="span5"></textarea></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>No.Telepon</label></td>
        <td><input type="text" id="inputTelepon" placeholder="No. Telepon" name="inputTelepon" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>E-mail</label></td>
        <td><input type="text" id="inputEmail" placeholder="Email" name="inputEmail" class="span5"></td>
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