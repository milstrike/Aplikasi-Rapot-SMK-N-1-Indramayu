@section('modalcontent2')
<div id="importsiswa" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Import Data Siswa</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="importcsvdatasiswa">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <span>Pilih file yang berisi data siswa dan harus sesuai dengan <a href="{{{ asset('arch/contoh_import_siswa.csv') }}}" ><u>Format.</u></a></span>
    <input type="file" name="importdatasiswa" id="importdatasiswa">
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-small" value="Import Data">
    </form>
  </div>
</div>
@endsection