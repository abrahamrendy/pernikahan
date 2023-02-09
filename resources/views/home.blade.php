@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Oswald:300,400,500,700");
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800");
        .gr-1 {
          background: linear-gradient(170deg, #01E4F8 0%, #1D3EDE 100%);
        }

        .gr-2 {
          background: linear-gradient(170deg, #B4EC51 0%, #429321 100%);
        }

        .gr-3 {
          background: linear-gradient(170deg, #C86DD7 0%, #3023AE 100%);
        }

        .gr-4 {
          background: linear-gradient(170deg, #ececec 0%, #212529 100%);
        }

        * {
          transition: 0.5s;
        }

        .h-100 {
          height: 100vh !important;
        }

        .align-middle {
          position: relative;
          top: 50%;
          transform: translateY(-50%);
        }

        .column {
          margin-top: 25px;
          padding-left: 3rem;
        }
        .column:hover {
          padding-left: 0;
        }
        .column:hover .card .txt {
          margin-left: 1rem;
        }
        .column:hover .card .txt h1, .column:hover .card .txt p {
          color: white;
          opacity: 1;
        }
        .column:hover a {
          color: white;
        }
        .column:hover a:after {
          width: 10%;
        }

        .card {
          min-height: 170px;
          margin: 0;
          padding: 1.7rem 1.2rem;
          border: none;
          border-radius: 0;
          color: black;
          letter-spacing: 0.05rem;
          font-family: "Oswald", sans-serif;
          box-shadow: 0 0 21px rgba(0, 0, 0, 0.27);
        }
        .card .txt {
          margin-left: -3rem;
          z-index: 1;
        }
        .card .txt h1 {
          font-size: 1.5rem;
          font-weight: 300;
          text-transform: uppercase;
        }
        .card .txt p {
          font-size: 1rem;
          text-transform: uppercase;
          letter-spacing: 0rem;
          margin-top: 10px;
          opacity: 0;
          color: white;
        }
        .card a {
          z-index: 3;
          font-size: 0.7rem;
          color: black;
          margin-left: 1rem;
          position: relative;
          bottom: -0.5rem;
          text-transform: uppercase;
        }
        .card a:after {
          content: "";
          display: inline-block;
          height: 0.5em;
          width: 0;
          margin-right: -100%;
          margin-left: 10px;
          border-top: 1px solid white;
          transition: 0.5s;
        }
        .card .ico-card {
          position: absolute;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          width: 100%;
          height: 100%;
          overflow: hidden;
        }
        .card i {
          position: relative;
          right: -50%;
          top: 60%;
          font-size: 12rem;
          line-height: 0;
          opacity: 0.2;
          color: white;
          z-index: 0;
        }
    </style>
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

        if ($user->roles == 2) {
            $cardcolor = "gr-1";
            $role = "cabang";
        } else if ($user->roles == 3) {
            $cardcolor = "gr-2";
            $role = "rayon";
        } else if ($user->roles == 5) {
            $cardcolor = "gr-3";
            $role = "otp(sicc)";
        } else {
            $role = $user->roles;
            $cardcolor = "gr-4";
        }
    ?>
    <div class="container">

        <div class="row">
            <div class="container" style="margin-bottom: 50px">
                <div class="row">
                    <div class="col-md-6 col-lg-4 column">
                        <div class="card {{$cardcolor}}">
                            <div class="txt">
                                <h1>WELCOME, </br>
                                {{$user->name}}</h1>
                                <p>ACCESS LEVEL: {{$role}} <br>
                                CABANG: {{$user->cabang}}</p>
                            </div>
                            <a href="#">more</a>
                            <div class="ico-card">
                                <i class="fa fa-rebel"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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