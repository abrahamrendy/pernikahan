<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <!-- <link href="{{ URL::asset('css/bootstrap.min.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ URL::asset('css/akte.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ public_path('css/bootstrap.min.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ public_path('css/akte.css'); }} " rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="box">
		<div class="box-inner">
		    <div class="container">
		        <div class="row">
		                <div class="col-md-12">
		                    <img src="{{ URL::asset('css/gbi.png'); }}" width="30%">
		                    <!-- <div class="float-end">No</div> -->
		                </div>
		                <div class="col-md-12 font-roboto-serif row">
		                    <h1 class="font-bold">GEREJA BETHEL INDONESIA</h1>
		                </div>
		        </div>
		    </div>

	        <div class="container">
	            <div class="row">
	                <div class="col-md-12" style="text-align:center">
	                    <img src="{{ URL::asset($pas_foto); }}" height="126">
	                </div>
	            </div>
	        </div>

	        <div class="container margin-top-1 line-height-2" style="text-align: left">
	            <div class="row">
	                <div class="col-md-12">
	                	<h4 class="text-center margin-vertical-1 font-medium">NO.AKTA NIKAH: <b>{{$no_sertifikat}}/B/{{$status_pernikahan}}/{{$month}}/{{date("y", strtotime($tanggal))}}</b></h4>
	                    <h4 class="text-center margin-vertical-1 font-medium">NAMA MEMPELAI PRIA: <b>{{$nama_pria}}</b></h4>
	                    <h4 class="text-center margin-vertical-1 font-medium">NAMA MEMPELAI WANITA: <b>{{$nama_wanita}}</b></h4>
	                    <h4 class="text-center margin-vertical-1 font-medium">TANGGAL PENGESAHAN: <b>{{$tanggal}}</b></h4><br>
	                    <h4 class="text-center margin-vertical-1 font-bold">Adalah benar dan tercatat dalam database kami.</h4>
	                </div>
	            </div>
	        </div>
	    </div>
    </div>
</body>

<style>
    /*@import url('https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@300;400;500;600;700&display=swap');*/

    .box {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate3d(-50%, -50%, 0);
	  background-color: rgb(179 176 176 / 50%);
	  width: 100%;
	  max-width: 600px;
	  padding: 5px;
	  border: 2px solid #b78846;
	}
	.box:before, .box:after {
	  content: "•";
	  position: absolute;
	  width: 14px;
	  height: 14px;
	  font-size: 14px;
	  color: #b78846;
	  border: 2px solid #b78846;
	  line-height: 12px;
	  top: 5px;
	  text-align: center;
	}
	.box:before {
	  left: 5px;
	}
	.box:after {
	  right: 5px;
	}
	.box .box-inner {
	  position: relative;
	  border: 2px solid #b78846;
	  padding: 40px;
	}
	.box .box-inner:before, .box .box-inner:after {
	  content: "•";
	  position: absolute;
	  width: 14px;
	  height: 14px;
	  font-size: 14px;
	  color: #b78846;
	  border: 2px solid #b78846;
	  line-height: 12px;
	  bottom: -2px;
	  text-align: center;
	}
	.box .box-inner:before {
	  left: -2px;
	}
	.box .box-inner:after {
	  right: -2px;
	}

    .container {
        text-align: center;
        font-family: 'Roboto Serif', sans-serif;
    }

    /*.row {
        display: flex;
        flex-wrap: wrap;
    }*/

    .col-md-12 {
        flex: 0 0 auto;
        width: 100%;
    }

    .col-md-4 {
        flex: 0 0 auto;
        width: 50%;
        display: inline-block;
    }

    .col-md-6 {
        flex: 0 0 auto;
        width: 49%;
        display: inline-block;
    }

    .h1, h1 {
        font-size: 1.7rem;
    }

    .h6, h6 {
        font-size: 0.6rem;
    }

    .h4, h4 {
        font-size: 1rem;
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }

    .float-end {
        float: right;
    }



    body {
        text-align: center;
        font-family: 'Roboto Serif', sans-serif;
        /*width: 210mm;*/
        /*height: 297mm;*/
        font-size: 8pt;
        background-position: top;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        padding: 13%;
    }

    .font-roboto-serif {
        font-family: 'Roboto Serif', sans-serif !important;
    }

    .font-semibold, .font-bold {
        font-weight: 600 !important;
    }

    .font-medium {
        font-weight: 500 !important;
    }

    .font-size-small {
        font-size: 7pt;
    }

    .font-size-xsmall {
        font-size: 5pt;
    }

    .text-center {
        text-align: center !important;
    }

    .margin-top-3 {
        margin-top: 3em !important;
    }

    .margin-top-2 {
        margin-top: 2em !important;
    }

    .margin-top-1 {
        margin-top: 0.5em !important;
    }

    .margin-vertical-2 {
        margin-top: 1.5em !important;
        margin-bottom: 1.5em !important;
    }

    .margin-vertical-1 {
        margin-top: 0.7em !important;
        margin-bottom: 0.7em !important;
    }

    .line-height-2 {
        line-height: 2em;
    }
</style>
</html>