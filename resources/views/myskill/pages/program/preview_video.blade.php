@extends('./myskill/layouts.main')
@section('container')
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">

            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:pt-10">
                <div class="flex items-center space-x-4">
                    <div class="grid grid-flow-row items-center w-full h-full">
                        <div>
                            @php
                                $fileExtension = pathinfo($materibootcamp->file, PATHINFO_EXTENSION);
                            @endphp
                            @if ($fileExtension === 'pdf')
                                <iframe src="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}" class="rounded-lg w-full h-[300px] lg:w-[700px] lg:h-[500px]"></iframe>
                            @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}"
                                    class="w-full rounded-lg" alt="Image">
                            @else
                                <video controls class="w-full rounded-lg" controlsList="nodownload">
                                    <source src="{{ asset('files_materibootcamps/' . $materibootcamp->file) }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>

                        <!-- Content Section -->
                        <div class="my-8">
                            <h3 class="text-2xl font-bold">{{ $materibootcamp->judul_file }}</h3>
                            <p class="text-sm text-gray-600 mt-4">{{ $materibootcamp->live_date }}</p>

                            <!-- Questions list -->
                            <div class="mt-4">
                                <ol class="list-decimal list-inside space-y-2 text-sm text-gray-700">
                                    <li>Penulisan huruf
                                        <ul class="list-disc list-inside ml-6">
                                            <li>Mencari penulisan huruf yang tepat di dalam judul</li>
                                            <li>Mencari penulisan huruf yang tepat pada sebuah frasa</li>
                                        </ul>
                                    </li>
                                    <li>Penulisan kata tidak baku</li>
                                    <li>Kata rujukan</li>
                                    <li>Kalimat efektif</li>
                                    <!-- Add more list items as needed -->
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-5/6 md:px-6 px-0 -mt-6">
                        <h3 class="font-bold my-4">Video Lainnya</h3>
                        <div class="overflow-y-auto lg:max-h-full" style="max-height: 400px;">
                            <style>
                                /* Hide scrollbar on larger screens */
                                @media (min-width: 1024px) {
                                    .overflow-y-auto::-webkit-scrollbar {
                                        display: none;
                                    }
                                    .overflow-y-auto {
                                        -ms-overflow-style: none; /* IE and Edge */
                                        scrollbar-width: none; /* Firefox */
                                    }
                                }
                            </style>
                            {{-- Daftar video yang akan ditampilkan --}}
                            @foreach ($allMateribootcamp as $materi)
                                @php
                                    // Mengonversi live_date menjadi objek Carbon untuk perbandingan
                                    $liveDate = \Carbon\Carbon::parse($materi->live_date);
                                @endphp
                    
                                @if ($liveDate <= now())
                                    <form id="progress-form{{ $loop->index }}" action="{{ route('watch.materi') }}" method="POST">
                                        @csrf
                                        <div class="flex items-start w-full my-4 p-4 border border-gray-300 rounded-lg bg-white shadow-md">
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('progress-form{{ $loop->index }}').submit();"
                                                class="flex gap-4 items-center w-full">
                                                @if ($materi->bootcamp && $materi->bootcamp->thumbnail)
                                                    <!-- Thumbnail bootcamp -->
                                                    <img src="{{ asset('thumbnail_bootcamp/' . $materi->bootcamp->thumbnail) }}"
                                                        class="w-32 h-32 rounded-lg object-cover">
                                                @else
                                                    <!-- Default image -->
                                                    <img src="{{ asset('thumbnail_bootcamp/default-thumbnail.png') }}" class="w-32 h-32 rounded-lg object-cover">
                                                @endif
                                                <div class="flex flex-col justify-between w-full">
                                                    <h3 class="font-semibold text-lg">{{ $materi->judul_file }}</h3>
                                                    <input type="hidden" name="id_materi_bootcamp" value="{{ $materi->id_materi_bootcamp }}">
                                                    <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($materi->live_date)->format('d F Y, H:i') }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                        </div>
                        <div class="flex justify-end mt-14">
                            <button onclick="window.location.href='/bootcamp/digital-marketing/{{ $materibootcamp->id_bootcamp }}'"
                                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                <span
                                    class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                    Kembali Ke Bootcamp
                                </span>
                            </button>
                        </div>
                    </div>


            </div>

        </div>
    </section>
@endsection
