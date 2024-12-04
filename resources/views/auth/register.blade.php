<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up | Pandai Digital</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/ArvinoDel/myskillokodinas/1b91e323bc712ff7475df2def625938c0d2cfe3b/resources/css/appskill.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan SweetAlert2 -->
</head>

<body>
    @if(Auth::check())
     <script>
         window.onload = function() {
    // Redirect to the previous page
    if (document.referrer) {
        window.location.href = document.referrer;
    } else {
        // Fallback URL in case there is no referrer
        window.location.href = "/home"; // Ganti dengan URL default Anda
    }
};
        </script>
    
    @else
    <div class="flex w-full mt-5 mx-auto overflow-hidden bg-white rounded-lg lg:max-w-4xl">
        <div class="hidden lg:flex ms-10 lg:w-1/2 items-center justify-center image-container">
            <img loading="lazy" class="w-full h-full object-contain" src="{{ asset('assets/regis.svg') }}">
        </div>
        <div class="w-full me-16 py-8 lg:w-1/2 max-sm:justify-center ml-6" x-data="passwordValidation()">
            <p class="mt-3 text-xl text-start text-gray-900 font-bold :text-gray-200">
                Buat Akun Pandai Digital
            </p>
            <p class="mt-1 text-sm text-start text-gray-600 :text-gray-200">
                Silahkan Isi Form Berikut Untuk Melanjutkan
            </p>
            <p class="mt-5 text-md text-start text-gray-900 :text-gray-200">
                Sudah memiliki akun? <a href="/login"
                    class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-pink-500">Masuk</a>
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mt-3">
                    <label class="block mb-2 text-sm font-medium text-gray-600 :text-gray-200"
                        for="LoggingEmailAddress">Nama Lengkap</label>
                    <input id="loggingPassword" name="nama_lengkap"
                        class="block w-full px-auto py-2 text-gray-700 bg-white border rounded-lg  :text-gray-300 focus:border-blue-400 focus:ring-opacity-40 :focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                        type="text" required />
                </div>
                <div class="mt-3">
                    <label class="block mb-2 text-sm font-medium text-gray-600 :text-gray-200"
                        for="LoggingEmailAddress">Username</label>
                    <input id="loggingPassword" name="username"
                        class="block w-full px-auto py-2 text-gray-700 bg-white border rounded-lg :text-gray-300 focus:border-blue-400 focus:ring-opacity-40 :focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                        type="text" required />
                </div>
                <div class="mt-3">
                    <label class="block mb-2 text-sm font-medium text-gray-600 :text-gray-200"
                        for="LoggingEmailAddress">Email Address</label>
                    <input id="LoggingEmailAddress" name="email"
                        class="block w-full px-auto py-2 text-gray-700 bg-white border rounded-lg :text-gray-300 focus:border-blue-400 focus:ring-opacity-40 :focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                        type="email" required />
                </div>

                <div class="mt-3">
                    <div class="flex justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-600 :text-gray-200"
                            for="loggingPassword">Password</label>
                    </div>
                    <input id="loggingPassword" name="password" x-model="password"
                        class="block w-full px-3 py-2 text-gray-700 bg-white border rounded-lg :text-gray-300 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" required />
                    <p x-show="!isPasswordValid" class="mt-2 text-sm text-red-600">Password harus minimal 8 karakter dan
                        mengandung simbol khusus (@, #, $, dll)</p>
                    <p x-show="isPasswordValid" class="mt-2 text-sm text-green-600">Password sesuai!</p>
                </div>

                <div class="mt-3">
                    <div class="flex justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-600 :text-gray-200"
                            for="confirmPassword">Confirm Password</label>
                    </div>
                    <input id="confirmPassword" name="password_confirmation" x-model="confirmPassword"
                        class="block w-full px-3 py-2 text-gray-700 bg-white border rounded-lg :text-gray-300 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" required />

                    <!-- Teks hanya muncul jika password tidak kosong -->
                    <p x-show="!isPasswordEmpty && !arePasswordsMatching" class="mt-2 text-sm text-red-600">Password
                        tidak cocok</p>
                    <p x-show="!isPasswordEmpty && arePasswordsMatching" class="mt-2 text-sm text-green-600">Password
                        cocok!</p>
                </div>

                <div class="mt-5 inline-flex items-center">
                    <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check">
                        <input type="checkbox"
                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                            id="check" required />
                        <span
                            class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                fill="currentColor" stroke="currentColor" stroke-width="1">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </label>
                    <label class="mt-px text-xs font-light text-gray-700 cursor-pointer select-none" htmlFor="check">
                        Saya bersedia menerima update informasi dari Pandai Digital
                    </label>
                </div>

                <div class="mt-1 max-sm:ml-8">
                    <button
                        class="w-full   px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gradient-to-r from-pink-400 to-orange-400 rounded-lg hover:from-pink-500 hover:to-orange-500 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>

                <label class=" max-sm:ml-8 mt-3 text-sm font-light text-gray-900 text-center block" htmlFor="check">
                    Dengan membuat akun, saya setuju dengan
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-pink-500">
                        Syarat dan Ketentuan
                    </span>
                    , dan
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-pink-500">
                        Ketentuan Privasi Pandai Digital
                    </span>
                </label>

            </form>
        </div>
    </div>

    <script>
        function passwordValidation() {
            return {
                password: '',
                confirmPassword: '',
                get isPasswordValid() {
                    return /^(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/.test(this.password);
                },
                get arePasswordsMatching() {
                    return this.password === this.confirmPassword;
                },
                get isPasswordEmpty() {
                    return this.password === '';
                }
            };
        }

        // Menampilkan SweetAlert jika ada error atau status
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}',
            });
        @endif

        @if (session('status'))
            // Menampilkan SweetAlert loading sebelum menampilkan pesan sukses
            Swal.fire({
                title: 'Loading...',
                text: 'Sedang memproses...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            // Delay untuk menampilkan pesan sukses
            setTimeout(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                });
            }, 1500); // Ganti 1500 dengan waktu delay yang diinginkan (dalam milidetik)
        @endif
    </script>
    @endif

</body>

</html>