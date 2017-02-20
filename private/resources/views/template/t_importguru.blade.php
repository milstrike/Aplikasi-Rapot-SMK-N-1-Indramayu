@section('modalcontent2')
<div id="importguru" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Import Data Guru</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="importcsvdataguru">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <span>Pilih file yang berisi data guru dan harus sesuai dengan <a href="{{{ asset('arch/contoh_import_guru.csv') }}}" ><u>Format.</u></a></span>
    <input type="file" name="importdataguru" id="importdataguru">
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-small" value="Import Data">
    </form>
  </div>
</div>
@endsection