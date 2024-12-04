@extends('./myskill/layouts.main')
@section('container')

<div>
    <div class="flex flex-col p-2 py-6 m-h-screen">
        <div class="bg-white items-center justify-between w-full flex rounded-full shadow-lg p-2 mb-5 sticky" style="top: 5px; position: relative;">
            <!-- Placeholder #PD -->
            <div class="absolute font-bold uppercase text-gray-700 left-4 top-1/2 transform -translate-y-1/2 pointer-events-none mx-4 lg:text-md text-sm">
                #PD
            </div>
            <!-- Input field -->
            <input id="search-input" 
                class="font-bold uppercase rounded-full w-full py-4 pl-16 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline lg:text-md text-sm" 
                type="number" 
                placeholder="Enter Credential Number"
                onkeypress="checkEnter(event)">

            <div class="bg-gray-600 p-2 hover:bg-blue-400 cursor-pointer mx-2 rounded-full" onclick="handleSearch()">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="flex flex-col gap-4 lg:p-4 p-2 rounded-lg m-2">
            <div class="lg:text-2xl md:text-xl text-lg lg:p-3 p-1 font-black text-gray-700">Cari sertifikat anda</div>
            
            <!-- Tampilkan pesan jika pencarian belum dilakukan -->
            <div id="no-search-message" class="text-gray-500 text-center mb-4">
                Silahkan search sertifikat anda sesuai dengan no credentials.
            </div>

            <!-- Bagian untuk menampilkan hasil pencarian -->
            <div id="search-results" class="text-start ml-4" style="min-height: 100px; display: none;">
                <div class="flex justify-start mb-8">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden w-full relative mr-5">
                        <div class="p-6 flex items-start max-sm:flex-col">
                            <img id="user-photo" src="" 
                                alt="Bootcamp Thumbnail" 
                                class="w-36 h-36 object-cover mr-4 my-14 rounded-lg">
                        
                            <div class="flex-1">
                                <!-- No Credential yang akan diupdate oleh JavaScript -->
                                <div class="text-xs text-gray-500 font-semibold absolute top-4 right-4" id="credential-number">
                                    No Credentials: 
                                </div>
                        
                                <!-- Judul Bootcamp yang akan diupdate oleh JavaScript -->
                                <div class="mt-12 max-sm:-mt-12">
                                    <h2 class="text-xl font-semibold text-gray-800" id="bootcamp-title">
                                        <i class='bx bxs-badge-check' style='color:#406ef7'></i>
                                    </h2>
                                    
                                    <h2 class="text-md font-semibold text-gray-800" id="pemilik"></h2>
                                    
                                    <h5 class="text-sm font-semibold text-gray-800 mt-5" id="ucapan-selamat"></h5>
                                    <a id="bootcamp-link" 
                                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 my-4">
                                        <span
                                            class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                            Lihat Bootcamp
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Function to detect Enter key press and trigger search
function checkEnter(event) {
    if (event.key === 'Enter') {
        handleSearch();
    }
}

// Fungsi untuk menangani pencarian
function handleSearch() {
    const input = document.getElementById('search-input');
    const inputValue = input.value.trim(); // Pastikan hanya nomor yang diambil, tanpa prefix #PD
    const noSearchMessage = document.getElementById('no-search-message');
    const searchResults = document.getElementById('search-results');
    const credentialNumber = document.getElementById('credential-number');
    const bootcampTitle = document.getElementById('bootcamp-title');
    const userPhoto = document.getElementById('user-photo');
    const pemilik = document.getElementById('pemilik');
    const ucapanSelamat = document.getElementById('ucapan-selamat');
    const bootcampLink = document.getElementById('bootcamp-link'); // Ambil elemen link

    // Lakukan permintaan ke backend untuk mencari sertifikat tanpa menambah prefix
    fetch(`/search-sertifikat/${inputValue}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                noSearchMessage.style.display = 'none';
                searchResults.style.display = 'block';
                credentialNumber.innerText = `No Credentials: #PD${inputValue}`;
                bootcampTitle.innerText = data.judul_bootcamp;
                userPhoto.src = data.foto_user;
                ucapanSelamat.innerText = data.ucapan_selamat;
                pemilik.innerText = data.pemilik;

                // Mengambil id_bootcamp dari data
                const idBootcamp = data.id_bootcamp; // Ambil id_bootcamp
                bootcampLink.href = `/bootcamp/digital-marketing/${idBootcamp}`; // Set href untuk link bootcamp
            } else {
                noSearchMessage.innerText = 'Sertifikat dengan No Credentials tersebut tidak ditemukan.';
                noSearchMessage.style.display = 'block';
                searchResults.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

</script>

@endsection