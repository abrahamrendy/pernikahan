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
          <div class="modal-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                </div>
                <div class="form-group col-md-6">
                  <label for="notelp">No. Telp</label>
                  <input type="text" class="form-control" id="notelp" placeholder="No. Telp">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="tempatlahir">Tempat Lahir</label>
                  <input type="text" class="form-control" id="tempatlahir" placeholder="Tempat Lahir">
                </div>
                <div class="form-group col-md-4">
                  <label for="tanggallahir">Tanggal Lahir</label>
                  <input type="text" class="form-control singledatepicker" id="tanggallahir" placeholder="Tanggal Lahir">
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
                  <input type="file" class="form-control-file" id="ktp">
                </div>
                <div class="form-group col-md-4">
                  <label for="kartukeluarga">Kartu Keluarga</label>
                  <div><a href="#" id="kartukeluargalink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="kartukeluarga">
                </div>
                <div class="form-group col-md-4">
                  <label for="aktelahir">Akte Lahir</label>
                  <div><a href="#" id="aktelahirlink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="aktelahir">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="tempatberibadah">Tempat Beribadah</label>
                  <input type="text" class="form-control" id="tempatberibadah" placeholder="Tempat Beribadah">
                </div>
                <div class="form-group col-md-4">
                  <label for="tanggalberjemaat">Tanggal Berjemaat</label>
                  <input type="text" class="form-control singledatepicker" id="tanggalberjemaat" placeholder="Tanggal Berjemaat">
                </div>
                <div class="form-group col-md-4">
                  <label for="nokaj">No. KAJ</label>
                  <input type="text" class="form-control" id="nokaj" placeholder="No. KAJ">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="tanggalbaptis">Tanggal Baptis</label>
                  <input type="text" class="form-control singledatepicker" id="tanggalbaptis" placeholder="Tanggal Baptis">
                </div>
                <div class="form-group col-md-6">
                  <label for="gerejabaptis">Gereja Baptis</label>
                  <input type="text" class="form-control" id="gerejabaptis" placeholder="Gereja Baptis">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="suratbaptis">Surat Baptis</label>
                  <div><a href="#" id="suratbaptislink">Link</a></div>
                  <input type="file" class="form-control-file" id="suratbaptis">
                </div>
                <div class="form-group col-md-6">
                  <label for="suratgantinama">Surat Ganti Nama</label>
                  <div><a href="#" id="suratgantinamalink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="suratgantinama">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="kaj">KAJ</label>
                  <div><a href="#" id="kajlink">Link</a></div>
                  <input type="file" class="form-control-file" id="kaj">
                </div>
                <div class="form-group col-md-6">
                  <label for="kom100">KOM 100</label>
                  <div><a href="#" id="kom100link">Link</a></div>
                  <input type="file" class="form-control-file" id="kom100">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="namaayah">Nama Ayah</label>
                  <input type="text" class="form-control" id="namaayah" placeholder="Nama Ayah">
                </div>
                <div class="form-group col-md-6">
                  <label for="namaibu">Nama Ibu</label>
                  <input type="text" class="form-control" id="namaibu" placeholder="Nama Ibu">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="ktpayah">KTP Ayah</label>
                  <div><a href="#" id="ktpayahlink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="ktpayah">
                </div>
                <div class="form-group col-md-6">
                  <label for="ktpibu">KTP Ibu</label>
                  <div><a href="#" id="ktpibulink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="ktpibu">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="suratgantinamaayah">Surat Ganti Nama Ayah</label>
                  <div><a href="#" id="suratgantinamaayahlink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="suratgantinamaayah">
                </div>
                <div class="form-group col-md-6">
                  <label for="suratgantinamaibu">Surat Ganti Nama Ibu</label>
                  <div><a href="#" id="suratgantinamaibulink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="suratgantinamaibu">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="aktekematianayah">Akte Kematian Ayah</label>
                  <div><a href="#" id="aktekematianayahlink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="aktekematianayah">
                </div>
                <div class="form-group col-md-6">
                  <label for="aktekematianibu">Akte Kematian Ibu</label>
                  <div><a href="#" id="aktekematianibulink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="aktekematianibu">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="suratpersetujuanortu">Surat Persetujuan Orang Tua</label>
                  <div><a href="#" id="suratpersetujuanortulink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="suratpersetujuanortu">
                </div>
                <div class="form-group col-md-6">
                  <label for="suratketeranganbelumnikah">Surat Keterangan Belum Nikah</label>
                  <div><a href="#" id="suratketeranganbelumnikahlink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="suratketeranganbelumnikah">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
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
          <div class="modal-body">
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
                  <input type="text" class="form-control" id="edit_tempat" placeholder="Tempat">
                </div>
                <div class="form-group col-md-6">
                  <label for="edit_tanggal">Tanggal</label>
                  <input type="text" class="form-control datepicker" id="edit_tanggal" placeholder="Tanggal">
                </div>
                <div class="form-group col-md-12">
                  <label for="edit_pasfoto">Pas Foto</label>
                  <div><a href="#" id="edit_pasfotolink" target="_blank">Link</a></div>
                  <input type="file" class="form-control-file" id="edit_pasfoto">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
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
                                echo "<td>".$item->created_at."</td>";
                                if ($item->status == 0) {
                                    echo "<td><span class='badge badge-secondary'>Pending</span></td>";
                                    echo '<td>
                                            <button type="button" class="submit-btn btn btn-primary btn-sm btn-block" data-id ="'.$item->id.'">Submit</button>
                                            <button type="button" class="btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>';
                                } else if ($item->status == 1) {
                                    echo "<td><span class='badge badge-primary'>Submitted</span></td>";
                                    echo '<td>
                                            <button type="button" class="verify-btn btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>
                                            <button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                } else if ($item->status == 2) {
                                    echo "<td><span class='badge badge-success'>Verified</span></td>";
                                    echo '<td>
                                            <button type="button" class="decline-btn btn btn-danger btn-sm btn-block" data-id ="'.$item->id.'">Decline</button>';
                                } else {
                                    echo "<td><span class='badge badge-danger'>Declined</span></td>";
                                    echo '<td>
                                            <button type="button" class="submit-btn btn btn-primary btn-sm btn-block" data-id ="'.$item->id.'">Submit</button>
                                            <button type="button" class="verify-btn btn btn-success btn-sm btn-block" data-id ="'.$item->id.'">Verify</button>';
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
                            console.log(data);
                            $.each(data, function(index, item) {
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
                                $('#kartukeluargalink').attr("href", item.kk);
                                $('#aktelahirlink').attr("href", item.akte_lahir);
                                $('#suratbaptislink').attr("href", item.surat_baptis);
                                $('#suratgantinamalink').attr("href", item.surat_ganti_nama);
                                $('#suratgantinamaayahlink').attr("href", item.surat_ganti_nama_ayah);
                                $('#suratgantinamaibulink').attr("href", item.surat_ganti_nama_ibu);
                                $('#ktpayahlink').attr("href", item.ktp_ayah);
                                $('#ktpibulink').attr("href", item.ktp_ibu);
                                $('#aktekematianayahlink').attr("href", item.akte_kematian_ayah);
                                $('#aktekematianibulink').attr("href", item.akte_kematian_ibu);
                                $('#suratpersetujuanortulink').attr("href", item.surat_persetujuan_ortu);
                                $('#suratketeranganbelumnikahlink').attr("href", item.surat_keterangan_belum_nikah);
                                $('#kajlink').attr("href", item.kaj);
                                $('#kom100link').attr("href", item.kom_100);
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
                            console.log(data);
                            $.each(data, function(index, item) {
                                $('#edit_nama_pria').val(pria);
                                $('#edit_nama_wanita').val(wanita);
                                $('#edit_tempat').val(item.tempat);
                                var tempDate = moment(item.tanggal).toDate();
                                var date = moment(tempDate).format("DD-MM-YYYY HH:mm");
                                $('#edit_tanggal').val(date);
                                $('#edit_pasfotolink').attr("href", item.pas_foto);
                            });

                        },
                        error:function(xhr,status,error)
                        {
                            alert("Please try again later.");
                        }
                    });
            });

            $('#details-modal, #edit-modal').on('hidden.bs.modal', function () {
                $(this).find("input,textarea,select").val('').end();

            });


            $(document).on('click', '.submit-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/submit',
                        type:'POST',
                        dataType : "json",
                        data : {_token:"{{ csrf_token() }}",id:id},
                        success:function(data)
                        {
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