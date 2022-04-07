@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
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
    </div>
@stop

@section('css')
    <link href="{{ URL::asset('css/admin_custom.css'); }} " rel="stylesheet">
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