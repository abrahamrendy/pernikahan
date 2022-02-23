<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
    <!-- <link href="{{ URL::asset('css/bootstrap.min.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ URL::asset('css/akte.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ public_path('css/bootstrap.min.css'); }} " rel="stylesheet"> -->
    <!-- <link href="{{ public_path('css/akte.css'); }} " rel="stylesheet"> -->
</head>
<body>
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <img>IMAGE
                    <div class="float-end">No</div>
                </div>
                <div class="col-md-12 font-roboto-serif row">
                    <h1 class="font-bold">GEREJA BETHEL INDONESIA</h1>
                    <h6>Badan Hukum Gereja: SK Dirjen Bimas Kristen Protestan Departemen Agama R.I No. 41 Tahun 1972 dan SK Dirjen Bimas (Kristen) Protestan Departemen Agama R.I. No. 211 Tahun 1989 Tgl. 25 Nopember 1989</h6>
                    <div class="text-center">
                        <h4 class="font-semibold" style="text-decoration: underline; margin-bottom: 0px;">AKTA NIKAH</h4>
                        <h6 class="font-semibold">No. 3165/B/SP/X/21</h6>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="text-center">
                        <div class="col-md-4 font-medium" style="border-top: 1px solid; border-bottom: 1px solid;">
                            <p class="font-size-small" style="margin: 10px 0px;">
                                "Demikianlah mereka bukan lagi dua melainkan satu, karena itu apa yang telah dipersatukan Allah, tidak boleh diceraikan manusia"
                                <br>
                                (Matius 19:6)
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>

        <div class="container margin-top-3 line-height-2" style="text-align: left">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        PADA HARI .... TANGGAL .... DIHADAPAN SIDANG JEMAAT TUHAN TELAH .... PERNIKAHAN YANG KUDUS DARI
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class="text-center margin-vertical-2 font-bold">ASD ASD ASD</h4>
                    <div class="row">
                        <div class="col-md-6">
                            dilahirkan di ...
                        </div>
                        <div class="col-md-6">
                            tanggal ...
                        </div>
                        <div class="col-md-6">
                            anak laki-laki dari ...
                        </div>
                        <div class="col-md-6">
                            dan ...
                        </div>
                    </div>
                    <div class="text-center margin-top-2">dengan</div>
                </div>

                <div class="col-md-12">
                    <h4 class="text-center margin-vertical-2 font-bold">ASD ASD ASD</h4>
                    <div class="row">
                        <div class="col-md-6">
                            dilahirkan di ...
                        </div>
                        <div class="col-md-6">
                            tanggal ...
                        </div>
                        <div class="col-md-6">
                            anak perempuan dari ...
                        </div>
                        <div class="col-md-6">
                            dan ...
                        </div>
                    </div>
                </div>

                <div class="col-md-12 margin-top-2">
                    <p>
                        Upacara Pernikahan yang kudus ini telah dilakukan dalam Nama TUHAN YESUS KRISTUS oleh: ...
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    IMG
                </div>
                <div class="col-md-6">
                    <p>Bandung, ....</p>
                    <p>GEREJA BETHEL INDONESIA</p>
                    <p>Jl. Aruna No.19-Bandung 40174</p>
                    <p>Pdt. DR. Ir. NIKO NJOTORAHARDJO</p>
                    <p>GEMBALA SIDANG</p>
                </div>
            </div>
        </div>
</body>

<style>
    /*@import url('https://fonts.googleapis.com/css2?family=Roboto+Serif:wght@300;400;500;600;700&display=swap');*/

    @font-face {
        font-family: Roboto Serif;
        src: url({{ storage_path('fonts\RobotoSerif-Light.ttf') }}) format("truetype");
        font-weight: 300; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: Roboto Serif;
        src: url({{ storage_path('fonts\RobotoSerif-Regular.ttf') }}) format("truetype");
        font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: Roboto Serif;
        src: url({{ storage_path('fonts\RobotoSerif-Medium.ttf') }}) format("truetype");
        font-weight: 500; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
    }

    @font-face {
        font-family: Roboto Serif;
        src: url({{ storage_path('fonts\RobotoSerif-SemiBold.ttf') }}) format("truetype");
        font-weight: 600; // use the matching font-weight here ( 100, 200, 300, 400, etc).
        font-style: normal; // use the matching font-style here
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
        width: 33.33333333%;
        display: inline-block;
    }

    .col-md-6 {
        flex: 0 0 auto;
        width: 50%;
    }

    .h1, h1 {
        font-size: 2.5rem;
    }

    .h6, h6 {
        font-size: 1rem;
    }

    .h4, h4 {
        font-size: 1.5rem;
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }



    body {
        text-align: center;
        font-family: 'Roboto Serif', sans-serif;
        /*width: 210mm;*/
        /*height: 297mm;*/
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
        font-size: 9pt;
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

    .margin-vertical-2 {
        margin-top: 1.5em !important;
        margin-bottom: 1.5em !important;
    }

    .line-height-2 {
        line-height: 2em;
    }
</style>
</html>