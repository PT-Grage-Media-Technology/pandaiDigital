<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Sertifikat Anda</title>
    <style>
        /* Root container for certificate */
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .certificate {
            width: 65rem;
            height: 35rem;
            background-color: #f46522;
            position: relative;
            color: #374151;
        }

        /* Outer border */
        .certificate::before,
        .certificate::after {
            content: "";
            position: absolute;
            border: 4px solid #fff;
        }

        .certificate::before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .certificate::after {
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
        }

        /* Inner white container */
        .inner-content {
            background-image: url('../public/assets/bg-sertifikat.png');
            background-size: cover;
            width: 60rem;
            height: 33rem;
            margin: 0 auto;
            position: relative;
            padding: 16px;
            border: 1px solid #d1d5db;
            background-color: rgba(255, 255, 255, 0.85);
        }


        .certificate-id {
            font-size: 12px;
            font-weight: bold;
            position: absolute;
            top: 6px;
            left: 10px;
        }

        .center-content {
            text-align: center;
            padding-top: 10px;
        }

        /* Logo and title */
        .logo {
            width: 75px;
            margin: 0 auto;
            display: block;
            margin-bottom: 5px;
        }

        .title {
            font-size: 20px;
            font-family: "Roboto Slab", serif;
            font-weight: bold;
            margin-top: 5px;
        }

        /* Recipient name */
        .recipient-name {
            font-size: 25px;
            font-style: italic;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .underline {
            width: 80%;
            height: 1px;
            background-color: #6b7280;
            margin: 0 auto;
            margin-top: 3px;
        }

        /* Course title */
        .course-title {
            font-size: 18px;
            font-family: "EB Garamond", serif;
            font-weight: bold;
            margin: 5px 0;
        }

        /* Signature section */
        #signature-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 40px;
        }

        .signature-box {
            position: relative;
        }

        /* Cap image with reduced opacity */
        .cap {
            width: 90px;
            opacity: 0.6;
            /* Adjust opacity */
            position: absolute;
            top: -20px;
            /* Adjust to overlap */
            left: -10px;
            /* Adjust to move closer to the CEO signature */
            z-index: 1;
        }

        /* CEO signature, placed above the cap image */
        .ceo-signature {
            position: relative;
            z-index: 2;
        }

        .signature-box img {
            width: 85px;
            height: 85px;
            object-fit: contain;
            margin-bottom: 5px;
            display: block;
        }

        .signature-line {
            width: 90px;
            height: 1px;
            background-color: #6b7280;
            margin: 4px;
        }

        .signature-name {
            font-size: 15px;
            font-weight: bold;
            font-family: "Montserrat", sans-serif;
        }

        .signature-title {
            font-size: 12px;
            color: #6b7280;
            font-weight: bolder;
        }

        .badge {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 85px;
            height: 84px;
            border: 3px solid #ff0000;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            background-color: transparent;
            position: relative;
            top: -40px;
            /* Geser badge ke atas */
        }

        .grade {
            font-family: cursive;
            font-size: 2.5rem;
            font-weight: 700;
            color: #ff0000;
            /* Warna teks */
            line-height: 1;
            /* Pastikan teks berada di tengah secara vertikal */
            margin-top: 20px;
        }

        .grade .plus {
            font-size: 1.5rem;
            vertical-align: super;
            font-weight: 400;
        }
    </style>
</head>

<body>

    @php

    $faviconPath = base_path('public/foto_identitas/' . $identitas->favicon);
    $capPath = base_path('public/cap/' . $identitas->cap);
    $ttdPath = base_path('public/foto_ttd/' . $identitas->ttd);
    $ttdTrainer = base_path('public/ttd_trainer/' . $ttd_trainer);

    $faviconBase64 = file_exists($faviconPath)
    ? 'data:image/png;base64,' . base64_encode(file_get_contents($faviconPath))
    : '';
    $capBase64 = file_exists($capPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($capPath)) : '';
    $ttdBase64 = file_exists($ttdPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($ttdPath)) : '';
    $ttdTrainerBase64 = file_exists($ttdTrainer)
    ? 'data:image/png;base64,' . base64_encode(file_get_contents($ttdTrainer))
    : '';
    @endphp


    <div class="certificate" style="margin-top: 3px">
        <!-- Inner Content -->
        <div class="inner-content">
            <!-- Certificate ID at top-left within inner-content -->
            <p class="certificate-id">Credential ID: #PD{{ $nomor }}</p>

            <div class="center-content">
                @if ($faviconBase64)
                <img src="{{ $faviconBase64 }}" alt="Logo Pandai Digital" class="logo"
                    style="width: 86px; height: auto;">
                @endif
                <h2 class="title">Sertifikat Pandai Digital</h2>
                <p class="sub-title">Dengan Bangga Diberikan Kepada:</p>
            </div>

            <!-- Recipient Name -->
            <div class="center-content" style="margin-top: 30px">
                <p class="recipient-name">{{ $nama_lengkap }}</p>
                <div class="underline"></div>
            </div>

            <!-- Course Title -->
            <div class="center-content" style="margin-top: 30px">
                <p class="sub-title">Telah Menyelesaikan:</p>
                <p class="course-title">{{ $judul_bootcamp }}</p>
                <div class="underline"></div>
            </div>


            <div class="center-content" style="margin-top: 50px">
                <table>
                    <tr>
                        <td>
                            <div class="signature-box" style="margin-left: 100px">
                                @if ($ttdTrainerBase64)
                                <img src="{{ $ttdTrainerBase64 }}" alt="Tanda Tangan" class="ttd">
                                @endif
                                <div class="signature-line"></div>
                                <p class="signature-name" style="text-align: center;">{{ $nama_trainer }}</p>
                                <p class="signature-title" style="text-align: center;">Pengajar</p>
                            </div>
                        </td>

                        <td>
                            <!--Grade disini-->
                            <div class="badge" style="margin-left: 145px">
                                <div class="grade">{{ $nilai }}</div>
                            </div>

                        </td>

                        <td>
                            <div class="signature-box ceo-signature" style="margin-left: 145px">
                                @if ($capBase64)
                                <img src="{{ $capBase64 }}" alt="Cap" class="cap">
                                @endif
                                @if ($ttdBase64)
                                <img src="{{ $ttdBase64 }}" alt="Tanda Tangan" class="ttd">
                                @endif
                                <div class="signature-line"></div>
                                <p class="signature-name">{{ $identitas->ceo }}</p>
                                <p class="signature-title">CEO Pandai Digital</p>
                            </div>
                        </td>

                    </tr>
                </table>
            </div>

        </div>
    </div>
</body>

</html>