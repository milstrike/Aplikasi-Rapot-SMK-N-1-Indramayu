@extends('template/t_index')        
@section('content')
<div class="container-fluid" style="margin-top: 80px;">
            @if($datarapot->count() > 0)
                <div class="row-fluid">
                <?php $bidangstudi=""; $bidangstudilength=0; $statusbidangstudi=0; $nilai=""; $nilailength=0; $statusnilai=0; $keterangan=""; $keteranganlength=0; $statusketerangan=0; $bidangstudi2=""; $bidangstudilength2=0; $statusbidangstudi2=0; $nilai2=""; $nilailength2=0; $statusnilai2=0; $keterangan2=""; $keteranganlength2=0; $statusketerangan2=0; ?>
                                <!-- GET RAPOT 1-->
                                @if(!$datarapot -> first() -> bidang_studi_1 == '')
                                        <?php $statusbidangstudi = 1;
                                              $bidangstudi = explode("|", $datarapot->first()->bidang_studi_1);
                                              $bidangstudilength = count($bidangstudi); ?>
                                @else
                                        <?php $statusbidangstudi = 0; ?>
                                @endif

                                @if(!$datarapot -> first() -> semester_1 == '0')
                                        <?php $statusnilai = 1;
                                              $nilai = explode("|", $datarapot->first()->semester_1);
                                              $nilailength = count($nilai); ?>
                                @else
                                        <?php $statusnilai = 0; ?>
                                @endif

                                @if(!$datarapot -> first() -> keterangan_1 == '0')
                                        <?php $statusketerangan = 1;
                                              $keterangan = explode("|", $datarapot->first()->keterangan_1);
                                              $keteranganlength = count($keterangan); ?>
                                @else
                                        <?php $statusketerangan = 0; ?>
                                @endif

                                <!-- GET RAPOT 2-->
                                @if(!$datarapot -> first() -> semester_2 == '0')
                                        <?php $statusnilai2 = 1;
                                              $nilai2 = explode("|", $datarapot->first()->semester_2);
                                              $nilailength2 = count($nilai2); ?>
                                @else
                                        <?php $statusnilai2 = 0; ?>
                                @endif

                                @if(!$datarapot -> first() -> keterangan_2 == '0')
                                        <?php $statusketerangan2 = 1;
                                              $keterangan2 = explode("|", $datarapot->first()->keterangan_2);
                                              $keteranganlength2 = count($keterangan2); ?>
                                @else
                                        <?php $statusketerangan2 = 0; ?>
                                @endif
                <div class="span12">
                    <div class="paneleverything">
                        <div>
                            @if($datanilai->count()>0)
                                <h3>Nilai Tahun Ajaran: {{ $datanilai -> first() -> tahun_ajaran}}</h3>
                                <table class="table table-hover table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align:center; vertical-align: middle; margin:0; padding:0;" rowspan="2"><small>#</small></th>
                                        <th style="text-align:center; vertical-align: middle; margin:0; padding:0;" rowspan="2"><small>Bidang Studi</small></th>
                                        <th style="text-align:center; margin:0; padding:0;" colspan="2"><small>Semester 1</small></th>
                                        <th style="text-align:center; margin:0; padding:0;" colspan="2"><small>Semester 2</small></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; margin:0; padding:0;"><small>Nilai</small></th>
                                        <th style="text-align: center; margin:0; padding:0;"><small>Keterangan</small></th>
                                        <th style="text-align: center; margin:0; padding:0;"><small>Nilai</small></th>
                                        <th style="text-align: center; margin:0; padding:0;"><small>Keterangan</small></th> 
                                    </tr>
                                </thead> 
                                <tbody>
                                    @if($statusbidangstudi==1)
                                @for($i=0; $i<$bidangstudilength; $i++)
                                <tr>
                                    <td style="text-align:right;">{{ $i+1 }}</td>
                                    <td>{{ $bidangstudi[$i] }}</td>
                                    @if($statusnilai==1)
                                        <td style="text-align:center;">{{ $nilai[$i] }}</td>
                                    @else
                                        <td style="text-align:center;">0</td>
                                    @endif
                                    @if($statusketerangan==1)
                                    <td>{{ $keterangan[$i] }}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    @if($statusnilai2==1)
                                        <td style="text-align:center;">{{ $nilai2[$i] }}</td>
                                    @else
                                        <td style="text-align:center;">0</td>
                                    @endif
                                    @if($statusketerangan2==1)
                                    <td>{{ $keterangan2[$i] }}</td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                @endfor
                                @else
                                <tr>
                                    <td colspan="6" style="text-align:center"><small>Tidak ada data tersimpan</small></td>
                                </tr>
                                @endif
                                    <tr>
                                    </tr>
                                </tbody>                               
                            </table>
                            @else
                                <h3>Tidak ada data rapot untuk tahun ajaran ini</h3>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="row-fluid">
                    <h3>Tidak ada data rapot untuk tahun ajaran ini</h3>
                </div>
            @endif

</div>
@endsection