<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #ffa500;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .congratulations {
            font-size: 24px;
            color: #4F46E5;
            margin-bottom: 20px;
            text-align: center;
        }
        .content {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('assets/logo/logo.png') }}" alt="Pandai Digital Logo" class="logo">
    </div>

    <div class="congratulations">
        Selamat
    </div>

    <div class="content">
        <p>Kami dengan bangga mengumumkan bahwa Anda telah berhasil menyelesaikan bootcamp:</p>
        <h2 style="color: #4F46E5; text-align: center;">Y</h2>
        
        <p>Pencapaian Anda meliputi:</p>
        <ul>
            <li>Menyelesaikan seluruh materi pembelajaran</li>
            <li>Mengikuti seluruh sesi dengan tekun</li>
            <li>Menunjukkan dedikasi dalam proses pembelajaran</li>
        </ul>

        <p>Sertifikat kelulusan Anda telah kami lampirkan dalam email ini. Sertifikat ini merupakan bukti resmi bahwa Anda telah menguasai materi dalam bootcamp ini.</p>
    </div>

    <p>Langkah selanjutnya:</p>
    <ul>
        <li>Unduh dan simpan sertifikat Anda</li>
        <li>Bagikan pencapaian Anda di LinkedIn atau platform profesional lainnya</li>
        <li>Terapkan ilmu yang telah Anda dapatkan</li>
    </ul>

    <div class="footer">
        <p>Terima kasih telah belajar bersama kami!</p>
        <p>Salam hangat,<br>Tim Pandai Digital</p>
        <p style="font-size: 12px; margin-top: 20px;">
            Email ini dikirim secara otomatis, mohon tidak membalas email ini.
        </p>
    </div>
</body>
</html>