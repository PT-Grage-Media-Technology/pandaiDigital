@extends('./myskill/layouts.main')
@section('container')
<section class="e-learning w-screen">
    <!-- Section 1: Hero -->
    <section class="bg-gradient-to-b from-orange-400 to-red-500 p-4 md:p-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-col lg:flex-row items-center">
                <img loading="lazy" src="{{ asset('assets/e-learning/drs_F10__3_-removebg-preview.png') }}" alt="Woman with laptop"
                    class="mb-4 md:mb-4 w-full h-auto max-sm:max-w-xs md:max-w-sm lg:w-1/2 rounded-lg md:ml-4 max-sm:ml-4">

                <div class="text-center lg:ml-5 lg:text-left">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 text-white">Kuasai Ratusan Skill,
                        Bangun Portfolio & Bersertifikat.</h1>
                    <p class="text-sm md:text-base text-white mb-4">Akses semua materi sekali bayar.
                        Lebih
                        dari sekadar nonton rekaman. Belajar fleksibel via • Video Materi • Case Study & Praktik • Bahan
                        Bacaan • Komunitas.</p>
                    <div class="flex justify-center lg:justify-start space-x-4 mb-4">
                        <a href="#pricing"
                            class="bg-teal-500 text-white px-6 py-2 rounded-md font-semibold text-gray-950">Mulai
                            Berlangganan</a>
                        <a href="#learning"
                            class="bg-yellow-500 text-white px-6 py-2 rounded-md font-semibold text-gray-950">Lihat
                            900+ Materi</a>
                    </div>
                    <p class="text-sm text-white">2.000+ Orang Berlangganan Setiap Minggu</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Section 2: Testimonials -->
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Testimoni Member E-learning Pandai Digital</h2>

            <div class="flex overflow-x-auto space-x-4 pb-4 no-scrollbar">
                @foreach ($testimonis as $testimoni)
                <div
                    class="bg-white p-4 rounded-2xl shadow-md max-w-[220px] sm:max-w-[180px] md:max-w-[200px] flex-shrink-0">
                    <div class="flex items-center justify-center mb-4">
                        <img loading="lazy" class="rounded-lg w-full max-h-[220px] object-cover"
                            src="{{ asset('foto_testimoni/' . $testimoni->gambar) }}" alt="Testimoni Image" />
                    </div>
                    <a href="{{ $testimoni->link }}">
                        <button class="w-full bg-violet-500 text-white py-2 rounded-md font-semibold">Baca
                            Cerita</button>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </section>


    <!-- Section 3: Solutions -->
    <section class="bg-white p-4 md:p-8">
        <div class="container mx-auto flex-col items-center text-center">
            <h4 class="text-md">E-Learning</h4>
            <h2 class="text-2xl font-bold mb-6">Solusi #1 Kuasai Ratusan Skill Profesional</h2>
        </div>

        <!-- Carousel Container -->
        <div id="card-container"
            class="flex overflow-x-auto whitespace-wrap w-auto scroll-smooth sm:hidden md:hidden lg:hidden no-scrollbar b-3">
            <!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img loading="lazy" src="{{ asset('assets/e-learning/1.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Belajar Fleksibel dan Bersertifikat</h3>
                    <p class="text-sm text-gray-600">Disusun bertahap dari level dasar hingga lanjutan oleh praktisi
                        industri dari berbagai top companies. Dapatkan e-certificate di tiap materi.</p>
                </div>
            </div>
            <!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img loading="lazy" src="{{ asset('assets/e-learning/2.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Kombinasi Strategi, Praktek & Portfolio</h3>
                    <p class="text-sm text-gray-600">Belajar sambil Praktek dengan ragam case study, worksheet dan
                        framework. Didasarkan pada kebutuhan industri dan profesi.</p>
                </div>
            </div><!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img loading="lazy" src="{{ asset('assets/e-learning/4.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Gabung Komunitas Diskusi secara Lifetime</h3>
                    <p class="text-sm text-gray-600">Bangun network profesional, saling sharing ilmu dan praktik,
                        sampai berbagi info loker maupun freelance. Hobi kumpul juga.</p>
                </div>
            </div><!-- Card: Digital Marketing -->
            <div class="flex flex-col w-64 bg-white border border-gray-300 rounded-lg shadow-md mr-4">
                <img loading="lazy" src="{{ asset('assets/e-learning/3.webp') }}" alt="Digital Marketing"
                    class="w-full h-auto object-cover rounded-t-lg">
                <div class="p-4 w-64">
                    <h3 class="font-bold mb-2 ">Ratusan Ribu Member. Terbukti Berdampak</h3>
                    <p class="text-sm text-gray-600">Member Pandai Digital telah terbukti diterima di National &
                        Multinational
                        companies, membangun bisnis hingga freelance.</p>
                </div>
            </div>
        </div>


        <div class="container mx-auto hidden lg:flex md:flex flex-col md:flex-row">
            <!-- Left Column with Cards -->
            <div class="w-full md:w-1/2 flex flex-col space-y-4">
                <div id="card1" data-target="img1"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md active-card">
                    <h3 class="font-bold mb-2">Belajar Fleksibel dan Bersertifikat</h3>
                    <p class="text-sm text-gray-600">Disusun bertahap dari level dasar hingga lanjutan oleh praktisi
                        industri dari berbagai top companies. Dapatkan e-certificate di tiap materi.</p>
                </div>
                <div id="card2" data-target="img2"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Kombinasi Strategi, Praktek & Portfolio</h3>
                    <p class="text-sm text-gray-600">Belajar sambil Praktek dengan ragam case study, worksheet dan
                        framework. Didasarkan pada kebutuhan industri dan profesi.</p>
                </div>
                <div id="card3" data-target="img3"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Gabung Komunitas Diskusi secara Lifetime</h3>
                    <p class="text-sm text-gray-600">Bangun network profesional, saling sharing ilmu dan praktik,
                        sampai berbagi info loker maupun freelance. Hobi kumpul juga.</p>
                </div>
                <div id="card4" data-target="img4"
                    class="cards bg-white border border-gray-300 rounded-xl p-4 transition-transform duration-300 ease-in-out transform hover:scale-105 hover:border-indigo-500 focus:ring-2 focus:ring-light-blue-500 cursor-pointer shadow-md">
                    <h3 class="font-bold mb-2">Ratusan Ribu Member. Terbukti Berdampak</h3>
                    <p class="text-sm text-gray-600">Member Pandai Digital telah terbukti diterima di National &
                        Multinational
                        companies, membangun bisnis hingga freelance.</p>
                </div>
            </div>
            <!-- Right Column with Images -->
            <div class="w-full md:w-1/2 flex items-center justify-center">
                <!-- Images for the Cards -->
                <div class="w-11/12 h-auto max-w-[90%] object-cover fade-in-left" id="img1">
                    <img loading="lazy" src="{{ asset('assets/e-learning/1.webp') }}" alt="Image 1">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img2">
                    <img loading="lazy" src="{{ asset('assets/e-learning/2.webp') }}" alt="Image 2">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img3">
                    <img loading="lazy" src="{{ asset('assets/e-learning/4.webp') }}" alt="Image 3">
                </div>
                <div class="w-11/12 h-auto max-w-[90%] object-cover hidden" id="img4">
                    <img loading="lazy" src="{{ asset('assets/e-learning/3.webp') }}" alt="Image 4">
                </div>
            </div>
        </div>

    </section>

    {{-- Section 4: Skills --}}
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl font-bold mb-4">Ratusan Skill Impian Kini Dalam Genggamanmu</h2>
            <p class="mb-4 text-gray-600">Lihat contoh beberapa materi terpopuler rancangan experts berikut. Materi
                baru
                setiap bulan tanpa tambahan biaya.</p>
            <!-- Buttons -->
            <div class="flex overflow-x-auto space-x-2 pb-2 no-scrollbar mb-5">
                @foreach ($categories as $index => $kategori)
                <button id="btn-{{ $kategori->id_kategori_program }}"
                    data-category-id="{{ $kategori->id_kategori_program }}"
                    class="tab-button {{ $index === 0 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }} px-4 py-2 rounded-full font-semibold flex-shrink-0 whitespace-nowrap">
                    {{ $kategori->nama_kategori }}
                </button>
                @endforeach
            </div>

            <!-- Pesan Materi Belum Tersedia -->
            <div id="empty-message" class="hidden text-center text-gray-500 mb-5">
                Materi Belum Tersedia
            </div>

            <!-- Carousel Container -->
            <div class="overflow-x-auto pb-2 no-scrollbar mb-5">
                <div id="card-container" class="flex space-x-2">
                    @foreach ($materis as $materi)
                    <a href="{{ url('/e-learning/materi/' . $materi->id_materi) }}">
                        <div id="card-{{ $materi->kategoriprogram->id_kategori_program }}"
                            data-category-id="{{ $materi->kategoriprogram->id_kategori_program }}"
                            class="card flex flex-col bg-white rounded-lg shadow-md h-full w-64">
                            <div class="relative w-full h-64">
                                <img loading="lazy" src="{{ asset('./thumbnail/' . $materi->thumbnail) }}"
                                    alt="{{ $materi->nama_materi }}"
                                    class="absolute inset-0 w-full h-full object-contain rounded-t-lg">
                            </div>
                            <div class="p-4 flex flex-col flex-grow">
                                <h3 class="font-bold text-lg mb-2">{{ $materi->nama_materi }}</h3>
                                <div class="flex items-center text-sm">
                                    <span class="mr-2">📅 {{ $materi->kategoriProgram->nama_kategori }}
                                        Video</span>
                                </div>
                                <div class="flex items-center text-sm mt-1">
                                    <span class="mr-2">👤 {{ $materi->rating_count }} users</span>
                                </div>
                                <div class="flex items-center mt-2">
                                    @if ($materi->rating_count > 0)
                                    <span class="text-yellow-500">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=floor($materi->rating / $materi->rating_count))
                                            ★
                                            @else
                                            ☆
                                            @endif
                                            @endfor
                                    </span>
                                    @endif
                                    <span class="ml-1 text-sm">
                                        {{ $materi->rating_count > 0
                                                    ? (fmod($materi->rating / $materi->rating_count, 1) == 0
                                                            ? number_format($materi->rating / $materi->rating_count, 0)
                                                            : number_format($materi->rating / $materi->rating_count, 1)) .
                                                        '/5 (' .
                                                        $materi->rating_count .
                                                        ' users)'
                                                    : 'No rating available' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </a>
                    @endforeach
                </div>
            </div>


            <div class="flex justify-center mt-4 gap-4">
                <a href="#pricing" class="scroll-smooth"><button
                        class="bg-yellow-500 text-white px-4 py-2 rounded-full">Mulai Berlangganan</button></a>
                <a href="#learning" class="scroll-smooth"><button
                        class="border border-cyan-500 text-cyan-300 px-4 py-2 rounded-full">Lihat Semua
                        Materi</button></a>
            </div>
        </div>
    </section>

    <!-- Section 5: Popular Courses -->
    <section id="learning" class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Daftar Learning Path Rancangan Experts</h2>

            {{-- DISINI SESUAIKAN CARDS NYA SEJAJAR --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                <a href="{{ route('program.show', $category->id_kategori_program) }}" class="block">
                    <!-- Card Element -->
                    <div
                        class="bg-white p-4 rounded-lg shadow-sm transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                        <div class="w-full aspect-w-2 aspect-h-2">
                            <img loading="lazy" src="{{ asset('./kategori_program/' . $category->gambar) }}"
                                alt="{{ $category->nama_kategori }}"
                                class="w-full h-full object-contain rounded-lg mb-2">
                        </div>
                        <h3 class="font-bold text-sm mt-5">{{ $category->nama_kategori }}</h3>
                        <div class="flex items-center text-xs text-gray-500"></div>
                        <div class="flex items-center mt-2">
                            <div class="flex items-center text-sm">
                                @php
                                $topiks = $materis
                                ->where('id_kategori_program', $category->id_kategori_program)
                                ->groupBy('id_topik')
                                ->count();

                                $materiCount = $materis
                                ->where('id_kategori_program', $category->id_kategori_program)
                                ->count();

                                $totalRataRating = 0;
                                $materiCount = 0;

                                foreach ($materis as $materi) {
                                if ($materi->id_kategori_program == $category->id_kategori_program) {
                                $ratedByArray = json_decode($materi->rated_users, true);
                                if (is_null($ratedByArray)) {
                                $ratedByArray = explode(',', $materi->rated_users);
                                }

                                $jumlahRatedBy = is_array($ratedByArray) ? count($ratedByArray) : 0;

                                if ($jumlahRatedBy > 0) {
                                $rataRatingMateri = $materi->rating / $jumlahRatedBy;
                                $totalRataRating += $rataRatingMateri;
                                }

                                $materiCount++;
                                }
                                }

                                $rataRatingKeseluruhan =
                                $materiCount > 0 ? $totalRataRating / $materiCount : 0;
                                @endphp

                                <span class="mr-2">
                                    @if ($topiks > 0 || $materiCount > 0)
                                    📅 {{ $topiks }} Topik - {{ $materiCount }} Materi
                                    @else
                                    Tidak ada topik, tidak ada materi
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex items-start mt-2 flex-col sm:flex-row">
                            <span class="text-yellow-400 text-sm">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <=round($rataRatingKeseluruhan))
                                    ★
                                    @else
                                    ☆
                                    @endif
                                    @endfor
                                    </span>
                                    <span class="ml-0.5 text-xs mt-1 text-gray-600">
                                        @if ($rataRatingKeseluruhan > 0)
                                        {{ number_format($rataRatingKeseluruhan, 1) }}/5
                                        @else
                                        Belum ada rating
                                        @endif
                                        <span
                                            class="text-xs bg-blue-100 text-blue-800 px-1 rounded">{{ $category->id_kategori_program }}</span>
                                    </span>

                        </div>

                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Section : Mentors --}}
    <section class="bg-gray-100 my-3 lg:mt-20">
        <div class="container mx-auto">
            <h3 class="text-2xl text-center font-bold py-3">Belajar Bersama Senior Operator Langsung di Kantor</h3>
            <p class="text-center text-gray-600 mb-8">Belajar langsung dari experienced professional yang mengajarkan
                pengalaman, case study & best practices.</p>
            <!-- Scrollable Card Section -->
            <div class="flex overflow-x-auto space-x-4 px-4 md:mx-24 mt-8 no-scrollbar">
                <!-- Card -->
                @foreach ($trainer as $train)
                <div class="flex-shrink-0 w-40 md:w-48 group mb-8">
                    <div class="relative">
                        <!-- Image -->
                        <img src="{{ asset('foto_trainer/' . $train->foto) }}" alt="Trainer Photo"
                            class="w-full h-48 object-cover rounded-lg shadow-lg">
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center rounded-lg">
                            <a href="{{ $train->link }}">
                                <button
                                    class="bg-white text-black py-2 px-4 rounded-full text-sm font-medium hover:bg-gray-200 transition mb-5">
                                    Lihat Profil
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 7: Pricing -->
    <section id="pricing" class="bg-gradient-to-b from-blue-100 to-white py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <p class="text-3xl font-bold text-center mb-2">Langganan Sekarang dan Jadi Lebih Hebat</p>
            <p class="text-center mb-8 text-gray-600">Langganan bulanan untuk akses semua materi, tanpa batas. Makin
                lama, makin hemat dan untung banyak.</p>
            @php
            // Memisahkan item aktif dan mengelompokkan item populer untuk ditempatkan di tengah
            $activeItems = $berlangganans->filter(fn($item) => $item->is_active); // Hanya item yang aktif
            $populer = $activeItems->filter(fn($item) => $item->is_populer); // Hanya item populer yang aktif
            $biasa = $activeItems->reject(fn($item) => $item->is_populer); // Item biasa yang aktif

            // Menempatkan item populer di tengah
            $sorted = collect($biasa->slice(0, ceil($biasa->count() / 2)))
            ->merge($populer)
            ->merge($biasa->slice(ceil($biasa->count() / 2)));
            @endphp

            <div class="flex flex-col mt-9 md:flex-row gap-6">
                @foreach ($sorted as $berlangganan)
                @if ($berlangganan->is_populer)
                <div class="active-1 bottom-5 border-4 border-yellow-400 rounded-xl relative">
                    <!-- Header -->
                    <div class="bg-teal-600 p-6 rounded-t-lg">
                        <div
                            class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-yellow-400 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            <i class='bx bxs-crown bx-tada' style='color:#ff9f00'></i>
                            TERPOPULER!
                            <i class='bx bxs-crown bx-tada' style='color:#ff9f00'></i>
                        </div>
                        @else
                        <div class="active-2 max-sm:mb-5">
                            <!-- Header -->
                            <div class="bg-blue-500 p-6 rounded-t-lg">
                                @endif
                                <h3 class="text-white text-lg font-semibold mb-1">{{ $berlangganan->masa_berlangganan }}</h3>
                                <p class="text-blue-100 text-sm mb-2">PAKET VIDEO E-LEARNING</p>
                                <p class="text-white text-sm line-through mb-1">Rp.
                                    {{ number_format($berlangganan->harga_berlangganan, 0, ',', '.') }}
                                </p>
                                <p class="text-white text-2xl font-bold mb-2">Rp.
                                    {{ number_format($berlangganan->harga_diskon, 0, ',', '.') }}
                                </p>
                                <p class="text-white text-sm mb-2">Untuk akses semua, setara Rp 7.250 / minggu.</p>
                            </div>

                            <!-- Body -->
                            <div class="p-6 bg-white rounded-b-lg">
                                <ul class="text-gray-800 text-sm mb-6 space-y-2">
                                    @foreach ($berlangganan->benefits() as $benefit)
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-800" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>{{ $benefit->nama_benefit }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('payment.learning', ['id' => $berlangganan->id_berlangganan]) }}">
                                    <button
                                        class="w-full bg-blue-500 text-white font-semibold py-2 rounded text-sm hover:bg-blue-600 transition-colors">
                                        Mulai Berlangganan
                                    </button>
                                </a>
                                <p class="text-black text-xs mt-2">Segera Habis 🔥</p>
                                <div class="w-full h-1 bg-blue-400 rounded mt-1"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>




    </section>

    {{-- Section 8: Portofolio --}}
    <section class="bg-gray-100 p-4 md:p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-2 text-center">Portfolio Member Pandai Digital</h2>
            <p class="mb-4 text-gray-600 text-center">Bangun Portfoliomu dengan belajar secara praktikal dan direct di
                Pandai Digital.</p>


            <div class="flex overflow-x-auto space-x-4 pb-4 no-scrollbar">
                @foreach($portos as $porto)
                <div class="bg-white p-4 rounded-2xl shadow-md min-w-[180px] sm:min-w-[200px] md:min-w-[220px]">
                    <div class="flex items-center mb-4">
                        <img loading="lazy" src="{{ asset('assets/e-learning/'. $porto->gambar) }}" alt="Gambar Portofolio"
                            class="rounded-lg">
                    </div>
                    <h3 class="font-bold text-sm mb-4">{{ $porto->judul }}</h3>
                    <p class="text-xs text-gray-600 mb-2">{{ $porto->deskripsi }}</p>
                    <a href="{{ $porto->link }}">
                        <button class="w-full bg-teal-500 text-white py-2 rounded-md font-semibold">Lihat
                            Portofolio</button>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- akses konten premium -->
    <section class="w-full h-auto rounded-b-3xl bg-orange-100 lg:flex items-center p-4">
        <img loading="lazy" src="{{ asset('./assets/bootcamp/pembelajaran.png') }}"
            class="h-72 w-100 lg:ml-20 mx-auto py-4">
        <div class="mx-auto">
            <p class="text-4xl font-bold w-4/5 ml-4">E-learning & Training Untuk Perusahaan</p>
            <br>
            <p class="w-4/5 ml-4">Miliki akses ratusan konten elearning Pandai Digital serta dukungan corporate
                training untuk
                perusahaan.
                Miliki juga berbagai fitur khusus untuk mendorong employee performance and development.</p>
            <br>
            <a href="/e-learning" type="button"
                class="ml-4 focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-3 me-2 mb-2 dark:focus:ring-yellow-900">Hubungi
                Tim Pandai Digital</a>
        </div>

    </section>

</section>
<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-category-id');

            // Sembunyikan semua kartu materi
            document.querySelectorAll('#card-container .card').forEach(card => {
                if (card.getAttribute('data-category-id') === categoryId) {
                    card.style.display = 'block'; // Tampilkan kartu jika id kategori cocok
                } else {
                    card.style.display = 'none'; // Sembunyikan kartu jika tidak cocok
                }
            });

            // Cek apakah ada materi yang sesuai dengan kategori
            const hasVisibleMateri = Array.from(document.querySelectorAll('#card-container .card'))
                .some(card => card.getAttribute('data-category-id') === categoryId && card.style
                    .display === 'block');

            // Tampilkan pesan jika tidak ada materi
            const emptyMessage = document.getElementById('empty-message');
            if (hasVisibleMateri) {
                emptyMessage.classList.add('hidden'); // Sembunyikan pesan jika ada materi
            } else {
                emptyMessage.classList.remove('hidden'); // Tampilkan pesan jika tidak ada materi
            }
        });
    });




    document.addEventListener('DOMContentLoaded', () => {
        // Select all buttons and cards
        const buttons = document.querySelectorAll('.tab-button');
        const cards = document.querySelectorAll('.card');

        // Check if buttons and cards are found; if not, exit the script
        if (buttons.length === 0 || cards.length === 0) {
            console.error('Buttons or cards not found in the DOM.');
            return;
        }

        // Set the first button as active and display the first set of cards
        const firstCategoryId = buttons[0].getAttribute('data-category-id');
        setActiveButton(buttons[0]);
        filterCards(firstCategoryId);

        // Add click event listeners to each button
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const categoryId = button.getAttribute('data-category-id');

                // Change button color to indicate active state
                setActiveButton(button);

                // Display only the cards that match the selected category ID
                filterCards(categoryId);
            });
        });

        // Function to set the active button and remove active state from others
        function setActiveButton(activeButton) {
            // Reset all buttons to the default style
            buttons.forEach(button => {
                button.classList.remove('bg-cyan-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });

            // Set the clicked button to active style
            activeButton.classList.remove('bg-gray-200', 'text-gray-700');
            activeButton.classList.add('bg-cyan-500', 'text-white');
        }

        // Function to show cards based on the selected category ID
        function filterCards(categoryId) {
            cards.forEach(card => {
                const link = card.parentElement; // Get the <a> element wrapping the card
                if (card.getAttribute('data-category-id') === categoryId) {
                    link.classList.remove('hidden'); // Tampilkan elemen <a>
                    link.style.display = 'block'; // Kembalikan display menjadi block saat terlihat
                } else {
                    link.classList.add('hidden'); // Sembunyikan elemen <a>
                    link.style.display =
                        'none'; // Tambahkan display: none untuk menghilangkan elemen dari layout
                }
            });
        }
    });
</script>
@endsection