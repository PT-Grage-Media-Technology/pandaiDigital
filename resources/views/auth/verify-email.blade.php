<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, please verify your email by clicking on the link we just emailed to you. If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    <div class="container">
        <div class="alert alert-info">
            {{ __('Silakan verifikasi email Anda. Periksa email Anda dan klik tautan verifikasi.') }}
        </div>
        <div id="thank-you-message" style="display: none;">
            {{ __('Terima kasih, email Anda telah diverifikasi! Anda akan segera diarahkan ke login.') }}
        </div>
        <div id="not-verified-message" style="display: none;">
            {{ __('Email Anda belum diverifikasi. Silakan verifikasi untuk mengakses dashboard.') }}
        </div>
    </div>

    <!-- JavaScript for Auto-Checking Verification Status -->
    <script>
        setInterval(() => {
            fetch('{{ route('email.check-verification') }}') // Menggunakan route name
                .then(response => response.json())
                .then(data => {
                    if (data.verified) {
                        document.getElementById('thank-you-message').style.display = 'block';
                        setTimeout(() => {
                            window.location.href = "{{ route('login') }}"; // Mengarahkan ke login setelah 2 detik
                        }, 2000);
                    } else {
                        document.getElementById('not-verified-message').style.display = 'block'; // Tampilkan pesan jika belum diverifikasi
                    }
                })
                .catch(error => console.error('Error:', error)); // Penanganan kesalahan
        }, 5000); // Cek setiap 5 detik
    </script>
</x-guest-layout>
