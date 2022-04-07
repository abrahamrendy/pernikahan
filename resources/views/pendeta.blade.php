@extends('adminlte::page')

@section('title', 'Pendeta')

@section('plugins.Datatables', true)

@section('plugins.DatatablesPlugins', true)

@section('content_header')
    <h1>Pendeta</h1>
    <script type="text/javascript">
      var base_url = "{{ URL::to('/') }}";
    </script>
@stop

@section('content')
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
          <form action="{{route('submitEditPendeta')}}" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="edit_nama">Nama</label>
                    <input type="text" class="form-control" id="edit_nama" name="edit_nama">
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
                <table id="example1" class=" table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <?php if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {?>
                          <th>Action</th>
                        <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $ct = 1;
                        if (isset($data)) {
                            foreach ($data as $item) {
                                echo "<tr><td>".$ct."</td>";
                                echo "<td>".$item->nama_pendeta."</td>";
                                if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {
                                  echo '<td><button type="button" class="edit-btn btn btn-secondary btn-sm btn-block" data-toggle="modal" data-target="#edit-modal" data-id ="'.$item->id.'">Edit</button>
                                        </td>';
                                }
                                echo '</tr>';
                                $ct++;
                            }
                        }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <?php if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {?>
                          <th>Action</th>
                        <?php } ?>
                    </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="{{ URL::asset('css/admin_custom.css'); }} " rel="stylesheet">
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

            $(document).on('click', '.edit-btn', function(){
                var id = $(this).data('id');
                $.ajax({
                        url: base_url + '/get_pendeta/' + id,
                        type:'GET',
                        dataType : "json",
                        success:function(data)
                        {
                          console.log(data);
                            $.each(data, function(index, item) {
                              console.log(item.nama);
                                $('#edit_id').val(id);
                                $('#edit_nama').val(item.nama_pendeta);
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

            <?php
              if(Auth::user()->roles == 2) {
            ?>
                $('.non-cabang').addClass('hide');
            <?php
              }
            ?>
                
        });
    </script>
@stop