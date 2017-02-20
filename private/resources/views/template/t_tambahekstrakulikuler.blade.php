@section('modalcontent1')
<div id="tambahekstrakulikuler" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Ekstrakulikuler</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdataekstrakulikuler">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Ekstrakulikuler" name="inputKode" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><input type="text" id="inputNama" placeholder="Nama Ekstrakulikuler" name="inputNama" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama Pembimbing</label></td>
        <td><input type="text" id="inputPembimbing" placeholder="Nama Pembimbing" name="inputPembimbing" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Waktu Pelaksanaan</label></td>
        <td><input type="text" id="inputWaktu" placeholder="Contoh: Jumat Sore Jam 15.00" name="inputWaktu" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Deskripsi</label></td>
        <td><textarea id="inputDeskripsi" placeholder="Deskripsi Ekstrakulikuler" name="inputDeskripsi" class="span5"></textarea></td>
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