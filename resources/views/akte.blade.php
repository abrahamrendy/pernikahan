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
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <img src="{{ URL::asset('css/gbi.png'); }}" width="25%">
                    <div class="float-end">No</div>
                </div>
                <div class="col-md-12 font-roboto-serif row">
                    <h1 class="font-bold">GEREJA BETHEL INDONESIA</h1>
                    <h6>Badan Hukum Gereja: SK Dirjen Bimas Kristen Protestan Departemen Agama R.I No. 41 Tahun 1972 dan SK Dirjen Bimas (Kristen) Protestan Departemen Agama R.I. No. 211 Tahun 1989 Tgl. 25 Nopember 1989</h6>
                    <div class="text-center">
                        <h4 class="font-semibold" style="text-decoration: underline; margin-bottom: 0px;">AKTA NIKAH</h4>
                        <h6 class="font-semibold">No. 3165/B/SP/X/21</h6>
                    </div>
                    <div class="text-center">
                        <div class="col-md-4 font-medium" style="border-top: 1px solid; border-bottom: 1px solid;">
                            <p class="font-size-small" style="margin: 10px 0px;">
                                "Demikianlah mereka bukan lagi dua melainkan satu, karena itu apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia"
                                <br>
                                (Matius 19:6)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container margin-top-1 line-height-2" style="text-align: left">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        PADA HARI {{$hari}} TANGGAL {{$tanggal}} DIHADAPAN SIDANG JEMAAT TUHAN TELAH {{$type}} PERNIKAHAN YANG KUDUS DARI
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class="text-center margin-vertical-1 font-bold">{{$nama_pria}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            dilahirkan di {{$tempat_lahir_pria}}
                        </div>
                        <div class="col-md-6">
                            tanggal {{$tanggal_lahir_pria}}
                        </div>
                        <div class="col-md-6">
                            anak laki-laki dari {{$nama_ayah_pria}}
                        </div>
                        <div class="col-md-6">
                            dan {{$nama_ibu_pria}}
                        </div>
                    </div>
                    <div class="text-center margin-top-1">dengan</div>
                </div>

                <div class="col-md-12">
                    <h4 class="text-center margin-vertical-1 font-bold">{{$nama_wanita}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            dilahirkan di {{$tempat_lahir_wanita}}
                        </div>
                        <div class="col-md-6">
                            tanggal {{$tanggal_lahir_wanita}}
                        </div>
                        <div class="col-md-6">
                            anak perempuan dari {{$nama_ayah_wanita}}
                        </div>
                        <div class="col-md-6">
                            dan {{$nama_ibu_wanita}}
                        </div>
                    </div>
                </div>

                <div class="col-md-12 margin-top-2">
                    <p>
                        Upacara Pernikahan yang kudus ini telah dilakukan dalam Nama TUHAN YESUS KRISTUS oleh: {{$nama_pendeta}}
                    </p>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align:right">
                    <img src="{{ URL::asset($pas_foto); }}" height="126">
                </div>
                <div class="col-md-6">
                    <span class="font-size-small">Bandung, {{$tanggal_pengesahan}}</span>
                    <br>
                    <span>GEREJA BETHEL INDONESIA</span>
                    <br>
                    <span class="font-size-xsmall">Jl. Aruna No.19-Bandung 40174</span>
                    <br><br><br><br>
                    <span class="font-medium" style="text-decoration: underline;">Pdt. DR. Ir. NIKO NJOTORAHARDJO</span>
                    <br>
                    <div class="font-size-small font-medium" style="letter-spacing: 2px; margin-top: 7px;">GEMBALA SIDANG</div>
                </div>
            </div>
        </div>
</body>

<style>
    /*@import url('https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@300;400;500;600;700&display=swap');*/

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
        background-image: url({{ URL::asset('css/frame.png'); }});
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
        margin-top: 1em !important;
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