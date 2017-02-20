@section('modalcontent1')
<div id="tambahbidangstudi" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Bidang Studi</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="tambahdatabidangstudi">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table width="100%" border="0">
      <tr>
        <td style="vertical-align: text-middle;" width="30%"><label>Kode</label></td>
        <td width="70%"><input type="text" id="inputKode" placeholder="Kode Bidang Studi" name="inputKode" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Nama</label></td>
        <td><input type="text" id="inputNama" placeholder="Nama Bidang Studi" name="inputNama" class="span5"></td>
      </tr>
      <tr>
        <td style="vertical-align: text-top;"><label>Deskripsi</label></td>
        <td><textarea id="inputDeskripsi" placeholder="Deskripsi Bidang Studi" name="inputDeskripsi" class="span5"></textarea></td>
      </tr>
      <tr>
        <td style="vertical-align: text-middle;"><label>Guru Pengampu</label></td>
        <td>
          <select id="inputGuruPengampu" name="inputGuruPengampu" class="span4">
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