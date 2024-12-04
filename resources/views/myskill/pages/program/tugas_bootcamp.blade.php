@extends('./myskill/layouts.main')
@section('container')
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">

            <!-- Header Section -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:pt-10">
                <div class="flex items-center space-x-4">
                    <div class="grid grid-flow-row items-center w-11/12 h-full">
                        <div>
                            @php
                                $fileExtension = pathinfo($tugasbootcamp->file, PATHINFO_EXTENSION);
                            @endphp
                            @if($fileExtension === 'pdf')
                                <iframe src="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" class="rounded-lg" width="700px" height="500px"></iframe>
                            @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" class="w-full rounded-lg" alt="Image">
                            @else
                                <video controls class="w-full rounded-lg" controlsList="nodownload">
                                    <source src="{{ asset('files_tugasbootcamps/' . $tugasbootcamp->file) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>

                        <!-- Content Section -->
                        <div class="my-8 flex justify-between">
                            <div class="grid grid-flow-row">
                                <h3 class="text-2xl font-bold">{{ $tugasbootcamp->judul_tugas }}</h3>
                                <h3 class="text-lg">{{ $tugasbootcamp->deskripsi }}</h3>
                            </div>
                            <div>
                                <button id="openModal" class="border-2 border-orange-400 px-4 py-2 rounded-lg">
                                    <i class="fa-solid fa-upload mr-2"></i>Kumpulkan Tugas
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-5/6 px-6 -mt-6">
                    <h3 class="font-bold my-4">Tugas Lainnya</h3>
                    <div class="overflow-y-auto" style="max-height: 400px;">
                        {{-- Daftar video yang akan ditampilkan --}}
                        @foreach($allTugasbootcamp as $tugas)
                            <div class="flex items-center w-full my-8">
                                <a href="/program/tugas_bootcamp?id={{ $tugas->id_tugas_bootcamp }}" class="grid grid-flow-col gap-2">
                                    @if($tugas->bootcamp && $tugas->bootcamp->thumbnail)
                                        <!-- Menampilkan thumbnail bootcamp -->
                                        <img src="{{ asset('thumbnail_bootcamp/' . $tugas->bootcamp->thumbnail) }}" class="w-40 rounded-lg">
                                    @else
                                        <!-- Default image jika thumbnail tidak ada -->
                                        <img src="{{ asset('thumbnail_bootcamp/default-thumbnail.png') }}" class="w-40 rounded-lg">
                                    @endif
                                    <div class="grid grid-flow-row">
                                        <h3 class="font-semibold text-md lg:truncate">{{ $tugas->judul_tugas }}</h3>
                                        <h3 class="text-md lg:truncate">{{ $tugas->created_at }}</h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Section -->
    <section id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
      <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center relative">
          <button id="closeModal" class="absolute top-0 right-0 my-0 p-4 text-gray-500 hover:text-gray-700 text-3xl font-bold">&times;</button>
        <div class="px-4 py-6">
        <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data" class="px-4 py-2">
        @csrf
            <input id="upload" name="file" type="file" class="hidden" accept="image/*,application/pdf,video/*" />
          <div id="image-preview" class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
            <label for="upload" class="cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
              </svg>
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Kirim File</h5>
              <p class="font-normal text-sm text-gray-400 md:px-6">Ukuran file harus kurang dari <b class="text-gray-600">20mb</b></p>
              <p class="font-normal text-sm text-gray-400 md:px-6">dan harus dalam format <b class="text-gray-600">JPG, PNG, PDF, MP4</b>.</p>
              <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
            </label>
          </div>
         
          
          <div class="mb-4">
            <textarea id="deskripsi" name="deskripsi" class="w-full border border-gray-300 p-2 rounded" rows="4"
                placeholder="Tambahkan komentar..."></textarea>
          </div>
          
          <input type="hidden" name="id_tugas" id="inputTugas" value='{{ $tugasbootcamp->id_tugas_bootcamp }}'>
          
          <div class="flex items-center justify-center">
            <div class="w-full">
              <label id="submitTask" class="w-full text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                    <button type="submit" class="text-center ml-2">Kirim</button>
              </label>
            </div>
          </div>
         </form>
        </div>
      </div>
    </section>


    <!-- JavaScript for Modal and Image Preview -->
    <script>
      const openModalBtn = document.getElementById('openModal');
      const closeModalBtn = document.getElementById('closeModal');
      const modal = document.getElementById('modal');
      const uploadInput = document.getElementById('upload');
      const filenameLabel = document.getElementById('filename');
      const imagePreview = document.getElementById('image-preview');
      let isEventListenerAdded = false;

      // Fungsi untuk membuka modal
      openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
      });

      // Fungsi untuk menutup modal
      closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
      });

      // Tutup modal jika klik di luar modal
      window.addEventListener('click', (event) => {
        if (event.target === modal) {
          modal.classList.add('hidden');
        }
      });

      // Fungsi untuk preview image
      uploadInput.addEventListener('change', (event) => {
        const file = event.target.files[0];

        if (file) {
          filenameLabel.textContent = file.name;

          const reader = new FileReader();
          reader.onload = (e) => {
            imagePreview.innerHTML =
              `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
            imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

            // Tambahkan event listener untuk klik pada preview gambar (satu kali)
            if (!isEventListenerAdded) {
              imagePreview.addEventListener('click', () => {
                uploadInput.click();
              });
              isEventListenerAdded = true;
            }
          };
          reader.readAsDataURL(file);
        } else {
          filenameLabel.textContent = '';
          imagePreview.innerHTML =
            `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
          imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

          // Hapus event listener saat tidak ada gambar
          imagePreview.removeEventListener('click', () => {
            uploadInput.click();
          });

          isEventListenerAdded = false;
        }
      });
      
      // Tambahkan SweetAlert
        const submitTaskBtn = document.getElementById('submitTask');
        submitTaskBtn.addEventListener('click', () => {
          Swal.fire({
            title: 'Tugas telah terkirim!',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              // Tutup modal setelah SweetAlert dikonfirmasi
              modal.classList.add('hidden');
            }
          });
        });

    </script>
@endsection
