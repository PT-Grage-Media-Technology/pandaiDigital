@extends('./myskill/layouts.main')
@section('container')
    @if (Auth::check())
        @if ($isSubscribed || $isTrainer || $isContributor)
            <div class="container mx-auto w-screen">
                <div class="flex flex-col sm:flex-row items-center bg-gradient-to-b from-orange-400 to-orange-500 p-6 w-screen">
                    <div class="w-full sm:w-80 lg:mr-12">
                        <img loading="lazy" src="{{ asset('./assets/bootcamp/bootcamp-header.png') }}"
                            class="w-full max-sm:w-full mx-4 py-4" />
                    </div>
                    <!-- Text Section -->
                    <div class="w-full justify-center sm:w-1/2 pl-0 sm:pl-8 mt-4 sm:mt-0">
                        <h1 class="text-4xl font-bold text-white whitespace-normal text-center sm:text-left">
                            <span class="text-black">BOOTCAMP </span>
                            <span>PANDAI DIGITAL</span>
                        </h1>
                        <p class="mt-4 text-lg text-gray-700 text-center sm:text-left">
                            Bebas konsultasi dan tanya jawab dengan Master Tutor!
                        </p>
                        <div class="flex justify-center sm:justify-start">
                            <a href="#materi-list">
                                 <button
                                class="mt-6 bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                                Lihat Jadwal
                            </button>

                            </a>

                        </div>
                        <!-- Tambahkan progress bar -->
                        @php
                            $progress = app(App\Http\Controllers\ProgressController::class)
                                ->getUserProgress(Auth::id(), $bootcamp->id_bootcamp);
                        @endphp
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-base font-medium text-gray-700">Progress Bootcamp</span>
                                <span class="text-sm font-medium text-gray-700">{{ number_format($progress['percentage'], 1) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-2.5 rounded-full transition-all duration-500" 
                                     style="width: {{ $progress['percentage'] }}%"></div>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-600">
                                    {{ $progress['completed'] }} dari {{ $progress['total'] }} materi selesai
                                </p>
                                
                                <!-- Button Claim Certificate -->
                                {{-- <div id="certificate-section" style="display: none;">
                                    <form action="{{ route('claim.certificate') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" id="bootcampId" value="{{ $bootcamp->id_bootcamp }}">
                                        <button type="submit" 
                                                class="bg-gradient-to-r from-green-500 to-green-600 text-white text-sm px-4 py-2 rounded-full hover:from-green-600 hover:to-green-700 transition duration-300 flex items-center gap-2 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                            <i class='bx bx-certification text-xl'></i>
                                            <span>Claim Sertifikat</span>
                                        </button>
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content 2 -->

            <section class="container mx-auto px-4 mt-10 w-screen">
                <h2 class="text-3xl font-bold text-center my-5">Jadwal Live Class Bootcamp <span
                        class="text-orange-500">{{ $bootcamp->judul_bootcamp }}</span></h2>

                <div class="flex flex-col md:flex-row lg:mx-10 shadow-xl my-20 py-10 rounded-2xl gap-8">
                    <!-- Left side - Thumbnail -->
                    <div class="w-full md:w-1/2 lg:ml-10">
                        <div id="thumbnail-container" class="bg-white p-4">
                            <div class="grid grid-flow-col w-14 h-14 gap-2 max-sm:ml-4">
                                <img src="{{ asset('assets/bulet_merah.svg') }}" class="w-40 rounded-lg">
                                <img src="{{ asset('assets/bulet_kuning.svg') }}" class="w-40 rounded-lg">
                                <img src="{{ asset('assets/bulet_ijo.svg') }}" class="w-40 rounded-lg">
                            </div>
                            <img id="materi-thumbnail" src="{{ asset('thumbnail_bootcamp/' . $bootcamp->thumbnail) }}"
                                alt="Thumbnail Materi" class="rounded-lg" style="width: 370px; height: 320px;">
                            <h3 id="materi-title" class="text-xl font-semibold mt-4">
                                {{ $materis->first()->judul_file ?? 'Pilih Materi' }}
                            </h3>
                            <p id="materi-details" class="text-gray-600 mt-2">
                                {{ $materis->first()->live_date ? \Carbon\Carbon::parse($materis->first()->live_date)->format('d F Y H:i') : 'Jadwal belum ditentukan' }}
                            </p>
                            <p class="my-3 font-bold"> - </p>
                            <div class="font-semibold text-xl my-1 p-1">
                                <i class='bx bxl-zoom'></i> Zoom
                            </div>
                            <div class="font-semibold text-xl my-1 p-1">
                                <i class='bx bxs-id-card'></i> Khusus Member
                            </div>
                            <form id="progress-form" action="{{ route('watch.materi') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_materi_bootcamp" id="selected-materi-id" value="">
                                <button id="materi-url" type="submit" 
                                        class="mt-4 bg-purple-600 text-white max-sm:text-md text-xl my-3 max-sm:py-1 py-4 px-4 rounded-full hover:bg-purple-700 transition duration-300 inline-block">
                                    <i class='bx bx-play-circle'></i> Tonton Video
                                </button>
                            </form>
                        </div>

                        <div id="tasks-thumbnail-container" class="bg-white p-4 hidden">
                            <div class="grid grid-flow-col w-14 h-14 gap-2 max-sm:ml-4">
                                <img src="{{ asset('assets/bulet_merah.svg') }}" class="w-40 rounded-lg">
                                <img src="{{ asset('assets/bulet_kuning.svg') }}" class="w-40 rounded-lg">
                                <img src="{{ asset('assets/bulet_ijo.svg') }}" class="w-40 rounded-lg">
                            </div>
                            <img id="materi-thumbnail" src="{{ asset('thumbnail_bootcamp/' . $bootcamp->thumbnail) }}"
                                alt="Thumbnail Materi" class="rounded-lg mx-auto" style="width: 370px; height: 210px;">
                            <h3 id="tasks-title" class="text-xl font-semibold mt-4">
                                {{ $tasks->first()->judul_tugas ?? 'Pilih Tugas' }}
                            </h3>
                            <p id="tasks-details" class="text-gray-600 mt-2">
                                Status: {{ $tasks->first()->status == 0 ? 'Belum Dikerjakan' : 'Sudah Dikerjakan' }}
                            </p>
                            <a id="tasks-url" href="#"
                                class="mt-4 bg-purple-600 text-white text-xl my-3 py-4 px-4 rounded-full hover:bg-purple-700 transition duration-300 inline-block">
                                <i class='bx bx-play-circle'></i> Lihat Tugas
                            </a>
                        </div>

                    </div>


                    <!-- Right side - List of materials -->
                    <div class="w-full md:w-1/2">
                        <div class="bg-white p-4">
                            <div class="flex justify-between items-center mb-10">
                                <h4 class="text-lg font-semibold">Pilih Bulan</h4>
                                <div class="flex items-center">
                                    <button id="prev-month" class="text-gray-600 hover:text-purple-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <span id="current-month" class="mx-2 font-medium"></span>
                                    <button id="next-month" class="text-gray-600 hover:text-purple-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <ul id="materi-list" class="space-y-2 overflow-y-auto max-h-96">
                                @if ($materis->isNotEmpty())
                                    @foreach ($materis as $materi)
                                        <li class="flex items-center bg-white border-2 rounded-lg p-3 shadow-sm hover:shadow-md transition duration-300 cursor-pointer hover:bg-gray-50"
                                            data-materi-id="{{ $materi->id_materi_bootcamp }}"
                                            data-url="{{ $materi->url }}" data-title="{{ $materi->judul_file }}"
                                            data-file="{{ $materi->file }}" data-date="{{ $materi->live_date }}">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                                <i class='bx bx-play-circle'></i>
                                            </div>
                                            <div class="flex-grow">
                                                <h5 class="font-medium">{{ $materi->judul_file }}</h5>
                                                <p class="text-sm text-gray-600">
                                                    {{ \Carbon\Carbon::parse($materi->live_date)->format('d F Y H:i') }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p class="my-3 font-semibold">Tidak ada Materi</p>
                                @endif
                            </ul>

                            <ul id="task-list" class="space-y-2 overflow-y-auto max-h-96" hidden>
                                @if (!empty($tasks) && $tasks->count())
                                    @foreach ($tasks as $task)
                                        <li class="flex items-center bg-white border rounded-lg p-3 shadow-sm hover:shadow-md transition duration-300 cursor-pointer hover:bg-gray-50"
                                            data-task-id="{{ $task->id_tugas_bootcamp }}" data-url="{{ $task->url }}"
                                            data-title="{{ $task->judul_tugas }}" data-file="{{ $task->file }}"
                                            data-status="{{ $task->status }}" data-date="{{ $task->created_at }}">
                                            <div
                                                class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                                                <i class='bx bx-play-circle'></i>
                                            </div>
                                            <div class="flex-grow">
                                                <h5 class="font-medium">{{ $task->judul_tugas }}</h5>
                                                <p class="text-sm text-gray-600">
                                                    Status: {{ $task->status == 0 ? 'Belum Selesai' : 'Selesai' }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <p class="text-center text-gray-500">Tidak ada tugas yang tersedia</p>
                                @endif
                            </ul>


                            <div class="flex justify-end">
                                <button
                                    class="my-4 bg-purple-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-purple-700 transition duration-300"
                                    id="change-tugas">Lihat Tugas <i class='bx bx-clipboard'></i></button>
                                <button
                                    class="my-4 bg-purple-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-purple-700 transition duration-300"
                                    id="change-materis" hidden>Lihat Materi <i class='bx bxs-book-bookmark'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- content 3 -->
            <div class="container mx-auto py-10 lg:px-20 max-sm:px-4">
                <div class="container mx-auto p-4">
                    <h1 class="text-3xl font-bold text-orange-500 mb-4">
                        <span class="text-black">Daftar</span> Master Tutor
                    </h1>

                    <div class="mb-6">
                        <input type="text" id="searchInput" placeholder="Cari tutor..."
                            class="border border-gray-300 rounded-lg p-2 w-full md:w-1/3 focus:ring focus:ring-purple-300"
                            onkeyup="searchTutor()" />
                    </div>

                    <div id="tutorList" class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($trainers as $trainer)
                            <div class="bg-white shadow-lg rounded-lg p-4 flex items-center space-x-4 tutor-card"
                                data-name="{{ $trainer->nama_trainer }}">
                                <img class="w-16 h-16 rounded-full border-2 border-orange-600" src="{{ asset('foto_trainer/' . $trainer->foto) }}"
                                    alt="Tutor" />
                                <div>
                                    <h2 class="text-xl font-bold">{{ $trainer->nama_trainer }}</h2>
                                    <p class="text-gray-500">Pengajar</p>
                                    <!-- Tambahkan 'N/A' jika username tidak ada -->
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <p id="noResultMessage" class="hidden text-center text-gray-500">Tidak menemukan tutor</p>
                </div>
                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4">
                    <button class="flex text-lg items-center font-semibold px-4 py-2 text-gray-600 rounded-lg prevBtn">
                        << Prev </button>
                            <button
                                class="flex text-lg items-center font-semibold px-4 py-2 text-gray-600 rounded-lg nextBtn">
                                Next >>
                            </button>
                </div>
            </div>
            </div>
            </div>

            <!-- content 4 -->
            <div class="container mx-auto py-10 lg:px-20 max-sm:px-4">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold">
                        Pertanyaan Seputar Live Class
                        <span class="text-orange-500">Pandai Digital</span>
                    </h1>
                </div>

                <div class="space-y-4">
                    <!-- Pertanyaan 1 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(1)">
                            Selain bimbel SNBT, apakah ada bimbel SKD Kedinasan dan bimbel SIMAMA?
                        </button>
                        <div id="dropdown-1" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            Sebagai salah satu bimbel online terlengkap, kini Pandai Digital menyediakan bimbingan belajar
                            untuk persiapan UTBK-SNBT, SKD Kedinasan, hingga SIMAMA Poltekkes. Kamu bisa mendapatkan
                            semuanya hanya dengan sekali langganan.
                        </div>
                    </div>

                    <!-- Pertanyaan 2 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(2)">
                            Mengapa Harus Mengikuti Bimbel SKD Kedinasan?
                        </button>
                        <div id="dropdown-2" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            Dengan mengikuti bimbel SKD Kedinasan, belajar kamu akan lebih terarah dan mendapatkan trik dan
                            tips menaklukan ujian dengan mudah.
                        </div>
                    </div>

                    <!-- Pertanyaan 3 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(3)">
                            Berapa kali pertemuan tiap minggunya?
                        </button>
                        <div id="dropdown-3" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            2x per minggu dengan pembagian materi ujian yang merata.
                        </div>
                    </div>

                    <!-- Pertanyaan 4 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(4)">
                            Apakah bisa menonton ulang bimbel yang terlewat?
                        </button>
                        <div id="dropdown-4" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            Kamu bisa menonton dan membaca ulang materi bimbel yang terlewat melalui menu video.
                        </div>
                    </div>

                    <!-- Pertanyaan 5 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(5)">
                            Bagaimana cara mengikuti bimbel di Pandai Digital?
                        </button>
                        <div id="dropdown-5" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            1.⁠ ⁠Pastikan sudah tedaftar sebagai Pandai Digital Premium
                            </br>
                            2.⁠ ⁠Login menggunakan akun terdaftar
                            </br>
                            3.�� ⁠Klik menu Live Class
                            </br>
                            4.⁠ ⁠Klik "Ikuti Kelas" pada kelas yang sedang berlangsung
                        </div>
                    </div>

                    <!-- Pertanyaan 6 -->
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <button class="w-full text-left py-4 px-6 bg-white text-gray-700 font-semibold focus:outline-none"
                            onclick="toggleDropdown(6)">
                            Apakah harus premium untuk mengikuti bimbel?
                        </button>
                        <div id="dropdown-6" class="hidden px-6 py-4 bg-gray-100 text-gray-700">
                            Iya benar, kamu harus upgrade ke premium untuk menikmati fasilitas bimbel online Pandai Digital.
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                const bootcampId = document.getElementById('bootcampId').value;
                
                // Tambahkan debug log
                console.log('Checking progress for bootcamp:', bootcampId);
                
                fetch(`/check-progress/${bootcampId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Progress data:', data); // Debug lengkap
                        
                        // Pastikan data tidak null/undefined
                        if (data && typeof data.percentage !== 'undefined') {
                            const percentage = parseFloat(data.percentage);
                            console.log('Parsed percentage:', percentage);
                            
                            if (percentage >= 100) {
                                document.getElementById('certificate-section').style.display = 'block';
                            } else {
                                console.log('Progress belum 100%:', percentage);
                            }
                        } else {
                            console.error('Invalid progress data received:', data);
                        }
                    })
                    .catch(error => {
                        console.error('Error checking progress:', error);
                    });
            });
                </script>

            <script>
                // Select all list items
                const materiItems = document.querySelectorAll('#materi-list li');

                materiItems.forEach(item => {
                    item.addEventListener('click', function() {
                        // Remove 'active' class from all items
                        materiItems.forEach(i => i.classList.remove('active', 'bg-white', 'border-[#7E3AF2]'));

                        // Add 'active' class to the clicked item
                        this.classList.add('active', 'bg-white', 'border-[#7E3AF2]');
                    });
                });

                // resources/js/jadwal-live-class.js
                document.addEventListener('DOMContentLoaded', function() {
                const materiItems = document.querySelectorAll('#materi-list li');
                const materiIdInput = document.getElementById('selected-materi-id');
                const materiUrlElement = document.getElementById('materi-url');
                const thumbnailContainer = document.getElementById('thumbnail-container');
                const materiList = document.getElementById('materi-list');
                const currentMonthSpan = document.getElementById('current-month');
                const prevMonthBtn = document.getElementById('prev-month');
                const nextMonthBtn = document.getElementById('next-month');
            
                let currentMonth = new Date().getMonth();
                let currentYear = new Date().getFullYear();
            
                // Sembunyikan tombol "Tonton Video" pada awalnya
                materiUrlElement.classList.add('hidden');
            
                function updateMonth() {
                    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                    ];
                    currentMonthSpan.textContent = `${monthNames[currentMonth]} ${currentYear}`;
                }
            
                function filterMaterials() {
                    const items = materiList.querySelectorAll('li');
                    items.forEach(item => {
                        const date = new Date(item.dataset.date);
                        if (date.getMonth() === currentMonth && date.getFullYear() === currentYear) {
                            item.style.display = '';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                }
            
                function toggleWatchButton() {
                    if (materiIdInput.value) {
                        materiUrlElement.classList.remove('hidden');
                    } else {
                        materiUrlElement.classList.add('hidden');
                    }
                }
            
                function updateThumbnail(material) {
                    document.getElementById('materi-title').textContent = material.dataset.title;
                    const liveDate = new Date(material.dataset.date);
            
                    document.getElementById('materi-details').textContent = liveDate.toLocaleString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
            
                    const currentTime = new Date();
                    const hoursDifference = (currentTime - liveDate) / (1000 * 60 * 60);
                    const futureHoursDifference = (liveDate - currentTime) / (1000 * 60 * 60);
            
                    // Atur ID materi yang dipilih dan perbarui visibilitas tombol
                    materiIdInput.value = material.dataset.materiId;
                    toggleWatchButton();
            
                    if (futureHoursDifference > 0) {
                        materiUrlElement.onclick = function(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Materi akan datang!',
                                text: `Materi ini akan tersedia dalam ${futureHoursDifference.toFixed(1)} jam.`,
                                icon: 'info',
                                confirmButtonText: 'Ok'
                            });
                        };
                    } else if (hoursDifference > 3) {
                        materiUrlElement.href = `/program/preview_video?id=${material.dataset.materiId}`;
                        materiUrlElement.onclick = null;
                    } else {
                        materiUrlElement.href = material.dataset.url;
                        materiUrlElement.onclick = null;
                    }
                }
            
                materiList.addEventListener('click', function(e) {
                    const listItem = e.target.closest('li');
                    if (listItem) {
                        updateThumbnail(listItem);
                        materiList.querySelectorAll('li').forEach(item => item.classList.remove('bg-purple-100'));
                        listItem.classList.add('bg-purple-100');
                    }
                });
            
                prevMonthBtn.addEventListener('click', () => {
                    if (currentMonth === 0) {
                        currentMonth = 11;
                        currentYear--;
                    } else {
                        currentMonth--;
                    }
                    updateMonth();
                    filterMaterials();
                });
            
                nextMonthBtn.addEventListener('click', () => {
                    if (currentMonth === 11) {
                        currentMonth = 0;
                        currentYear++;
                    } else {
                        currentMonth++;
                    }
                    updateMonth();
                    filterMaterials();
                });
            
                updateMonth();
                filterMaterials();
            
                // Pastikan tombol tetap tersembunyi jika tidak ada materi yang dipilih
                toggleWatchButton();
            });


                // ini tasks

                document.addEventListener('DOMContentLoaded', function() {
                    const materiList = document.getElementById('materi-list');
                    const tasksList = document.getElementById('task-list');
                    const changeTugasBtn = document.getElementById('change-tugas');
                    const changeMaterisBtn = document.getElementById('change-materis');
                    const thumbnailMateri = document.getElementById('thumbnail-container');
                    const tasksThumbnailContainer = document.getElementById('tasks-thumbnail-container');



                    // Handle the visibility toggling
                    changeTugasBtn.addEventListener('click', function() {
                        materiList.hidden = true;
                        tasksList.hidden = false;
                        changeTugasBtn.hidden = true;
                        changeMaterisBtn.hidden = false;
                        thumbnailMateri.hidden = true;
                        tasksThumbnailContainer.classList.remove('hidden');
                    });

                    changeMaterisBtn.addEventListener('click', function() {
                        materiList.hidden = false;
                        tasksList.hidden = true;
                        changeTugasBtn.hidden = false;
                        changeMaterisBtn.hidden = true;
                        thumbnailMateri.hidden = false;
                        tasksThumbnailContainer.classList.add('hidden');
                    });


                    // const tasksList = document.getElementById('task-list');
                    const currentMonthSpan = document.getElementById('current-month');
                    const prevMonthBtn = document.getElementById('prev-month');
                    const nextMonthBtn = document.getElementById('next-month');

                    let currentMonth = new Date().getMonth();
                    let currentYear = new Date().getFullYear();

                    function updateMonth() {
                        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                            "September", "Oktober", "November", "Desember"
                        ];
                        currentMonthSpan.textContent = `${monthNames[currentMonth]} ${currentYear}`;
                    }

                    // console.log(tasksList);

                    function filterTasks() {
                        const items = tasksList.querySelectorAll('li');
                        items.forEach(item => {
                            const taskDate = new Date(item.dataset.date);
                            if (taskDate.getMonth() === currentMonth && taskDate.getFullYear() === currentYear) {
                                item.style.display = '';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    }

                    function updateTasksThumbnail(task) {
                        const thumbnail = document.getElementById('tasks-thumbnail');
                        const title = document.getElementById('tasks-title');
                        const details = document.getElementById('tasks-details');

                        document.getElementById('tasks-url').href = `/program/tugas_bootcamp?id=${task.dataset.taskId}`;

                        // Update the thumbnail video source
                        thumbnail.src = `/files_tugasbootcamps/${task.dataset.file}`;

                        // Update the title and status
                        title.textContent = task.dataset.title;
                        const taskStatus = task.dataset.status == 0 ? 'Belum Dikerjakan' : 'Sudah Dikerjakan';
                        details.textContent = `Status: ${taskStatus}`;

                        // Unhide the tasks thumbnail container
                        const tasksThumbnailContainer = document.getElementById('tasks-thumbnail-container');
                        tasksThumbnailContainer.hidden = false;
                    }




                    tasksList.addEventListener('click', function(e) {
                        const listItem = e.target.closest('li');
                        if (listItem) {
                            updateTasksThumbnail(listItem);
                            // Remove 'active' class from all tasks items
                            tasksList.querySelectorAll('li').forEach(item => item.classList.remove(
                                'bg-purple-100'));
                            materiList.querySelectorAll('li').forEach(item => item.classList.remove(
                                'bg-purple-100'));
                            // Add 'active' class to clicked task item
                            listItem.classList.add('bg-purple-100');
                        }
                    });


                    prevMonthBtn.addEventListener('click', () => {
                        if (currentMonth === 0) {
                            currentMonth = 11;
                            currentYear--;
                        } else {
                            currentMonth--;
                        }
                        updateMonth();
                        filterTasks();
                    });

                    nextMonthBtn.addEventListener('click', () => {
                        if (currentMonth === 11) {
                            currentMonth = 0;
                            currentYear++;
                        } else {
                            currentMonth++;
                        }
                        updateMonth();
                        filterTasks();
                    });

                    updateMonth();
                    filterTasks();

                    // Initialize with the first task item if available
                    const firstTask = tasksList.querySelector('li');
                    if (firstTask) {
                        updateTasksThumbnail(firstTask);
                        firstTask.classList.add('bg-purple-100');
                    }
                });

                // fitur search tutor
                function searchTutor() {
                    // Ambil input pengguna
                    let input = document.getElementById('searchInput').value.toLowerCase();

                    // Ambil semua elemen kartu tutor
                    let tutorCards = document.getElementsByClassName('tutor-card');
                    let noResultMessage = document.getElementById('noResultMessage');
                    let hasVisibleCard = false;

                    // Loop melalui kartu untuk mencocokkan input pengguna
                    for (let i = 0; i < tutorCards.length; i++) {
                        let tutorName = tutorCards[i].getAttribute('data-name').toLowerCase();

                        // Jika nama tutor sesuai dengan input, tampilkan kartunya
                        if (tutorName.includes(input)) {
                            tutorCards[i].style.display = "flex"; // Tampilkan kartu (menggunakan flex)
                            hasVisibleCard = true; // Ada kartu yang sesuai
                        } else {
                            tutorCards[i].style.display = "none"; // Sembunyikan kartu
                        }
                    }

                    // Jika tidak ada kartu yang tampil, tampilkan pesan "Tidak menemukan tutor"
                    if (!hasVisibleCard) {
                        noResultMessage.classList.remove('hidden'); // Tampilkan pesan
                    } else {
                        noResultMessage.classList.add('hidden'); // Sembunyikan pesan
                    }
                }

                //fitur pagination master tutor
                // Array untuk menyimpan semua card tutor
                const tutorCards = Array.from(document.querySelectorAll('.tutor-card'));

                // Tentukan jumlah card per halaman
                const cardsPerPage = 3;
                let currentPage = 1;

                // Fungsi untuk menampilkan card berdasarkan halaman
                function showPage(page) {
                    const startIndex = (page - 1) * cardsPerPage;
                    const endIndex = startIndex + cardsPerPage;

                    // Sembunyikan semua card
                    tutorCards.forEach((card, index) => {
                        if (index >= startIndex && index < endIndex) {
                            card.style.display = 'flex'; // Tampilkan card
                        } else {
                            card.style.display = 'none'; // Sembunyikan card
                        }
                    });
                }

                // Fungsi untuk navigasi ke halaman sebelumnya
                function prevPage() {
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                    }
                }

                // Fungsi untuk navigasi ke halaman selanjutnya
                function nextPage() {
                    if (currentPage * cardsPerPage < tutorCards.length) {
                        currentPage++;
                        showPage(currentPage);
                    }
                }

                // Inisialisasi tampilan halaman pertama
                showPage(currentPage);

                // Tambahkan event listener untuk tombol Prev dan Next
                document.querySelector('.prevBtn').addEventListener('click', prevPage);
                document.querySelector('.nextBtn').addEventListener('click', nextPage);


                // fungsi dropdown
                function toggleDropdown(id) {
                    // Tutup semua dropdown
                    const allDropdowns = document.querySelectorAll('[id^="dropdown-"]');
                    allDropdowns.forEach(dropdown => {
                        if (dropdown.id !== `dropdown-${id}`) {
                            dropdown.classList.add('hidden'); // Sembunyikan dropdown lain
                        }
                    });

                    // Toggle dropdown yang diklik
                    const selectedDropdown = document.getElementById(`dropdown-${id}`);
                    selectedDropdown.classList.toggle('hidden');
                }

                document.addEventListener('DOMContentLoaded', function() {
                    const materiList = document.getElementById('materi-list');
                    const selectedMateriInput = document.getElementById('selected-materi-id');

                    materiList.addEventListener('click', function(e) {
                        const listItem = e.target.closest('li');
                        if (listItem) {
                            // Update hidden input value dengan id materi yang dipilih
                            const materiId = listItem.dataset.materiId;
                            selectedMateriInput.value = materiId;
                            
                            // Update tampilan thumbnail dan informasi lainnya
                            updateThumbnail(listItem);
                            
                            // Hapus kelas aktif dari semua item
                            materiList.querySelectorAll('li').forEach(item => 
                                item.classList.remove('bg-purple-100')
                            );
                            
                            // Tambah kelas aktif ke item yang dipilih
                            listItem.classList.add('bg-purple-100');
                        }
                    });
                });
            </script>
        @else
            @include('./myskill/pages/program.subscription-bootcamp')
        @endif
    @else
        <script>
            // Redirect to /login
            window.location.href = "/login";
        </script>
    @endif
@endsection
