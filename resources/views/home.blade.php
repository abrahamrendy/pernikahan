@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <?php
        foreach ($data as $key => $value) {
            if ($value->status == 0) {
                $pending = $value->ct;
            } else if ($value->status == 1) {
                $submitted = $value->ct;
            } else if ($value->status == 2) {
                $verified = $value->ct;
            } else if ($value->status == 3) {
                $authorized = $value->ct;
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                <div class="inner">
                <h3><?php echo (isset($pending)) ? $pending : 0; ?></h3>
                <p>Pending</p>
                </div>
                <div class="icon">
                    <i><ion-icon name="person-add"></ion-icon></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary">
                <div class="inner">
                <h3><?php echo (isset($submitted)) ? $submitted : 0; ?></h3>
                <p>Submitted</p>
                </div>
                <div class="icon">
                    <i><ion-icon name="checkmark-circle"></ion-icon></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                <h3><?php echo (isset($verified)) ? $verified : 0; ?></h3>
                <p>Verified</p>
                </div>
                <div class="icon">
                    <i><ion-icon name="checkmark-done-circle"></ion-icon></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                <div class="inner">
                <h3><?php echo (isset($authorized)) ? $authorized : 0; ?></h3>
                <p>Authorized</p>
                </div>
                <div class="icon">
                    <i><ion-icon name="shield-checkmark"></ion-icon></i>

                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
        </div>
        <?php
            if (Auth::user()->roles == 1 || Auth::user()->roles == 2 || Auth::user()->roles == 3) {
        ?>
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" />
                <button class="btn btn-primary">Import File</button>
            </form>
        <?php } ?>

    </div>

@stop

@section('css')
    <link href="{{ URL::asset('css/admin_custom.css'); }} " rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <style>
        .bg-warning, .bg-warning>a {
            color: #ffffff !important;
        }
    </style>
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script>
        $(document).ready(function(){
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