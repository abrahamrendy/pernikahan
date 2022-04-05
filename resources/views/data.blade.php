@extends('adminlte::page')

@section('title', $title)

@section('plugins.Datatables', true)

@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>{{ $title }}</h1>
    <script type="text/javascript">
      var base_url = "{{ URL::to('/') }}";
    </script>
@stop

@section('content')
    <!-- MODAL -->
    <div id = "details-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Details Calon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('submitEditDetails')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" id="details_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="alamat">Alamat</label>
                      <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="notelp">No. Telp</label>
                      <input type="text" class="form-control" id="notelp" placeholder="No. Telp" name="notelp">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="tempatlahir">Tempat Lahir</label>
                      <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir" name="tempatlahir">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tanggallahir">Tanggal Lahir</label>
                      <input type="text" class="form-control singledatepicker" id="tanggallahir" placeholder="Tanggal Lahir" name="tanggallahir">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="statusnikah">Status Nikah</label>
                      <input type="text" class="form-control" id="statusnikah" placeholder="Status Nikah">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="ktp">KTP</label>
                      <div><a href="#" id="ktplink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="ktp" name="ktp">
                      <br>
                      <textarea class="form-control" id="ktp_text" rows="2" name="ktp_text"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="kartukeluarga">Kartu Keluarga</label>
                      <div><a href="#" id="kartukeluargalink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="kartukeluarga" name="kartukeluarga">
                      <br>
                      <textarea class="form-control" id="kartukeluarga_text" rows="2" name="kartukeluarga_text"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="aktelahir">Akte Lahir</label>
                      <div><a href="#" id="aktelahirlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="aktelahir" name="aktelahir">
                      <br>
                      <textarea class="form-control" id="aktelahir_text" rows="2" name="aktelahir_text"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="tempatberibadah">Tempat Beribadah</label>
                      <input type="text" class="form-control" id="tempatberibadah" placeholder="Tempat Beribadah" name="tempatberibadah">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tanggalberjemaat">Tanggal Berjemaat</label>
                      <input type="text" class="form-control singledatepicker" id="tanggalberjemaat" placeholder="Tanggal Berjemaat" name="tanggalberjemaat">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="nokaj">No. KAJ</label>
                      <input type="text" class="form-control" id="nokaj" placeholder="No. KAJ" name="nokaj">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="tanggalbaptis">Tanggal Baptis</label>
                      <input type="text" class="form-control singledatepicker" id="tanggalbaptis" placeholder="Tanggal Baptis" name="tanggalbaptis">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="gerejabaptis">Gereja Baptis</label>
                      <input type="text" class="form-control" id="gerejabaptis" placeholder="Gereja Baptis" name="gerejabaptis">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="suratbaptis">Surat Baptis</label>
                      <div><a href="#" id="suratbaptislink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratbaptis" name="suratbaptis">
                      <br>
                      <textarea class="form-control" id="suratbaptis_text" rows="2" name="suratbaptis_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="suratgantinama">Surat Ganti Nama</label>
                      <div><a href="#" id="suratgantinamalink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratgantinama" name="suratgantinama">
                      <br>
                      <textarea class="form-control" id="suratgantinama_text" rows="2" name="suratgantinama_text"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="kaj">KAJ</label>
                      <div><a href="#" id="kajlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="kaj" name="kaj">
                      <br>
                      <textarea class="form-control" id="kaj_text" rows="2" name="kaj_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="kom100">KOM 100</label>
                      <div><a href="#" id="kom100link" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="kom100" name="kom100">
                      <br>
                      <textarea class="form-control" id="kom100_text" rows="2" name="kom100_text"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="namaayah">Nama Ayah</label>
                      <input type="text" class="form-control" id="namaayah" placeholder="Nama Ayah" name="namaayah">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="namaibu">Nama Ibu</label>
                      <input type="text" class="form-control" id="namaibu" placeholder="Nama Ibu" name="namaibu">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="ktpayah">KTP Ayah</label>
                      <div><a href="#" id="ktpayahlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="ktpayah" name="ktpayah">
                      <br>
                      <textarea class="form-control" id="ktpayah_text" rows="2" name="ktpayah_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="ktpibu">KTP Ibu</label>
                      <div><a href="#" id="ktpibulink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="ktpibu" name="ktpibu">
                      <br>
                      <textarea class="form-control" id="ktpibu_text" rows="2" name="ktpibu_text"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="suratgantinamaayah">Surat Ganti Nama Ayah</label>
                      <div><a href="#" id="suratgantinamaayahlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratgantinamaayah" name="suratgantinamaayah">
                      <br>
                      <textarea class="form-control" id="suratgantinamaayah_text" rows="2" name="suratgantinamaayah_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="suratgantinamaibu">Surat Ganti Nama Ibu</label>
                      <div><a href="#" id="suratgantinamaibulink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratgantinamaibu" name="suratgantinamaibu">
                      <br>
                      <textarea class="form-control" id="suratgantinamaibu_text" rows="2" name="suratgantinamaibu_text"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="aktekematianayah">Akte Kematian Ayah</label>
                      <div><a href="#" id="aktekematianayahlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="aktekematianayah" name="aktekematianayah">
                      <br>
                      <textarea class="form-control" id="aktekematianayah_text" rows="2" name="aktekematianayah_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="aktekematianibu">Akte Kematian Ibu</label>
                      <div><a href="#" id="aktekematianibulink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="aktekematianibu" name="aktekematianibu">
                      <br>
                      <textarea class="form-control" id="aktekematianibu_text" rows="2" name="aktekematianibu_text"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="suratpersetujuanortu">Surat Persetujuan Orang Tua</label>
                      <div><a href="#" id="suratpersetujuanortulink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratpersetujuanortu" name="suratpersetujuanortu">
                      <br>
                      <textarea class="form-control" id="suratpersetujuanortu_text" rows="2" name="suratpersetujuanortu_text"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="suratketeranganbelumnikah">Surat Keterangan Belum Nikah</label>
                      <div><a href="#" id="suratketeranganbelumnikahlink" target="_blank">Link</a></div>
                      <input type="file" class="form-control-file" id="suratketeranganbelumnikah" name="suratketeranganbelumnikah">
                      <br>
                      <textarea class="form-control" id="suratketeranganbelumnikah_text" rows="2" name="suratketeranganbelumnikah_text"></textarea>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- MODAL -->
    <div id = "edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="EditModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{route('submitEditPemberkatan')}}" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="edit_nama_pria">Calon Pria</label>
                    <input type="text" class="form-control" id="edit_nama_pria" disabled>
                </div>
                <div class="form-group">
                    <label for="edit_nama_wanita">Calon Wanita</label>
                    <input type="text" class="form-control" id="edit_nama_wanita" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="edit_tempat">Tempat</label>
                        <input type="text" class="form-control" id="edit_tempat" placeholder="Tempat" name="tempat">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="edit_tanggal">Tanggal</label>
                        <input type="text" class="form-control datepicker" id="edit_tanggal" placeholder="Tanggal" name="tanggal">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="edit_pasfoto">Pas Foto</label>
                        <div><a href="#" id="edit_pasfotolink" target="_blank">Link</a></div>
                        <input type="file" class="form-control-file" id="edit_pasfoto" name="pas_foto_file">
                        <br>
                        <textarea class="form-control" id="edit_pasfoto_textarea" rows="3" name="pas_foto_text"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="pendeta">Pendeta</label>
                        <select class="form-control" name="pendeta" id="pendeta">
                          <option disabled selected></option>
                          <?php
                            foreach ($pendeta as $item) {
                                echo "<option value=".$item->id.">".$item->nama_pendeta."</option>";
                            }
                          ?>
                        </select>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Calon Pria</th>
                        <th>Calon Wanita</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Pas Foto</th>
                        <th>Pendeta</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $ct = 1;
                        if (isset($data)) {
                            foreach ($data as $item) {
                                echo "<tr><td>".$ct."</td>";
                                echo "<td><a class = 'details-person details-pria' href = '#' data-id =".$item->mempelai_pria." data-toggle='modal' data-target='.bd-example-modal-lg'>".$item->nama_pria."</a></td>";
                                echo "<td><a href = '#' class = 'details-person details-wanita' data-id =".$item->mempelai_wanita." data-toggle='modal' data-target='.bd-example-modal-lg'>".$item->nama_wanita."</a></td>";
                                echo "<td>".date("D, d-m-Y, g:i A", strtotime($item->tanggal))."</td>";
                                echo "<td>".$item->tempat."</td>";
                                if (isset($item->pas_foto)) {
                                  echo "<td><a href=".$item->pas_foto." target=_blank>Link</a></td>";
                                } else {
                                  echo "<td></td>";
                                }
                                echo "<td>".$item->nama_pendeta."</td>";
                                echo "<td>".$item->created_at."</td>";
                                if ($item->status == 0) {
                                    // PENDING STATUS
                                    echo "<td><span class='badge badge-secondary'>Pending</span></td>";
                                    echo '<td>';
                                    if (Auth::user()->roles == 1 || Auth::user()->roles == 2) {
                                        echo '<button type="button" class="submit-btn btn btn-primary btn-sm btn-block" data-id ="'.$item->id.'">Submit</button>';
                                    } else if (Auth::user()->roles == 1) {
                                        echo '<button type="button" class="btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>';
                                    }
                                    
                                } else if ($item->status == 1) {
                                    // SUBMITTED STATUS
                                    echo "<td><span class='badge badge-primary'>Submitted</span></td>";
                                    echo '<td>';
                                    if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {
                                        echo '<button type="button" class="verify-btn btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>';
                                        echo '<button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                    } else if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {
                                        echo '<button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                    }
                                } else if ($item->status == 2) {
                                    // VERIFIED STATUS
                                    echo "<td><span class='badge badge-success'>Verified</span></td>";
                                    echo '<td>';
                                    if (Auth::user()->roles == 1 || Auth::user()->roles == 5) {
                                        echo '<button type="button" class="authorize-btn btn btn-warning btn-sm btn-block" data-id ="'.$item->id.'">Authorize</button>';
                                    } else if (Auth::user()->roles == 1) {
                                        echo '<button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                    }
                                } else if ($item->status == 3) {
                                    // AUTHORIZED STATUS
                                    echo "<td><span class='badge badge-warning'>Authorized</span></td>";
                                    echo '<td>';
                                    if (Auth::user()->roles == 1 || Auth::user()->roles == 3 || Auth::user()->roles == 5) {
                                        echo '<button type="button" class="certificate-btn btn btn-warning btn-sm btn-block" data-id ="'.$item->id.'"><a href="'.route('certificate',$item->id).'">Certificate</a></button>';
                                        echo '<button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                    } else if (Auth::user()->roles == 1 || Auth::user()->roles == 5) {
                                        echo '<button type="button" class="certificate-btn btn btn-warning btn-sm btn-block" data-id ="'.$item->id.'"><a href="'.route('certificate',$item->id).'">Certificate</a></button>';
                                    }
                                } else {
                                    // DECLINED STATUS
                                    echo "<td><span class='badge badge-danger'>Declined</span></td>";
                                    echo '<td>';
                                    if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {
                                        echo '<button type="button" class="verify-btn btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>';
                                    }
                                }
                                echo '<button type="button" class="edit-btn btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#edit-modal" data-id ="'.$item->id.'">Edit</button>
                                        </td>';
                                $ct++;
                            }
                        }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Calon Pria</th>
                        <th>Calon Wanita</th>
                        <th>Tanggal</th>
                        <th>Tempat</th>
                        <th>Pas Foto</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });

        $( ".datepicker" ).daterangepicker({
          singleDatePicker: true,
          timePicker: true,
          timePicker24Hour: true,
          showDropdowns: true,
          drops: "auto",
          locale: {
            format: 'DD-MM-YYYY HH:mm'
          }
        });

        $( ".singledatepicker" ).daterangepicker({
          autoApply: true,
          singleDatePicker: true,
          showDropdowns: true,
          drops: "auto",
          locale: {
            format: 'DD-MM-YYYY'
          }
        });

        $(document).ready(function(){
            $(document).on('click', '.details-person', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/get_mempelai/' + id,
                        type:'GET',
                        dataType : "json",
                        success:function(data)
                        {
                            $.each(data, function(index, item) {
                                $('#details_id').val(id);
                                $('#nama').val(item.nama);
                                $('#alamat').val(item.alamat);
                                $('#notelp').val(item.no_telp);
                                $('#tempatlahir').val(item.tempat_lahir);
                                var tempDate = moment(item.tanggal_lahir).toDate();
                                var date = moment(tempDate).format("DD-MM-YYYY");
                                $('#tanggallahir').val(date);
                                $('#tempatberibadah').val(item.tempat_ibadah);
                                
                                if(item.tanggal_baptis != "1970-01-01") {
                                  tempDate = moment(item.tanggal_baptis).toDate();
                                  date = moment(tempDate).format("DD-MM-YYYY");
                                } else {
                                  date = "";
                                }
                                $('#tanggalbaptis').val(date);

                                $('#nokaj').val(item.no_kaj);

                                $('#gerejabaptis').val(item.gereja_baptis);

                                if(item.tanggal_berjemaat != "1970-01-01") {
                                  tempDate = moment(item.tanggal_berjemaat).toDate();
                                  date = moment(tempDate).format("DD-MM-YYYY");
                                } else {
                                  date = "";
                                }
                                $('#tanggalberjemaat').val(date);
                                
                                $('#namaayah').val(item.nama_ayah);
                                $('#namaibu').val(item.nama_ibu);
                                $('#ktplink').attr("href", item.ktp);
                                $('#ktp_text').val(item.ktp);
                                $('#kartukeluargalink').attr("href", item.kk);
                                $('#kartukeluarga_text').val(item.kk);
                                $('#aktelahirlink').attr("href", item.akte_lahir);
                                $('#aktelahir_text').val(item.akte_lahir);
                                $('#suratbaptislink').attr("href", item.surat_baptis);
                                $('#suratbaptis_text').val(item.surat_baptis);
                                $('#suratgantinamalink').attr("href", item.surat_ganti_nama);
                                $('#suratgantinama_text').val(item.surat_ganti_nama);
                                $('#suratgantinamaayahlink').attr("href", item.surat_ganti_nama_ayah);
                                $('#suratgantinamayah_text').val(item.surat_ganti_nama_ayah);
                                $('#suratgantinamaibulink').attr("href", item.surat_ganti_nama_ibu);
                                $('#suratgantinamaibu_text').val(item.surat_ganti_nama_ibu);
                                $('#ktpayahlink').attr("href", item.ktp_ayah);
                                $('#ktpayah_text').val(item.ktp_ayah);
                                $('#ktpibulink').attr("href", item.ktp_ibu);
                                $('#ktpibu_text').val(item.ktp_ibu);
                                $('#aktekematianayahlink').attr("href", item.akte_kematian_ayah);
                                $('#aktekematianayah_text').val(item.akte_kematian_ayah);
                                $('#aktekematianibulink').attr("href", item.akte_kematian_ibu);
                                $('#aktekematianibu_text').val(item.akte_kematian_ibu);
                                $('#suratpersetujuanortulink').attr("href", item.surat_persetujuan_ortu);
                                $('#suratpersetujuanortu_text').val(item.surat_persetujuan_ortu);
                                $('#suratketeranganbelumnikahlink').attr("href", item.surat_keterangan_belum_nikah);
                                $('#suratketeranganbelumnikah_text').val(item.surat_keterangan_belum_nikah);
                                $('#kajlink').attr("href", item.kaj);
                                $('#kaj_text').val(item.kaj);
                                $('#kom100link').attr("href", item.kom_100);
                                $('#kom100_text').val(item.kom_100);
                            });

                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            $(document).on('click', '.edit-btn', function(){
                var id = $(this).data('id');
                var pria = $(this).parent().parent().find('.details-pria').text();
                var wanita = $(this).parent().parent().find('.details-wanita').text();
                $.ajax({
                        url: base_url + '/get_pemberkatan/' + id,
                        type:'GET',
                        dataType : "json",
                        success:function(data)
                        {
                            $.each(data, function(index, item) {
                                $('#edit_id').val(id);
                                $('#edit_nama_pria').val(pria);
                                $('#edit_nama_wanita').val(wanita);
                                $('#edit_tempat').val(item.tempat);
                                var tempDate = moment(item.tanggal).toDate();
                                var date = moment(tempDate).format("DD-MM-YYYY HH:mm");
                                $('#edit_tanggal').val(date);
                                $('#edit_pasfotolink').attr("href", item.pas_foto);
                                $('#edit_pasfoto_textarea').val(item.pas_foto);

                                $('#pendeta').val(item.pendeta_id);
                            });

                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            // $('#details-modal, #edit-modal').on('hidden.bs.modal', function () {
            //     $(this).find("input,textarea,select").val('').end();

            // });


            $(document).on('click', '.submit-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/submit',
                        type:'POST',
                        dataType : "json",
                        data : {_token:"{{ csrf_token() }}",id:id},
                        success:function(data)
                        {
                            alert('Your data has been submitted!');
                            location.reload();
                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            $(document).on('click', '.verify-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/verify',
                        type:'POST',
                        dataType : "json",
                        data : {_token:"{{ csrf_token() }}",id:id},
                        success:function(data)
                        {
                            alert('Your data has been verified!');
                            location.reload();
                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            $(document).on('click', '.decline-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/decline',
                        type:'POST',
                        dataType : "json",
                        data : {_token:"{{ csrf_token() }}",id:id},
                        success:function(data)
                        {
                            alert('Your data has been declined!');
                            location.reload();
                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            $(document).on('click', '.authorize-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/authorize',
                        type:'POST',
                        dataType : "json",
                        data : {_token:"{{ csrf_token() }}",id:id},
                        success:function(data)
                        {
                            alert('Your data has been authorized!');
                            location.reload();
                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });
                
        });
    </script>
@stop