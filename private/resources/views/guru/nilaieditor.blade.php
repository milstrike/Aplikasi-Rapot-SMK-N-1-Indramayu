@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            <div class="row-fluid">
                <div class="span12">
                    <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 4000);
                    </script>
                    @if(Session::has('messageUpdate'))
                          <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('messageUpdate') }} </div>
                    @endif
                    <div class="paneleverything">
                        <strong>INFORMASI SISWA</strong>
                        <table border="0" width="100%">
                            @foreach($detailrapot as $detail)
                            <tr>
                                <td width="10%">Nama Siswa</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detail -> nama_siswa }}</td>
                            <tr>
                            <tr>
                                <td width="10%">NIS</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detail -> nis }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Kelas</td>
                                <td width="1%">:</td>
                                <td width="89%">{{ $detail -> kelas }}</td>
                            <tr>
                            <tr>
                                <td width="10%">Semester</td>
                                <td width="1%">:</td>
                                <td width="89%">1</td>
                            <tr>
                            @endforeach    
                        </table>
                    </div>

                    <?php $bidangstudi=""; $bidangstudilength=0; $statusbidangstudi=0; $nilai=""; $nilailength=0; $statusnilai=0; $keterangan=""; $keteranganlength=0; $statusketerangan=0; ?>
                                @if(!$detailrapot -> first() -> bidang_studi_1 == '')
                                        <?php $statusbidangstudi = 1;
                                              $bidangstudi = explode("|", $detailrapot->first()->bidang_studi_1);
                                              $bidangstudilength = count($bidangstudi); ?>
                                @else
                                        <?php $statusbidangstudi = 0; ?>
                                @endif

                                @if(!$detailrapot -> first() -> semester_1 == '0')
                                        <?php $statusnilai = 1;
                                              $nilai = explode("|", $detailrapot->first()->semester_1);
                                              $nilailength = count($nilai); ?>
                                @else
                                        <?php $statusnilai = 0; ?>
                                @endif

                                @if(!$detailrapot -> first() -> keterangan_1 == '0')
                                        <?php $statusketerangan = 1;
                                              $keterangan = explode("|", $detailrapot->first()->keterangan_1);
                                              $keteranganlength = count($keterangan); ?>
                                @else
                                        <?php $statusketerangan = 0; ?>
                                @endif
                    <div class="paneleverything" style="margin-top: 10px;">
                        <form method="POST" enctype="multipart/form-data" action="../../../setnilai1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="nis" value="{{ $detailrapot->first()->nis }}">
                        <input type="hidden" name="idrapot" value="{{ $detailrapot->first()->id_rapot }}">
                        <table class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">#</th>
                                    <th style="text-align: center;" width="75%">Bidang Studi</th>
                                    <th style="text-align: center;" width="10%">Nilai</th>
                                    <th style="text-align: center;" width="10%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($statusbidangstudi==1)
                                @for($i=0; $i<$bidangstudilength; $i++)
                                <tr>
                                    <td style="text-align:right;">{{ $i+1 }}</td>
                                    <td>{{ $bidangstudi[$i] }}</td>
                                    @if($statusnilai==1)
                                    <td style="text-align:center;"><input class="span8" style="text-align: right;" type="text" name="skor1[]" value="{{ $nilai[$i] }}"  required></td>
                                    @else
                                    <td style="text-align:center;"><input class="span8" style="text-align: right;" type="text" name="skor1[]" value='0'  required></td>
                                    @endif

                                    @if($statusketerangan==1)
                                    <td><textarea name="keterangan1[]" required>{{ $keterangan[$i] }}</textarea></td>
                                    @else
                                    <td><textarea name="keterangan1[]"  required></textarea></td>
                                    @endif
                                </tr>
                                @endfor
                                @else
                                <tr>
                                    <td colspan="3" style="text-align:center">Belum ada data bidang studi, hubungi administrator sekolah</td>
                                </tr>
                                @endif
                                <input type="submit" class="btn btn-primary btn-small pull-left" style="margin-bottom: 10px;" value="Simpan Nilai">
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection