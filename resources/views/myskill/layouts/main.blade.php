<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Pandai Digital adalah platform pembelajaran online yang menyediakan akses ke berbagai materi untuk pengembangan keterampilan profesional.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ 'https://grageacademy.online/foto_identitas/' . $identitas->favicon }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <title>Pandai Digital || {{ ucfirst(Route::currentRouteName()) }}</title>

    <link rel="stylesheet"
        href="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/css/app.css">


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" as="style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

</head>

<body class="">
    @include('./myskill/partials.navbar')

    <div class="container" id="container">
        @yield('container')
    </div>
    <div id="autoPopup" class="fixed bottom-0 left-0 mb-8 ml-4 hidden z-50 max-sm:z-100">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden w-96 h-24 max-sm:w-80 ">
            <div class="px-4 max-sm:px-2 py-2 flex flex-row items-center justify-between" id="popupContent">
                <!-- Konten pesan pop-up akan dimasukkan secara dinamis oleh JavaScript -->
                <p class="text-base text-gray-800 mt-4 font-semibold">
                    <!-- Pesan akan dimasukkan secara dinamis oleh JavaScript -->
                </p>
            </div>
        </div>
    </div>
    <!-- JavaScript untuk Pop-up Otomatis -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil data pesan dari Laravel dengan Blade (dalam format JSON)
            let popups = @json($popups);

            let popupInterval = 90000; // 1.30 menit
            let lastPopupTimeKey = 'lastPopupTime'; // Key untuk menyimpan waktu terakhir pop-up muncul

            function showPopup() {
                if (popups.length === 0) {
                    console.log('Tidak ada pesan pop-up yang tersedia.');
                    return;
                }

                // Pilih pesan acak dari data popups
                let randomPopup = popups[Math.floor(Math.random() * popups.length)];

                // Masukkan konten dinamis ke dalam pop-up
                document.getElementById('popupContent').innerHTML = `
                   <div class="flex items-start justify-between p-2 bg-white rounded-lg">
                            <img src="{{ asset('foto_trainer/') }}/${randomPopup.trainer.foto}" alt="Trainer Image" class="w-10 h-10 mr-4 mt-2 rounded-lg">
                            <div>
                                <strong class="text-lg max-sm:text-sm text-gray-800 font-semibold">
                                    ${randomPopup.trainer.nama_trainer}
                                </strong>
                                <p class="text-sm max-sm:text-xs text-gray-800 font-normal">
                                    ${randomPopup.pesan}
                                </p>
                            </div>
                    </div>
                `;

                // Tampilkan pop-up dengan efek slide-in dari kiri
                let popupElement = document.getElementById('autoPopup');
                popupElement.classList.remove('hidden');
                popupElement.style.opacity = 0;
                popupElement.style.transform = 'translateX(-100%)';
                setTimeout(() => {
                    popupElement.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    popupElement.style.opacity = 1;
                    popupElement.style.transform = 'translateX(0)';
                }, 10);

                // Sembunyikan pop-up setelah 5 detik
                setTimeout(() => {
                    popupElement.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    popupElement.style.opacity = 0;
                    popupElement.style.transform = 'translateX(-100%)';
                    setTimeout(() => {
                        popupElement.classList.add('hidden');
                    }, 500);
                }, 5000);

                // Simpan waktu pop-up terakhir kali muncul ke localStorage
                localStorage.setItem(lastPopupTimeKey, Date.now().toString());
            }

            function closePopup() {
                // Sembunyikan pop-up dengan efek slide-out ke kiri
                let popupElement = document.getElementById('autoPopup');
                popupElement.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                popupElement.style.opacity = 0;
                popupElement.style.transform = 'translateX(-100%)';
                setTimeout(() => {
                    popupElement.classList.add('hidden');
                }, 500);
            }

            // Cek waktu terakhir kali pop-up muncul
            let lastPopupTime = localStorage.getItem(lastPopupTimeKey);
            let currentTime = Date.now();

            // Jika belum ada data waktu terakhir atau sudah lebih dari 2.30 menit, tampilkan pop-up
            if (!lastPopupTime || currentTime - lastPopupTime >= popupInterval) {
                showPopup();
            } else {
                // Hitung sisa waktu sebelum menampilkan pop-up berikutnya
                let remainingTime = popupInterval - (currentTime - lastPopupTime);
                setTimeout(showPopup, remainingTime);
            }

            // Tampilkan pop-up secara berkala sesuai interval
            setInterval(showPopup, popupInterval);

            // Event listener untuk menutup pop-up
            document.getElementById('closePopup').addEventListener('click', closePopup);
        });
    </script>



    @include('./myskill/partials.footer')

    <!-- wa button -->
    <a target="_blank"
        href="https://wa.me/6285224216499?text=Saya%20tertarik%20untuk%20berlangganan%20bimbel%20online%20PandaiDigital.%20Mohon%20informasi%20lebih%20lanjut%20mengenai%20paket%20langganan%2C%20harga%2C%20dan%20fitur%20yang%20tersedia.%20Terima%20kasih.">
        <button
            class="fixed md:mb-10 max-sm:mb-10 end-4 max-sm:end-4 justify-center bottom-8  bg-orange-500 text-white p-3 rounded-full shadow-lg">
            <i class="fab fa-whatsapp " style="font-size: 20px; padding: 4px; margin-left: 4px;"></i>
            <span class="max-sm:hidden">Whatsapp</span>
        </button>
    </a>


    <script src="https://rawcdn.githack.com/ArvinoDel/myskillokodinas/733dfee1387648dbfc9b598c1c21f8bc217ecb12/public/assets/js/sweetalert2.js"
        defer></script>

    <script src="   https://rawcdn.githack.com/ArvinoDel/myskillokodinas/733dfee1387648dbfc9b598c1c21f8bc217ecb12/public/assets/js/jquery.min.js"
        defer></script>


    <script src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/app.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/navbar.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/e-learning.js"
        defer></script>
    <script
        src="https://rawcdn.githack.com/ArvinoDel/MySkill/db1485d305b176ef2fc16baac98bcef23eb790fd/resources/js/buttons.js"
        defer></script>

    <script>
        document.addEventListener('touchstart', handler, {
            passive: true
        });
        document.addEventListener('wheel', handler, {
            passive: true
        });

        document.addEventListener("DOMContentLoaded", function() {
            const images = document.querySelectorAll('img');
            images.forEach(img => {
                // Jika gambar adalah gambar LCP, jangan gunakan lazy loading
                if (img.src.includes('testimoni.png')) {
                    img.removeAttribute('loading');
                } else {
                    img.setAttribute('loading', 'lazy');
                }
            });
        });
    </script>

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('
            error ') }}',
            timer: 3000,
        });
    </script>
    @endif

</body>

</html>