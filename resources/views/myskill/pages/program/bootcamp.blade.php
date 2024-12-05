@extends('./myskill/layouts.main')
@section('container')
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <section class="bootcamp-program w-screen">
        <div class="bootcamp w-screen">
            <section
                class="w-full h-auto bg-gradient-to-b from-orange-400 to-red-400 text-white lg:flex max-sm:text-black max-sm:bg-white">
                <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                    class="lg:w-96 lg:h-64 lg:ml-16 py-2 max-sm:h-48 max-sm:mx-auto max-sm:my-4m md:mx-auto md:block md:w-96">
                <div class="lg:ml-4 max-sm:text-black max-sm:w-full max-sm:text-center max-sm:mx-auto max-sm:py-4">
                    <p class="text-4xl font-bold w-4/5 max-sm:text-xl max-sm:mx-auto text-white md:ml-6">
                        Bootcamp yang Memberi Hasil. Fokus Praktik & Portfolio.</p>
                    <br>
                    <p class="w-8/12 max-sm:w-full max-sm:text-sm max-sm:mx-auto text-white md:ml-6">Full Online dan Dipandu
                        oleh Praktisi Senior. Praktikal, lebih dari sekadar Webinar. Fokus Bantu Kembangkan Skill dan
                        Portfolio Ribuan Alumni.</p>
                    <br>
                    <a href="#bootcamp" type="button"
                        class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 max-sm:bg-yellow-500 max-sm:text-white max-sm:px-3 max-sm:py-1.5 max-sm:w-4/5 max-sm:mx-auto md:ml-6">Lihat
                        Program Pilihan</a>
                    <div class="flex items-center mt-2 sm:mt-4 max-sm:flex-col max-sm:items-center">
                        <div class="flex space-x-0 max-sm:justify-center md:ml-6">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="rounded-full h-8 w-14 md:mb-4">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="rounded-full h-8 w-14 md:mb-4">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="rounded-full h-8 w-14 md:mb-4">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="rounded-full h-8 w-14 md:mb-4">
                            <img src="{{ asset('./assets/bootcamp/hero-header.png') }}"
                                class="rounded-full h-8 w-14 md:mb-4">
                        </div>
                        <p
                            class="lg:ml-4 md:mb-4 lg:text-white text-md font-semibold max-sm:text-white max-sm:ml-0 max-sm:text-sm max-sm:mt-2 md:text-white md:ml-1">
                            > 10.000 Orang Telah Lulus</p>
                    </div>
                </div>
            </section>
        </div>


        <!-- Horizontal Scrollable Section -->

        <p class="mt-4 font-bold text-2xl flex justify-center text-center px-8 md:px-14">Testimoni Alumni Bootcamp Pandai Digital</p>
        <section class="mt-8 whitespace-nowrap px-2 md:px-2 py-4 mb-12 ">
            <div class="flex overflow-x-auto space-x-4 md:mx-5 mx-0 px-1 pb-4 no-scrollbar">
                @foreach ($testimonis as $testimoni)
                    <div
                        class="bg-white p-4 rounded-2xl shadow-md max-w-[220px] sm:max-w-[180px] md:max-w-[200px] flex-shrink-0">
                        <div class="flex items-center justify-center mb-4">
                            <img class="rounded-lg w-full max-h-[220px] object-cover"
                                src="{{ asset('foto_testimoni/' . $testimoni->gambar) }}" alt="Testimoni Image" />
                        </div>
                        <a href="{{ $testimoni->link }}">
                            <button class="w-full bg-purple-600 text-white py-2 rounded-md font-semibold">Baca
                                Cerita</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- search bar -->
        <div class="relative w-11/12 mx-auto mb-6" id="bootcamp">
            <input type="text" class="w-full p-2 pl-10 border border-gray-300 rounded"
                placeholder="Apa yang ingin kamu pelajari ?" id="searchInput">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fas fa-search text-gray-500"></i>
            </span>
        </div>
        <!-- end search bar -->

        <script>
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const bootcampCards = document.querySelectorAll('.grid > a');
                let hasResults = false;

                bootcampCards.forEach(card => {
                    const title = card.querySelector('p').textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        card.style.display = '';
                        hasResults = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Menampilkan pesan jika tidak ada hasil
                const noResultsMessage = document.getElementById('noResultsMessage');
                if (!hasResults && searchTerm) {
                    noResultsMessage.style.display = 'block';
                } else {
                    noResultsMessage.style.display = 'none';
                }
            });
        </script>

        <p id="noResultsMessage" class="text-center text-red-500 mt-4" style="display: none;">
            Bootcamp yang anda cari tidak tersedia.
        </p>

        <!-- start grid -->
        <div
            class="grid grid-cols-2 max-sm:p-2 max-sm:m-2 max-sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 lg:gap-6 lg:px-14 md:gap-8 md:px-14 max-sm:mt-2">
            <!-- grid card here -->

            <!-- garis batas -->
            @foreach ($bootcamps as $bootcamp)
                <a href="/bootcamp/digital-marketing/{{ $bootcamp->id_bootcamp }}">
                    <div
                        class="bg-white mt-2 mb-2 border rounded-lg shadow-md max-sm:p-2 max-sm:mr-2 max-sm:flex max-sm:flex-col max-sm:items-center max-sm:justify-start mx-auto">
                        <img src="{{ asset('./thumbnail_bootcamp/' . $bootcamp->thumbnail) }}"
                            class="lg:h-72 lg:w-72 md:h-56 md:w-56 sm:h-52 sm:w-52 rounded-sm">
                            <div class="md:ml-3 sm:mt-4">
                                <p class="mt-4 text-gray-700 font-semibold font-sans max-sm:text-base md:text-lg lg:text-lg ml-2">
                                    {{ $bootcamp->judul_bootcamp }} <!-- Replace with your bootcamp field -->
                                </p>
                                <div
                                    class="flex items-center justify-start sm:justify-start max-sm:mt-1 max-sm:text-nowrap md:mt-4 lg:mt-4 text-gray-500">
                                    <i class="fas ml-2 fa-calendar-alt mr-2"></i>
                                    @php
                                        // Mengambil batch terakhir dari koleksi
                                        $lastBatch = $bootcamp->batch->last();
                                    @endphp

                                    <p class="text-sm" style="text-align: left;"> <!-- Gaya inline untuk perataan -->
                                        @if ($lastBatch)
                                            {{ $lastBatch->tanggal_mulai }}
                                        @else
                                            <p class="whitespace-normal">Tidak ada batch yang tersedia.</p>
                                        @endif
                                    </p> <!-- Replace with date field -->
                                </div>
                                <div
                                    class="flex items-center justify-start sm:justify-start max-sm:mt-1 md:mt-4 lg:mt-4 lg:mb-4 text-gray-500">
                                    <i class="fas ml-2 fa-tag mr-2"></i>
                                    @if ($lastBatch)
                                        <p class="text-sm" style="text-align: left;"> <!-- Gaya inline untuk perataan -->
                                            Rp {{ number_format($bootcamp->harga_diskon, 0, ',', '.') }}<span
                                                class="line-through text-xs/tight max-sm:hidden text-red-500 mx-2">Rp
                                                {{ number_format($bootcamp->harga, 0, ',', '.') }}</span>
                                        </p>
                                    @else
                                        Tidak ada batch yang tersedia.
                                    @endif
                                </div>
                            </div>
                    </div>
                </a>
            @endforeach

        </div>

        <!-- end grid -->

        <!-- akses konten premium -->
        <section class="w-full h-auto rounded-b-3xl bg-orange-100 lg:flex items-center mt-12 p-4">
            <img src="{{ asset('./assets/bootcamp/pembelajaran.png') }}" class="h-72 w-100 lg:ml-20 mx-auto py-4">
            <div class="mx-auto">
                <p class="text-4xl font-bold w-4/5 ml-4">E-learning & Training Untuk Perusahaan</p>
                <br>
                <p class="w-4/5 ml-4">Miliki akses ratusan konten elearning Pandai Digital serta dukungan corporate training
                    untuk
                    perusahaan.
                    Miliki juga berbagai fitur khusus untuk mendorong employee performance and development.</p>
                <br>
                <!-- <a href="/corporate-service" type="button"
                    class="ml-4 focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-3 me-2 mb-2 dark:focus:ring-yellow-900">Hubungi
                    Tim Pandai Digital</a> -->
            </div>
        </section>
        </div>
    </section>
@endsection
