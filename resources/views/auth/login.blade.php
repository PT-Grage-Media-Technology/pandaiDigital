<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <title>Login | Pandai Digital</title>

    <link rel="stylesheet" href="https://rawcdn.githack.com/ArvinoDel/myskillokodinas/1b91e323bc712ff7475df2def625938c0d2cfe3b/resources/css/appskill.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
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
    <div class="flex w-full mt-20 mx-auto overflow-hidden bg-white rounded-lg lg:max-w-4xl">
        <div class="hidden lg:flex ms-10 lg:w-1/2 items-center justify-center image-container">
            <img loading="lazy" class="w-full h-full object-contain" src="{{ asset('assets/login.svg') }}">
        </div>
        <div class="w-full px-6 py-8 md:mx-24 lg:w-1/2">
            <p class="mt-3 text-xl text-start text-gray-900 font-bold :text-gray-200">
                Masuk ke Pandai Digital
            </p>

            <p class="mt-1 text-sm text-start text-gray-600 :text-gray-200">
                Silahkan Masukkan Informasi Akun Kamu
            </p>

            <p class="mt-6 text-md text-start text-gray-900 :text-gray-200">
                Belum memiliki akun? <a href="/register"
                    class="bg-clip-text text-transparent bg-gradient-to-r from-orange-500 to-pink-500">Daftar
                    Sekarang</a>
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-6">
                    <label class="block mb-2 text-sm font-medium text-gray-600" for="LoggingEmailAddress">Username</label>
                    <input id="LoggingEmailAddress" name="username"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="text" />
                </div>

                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block mb-2 text-sm font-medium text-gray-600" for="loggingPassword">Password</label>
                    </div>

                    <input id="loggingPassword" name="password"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" />
                </div>

                <div class="mt-5 inline-flex items-center">
                    <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="check">
                        <input type="checkbox" name="remember"
                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10"
                            id="check" />
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
                    <label class="mt-px text-sm font-light text-gray-700 cursor-pointer select-none" htmlFor="check">
                        Ingat Saya
                    </label>
                    <a href="{{ route('password.request') }}" class="ml-20 text-xs hover:underline">Forgot Password?</a>
                </div>

                <div class="mt-1">
                    <button
                        class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gradient-to-r from-pink-400 to-orange-400 rounded-lg hover:from-pink-500 hover:to-orange-500 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>

        </div>
    </div>

     @if (session('status') === 'login-success')
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil',
                text: 'Selamat datang kembali!',
                confirmButtonText: 'Lanjutkan'
            }).then(() => {
                window.location.href = '{{ route("dashboard") }}';
            });
        </script>
    @elseif (session('status') === 'login-failed')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Username atau password salah. Silakan coba lagi.',
                confirmButtonText: 'Coba Lagi'
            });
        </script>
    @endif

    @endif
</body>

</html>
