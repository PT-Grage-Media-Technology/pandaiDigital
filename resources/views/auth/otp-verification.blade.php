<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan SweetAlert2 -->
</head>
<body>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-12">
        <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
            <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                    <div class="font-semibold text-3xl">
                        <p>Email Verification</p>
                    </div>
                    <div class="flex flex-row text-sm font-medium text-gray-400">
                        <p>We have sent a code to your email.</p>
                    </div>
                </div>

                <!-- Tampilkan pesan error jika ada -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Tampilkan pesan status jika ada -->
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <div>
                    <form action="{{ route('otp.validation') }}" method="POST" onsubmit="combineOTP()">
                        @csrf
                        <input type="hidden" name="otp_id" value="{{ $otp_id }}">
                        <input type="hidden" id="otp_code" name="otp_code" required>
                        
                        <div class="flex flex-col space-y-16">
                            <div class="flex flex-row items-center justify-between mx-auto w-screen max-w-xs">
                                <div class="w-16 h-16 mr-2">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code1" maxlength="1" oninput="moveToNextInput(this, 'code2')" >
                                </div>
                                <div class="w-16 h-16 mr-2">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code2" maxlength="1" oninput="moveToNextInput(this, 'code3')" >
                                </div>
                                <div class="w-16 h-16 mr-2">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code3" maxlength="1" oninput="moveToNextInput(this, 'code4')" >
                                </div>
                                <div class="w-16 h-16 mr-2">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code4" maxlength="1" oninput="moveToNextInput(this, 'code5')" >
                                </div>
                                <div class="w-16 h-16 mr-2">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code5" maxlength="1" oninput="moveToNextInput(this, 'code6')" >
                                </div>
                                <div class="w-16 h-16">
                                    <input class="otp-input w-full h-full text-center px-1 outline-none rounded-xl border border-gray-200 text-base bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" id="code6" maxlength="1" oninput="moveToNextInput(this)" >
                                </div>
                            </div>

                            <div class="flex flex-col space-y-5">
                                <div>
                                    <button type="submit" class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                                        Verify OTP Code
                                    </button>
                                </div>
                                <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                                    <p>Didn't receive code?</p>
                                    @if(true) <!-- Ubah 'true' dengan kondisi yang diperlukan -->
                                        <a id="countdown" class="flex flex-row items-center text-blue-600">2:00</a> <!-- Elemen untuk menampilkan countdown -->
                                        <script>
                                            // Mengatur waktu mulai countdown dalam detik (2 menit = 120 detik)
                                            let countdownTime = 180;
                                            // Fungsi untuk memperbarui countdown
                                            function startCountdown() {
                                                const countdownElement = document.getElementById("countdown");
                                                // Memulai interval setiap 1 detik
                                                const interval = setInterval(() => {
                                                    // Menghitung menit dan detik
                                                    const minutes = Math.floor(countdownTime / 60);
                                                    const seconds = countdownTime % 60;
                                                    // Memperbarui teks elemen countdown
                                                    countdownElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                                    // Mengurangi waktu
                                                    countdownTime--;
                                                    // Jika waktu habis, hentikan interval
                                                    if (countdownTime < 0) {
                                                        clearInterval(interval);
                                                        countdownElement.textContent = "Countdown selesai";
                                                    }
                                                }, 1000);
                                            }
                                            // Memulai countdown ketika halaman dimuat
                                            document.addEventListener("DOMContentLoaded", startCountdown);
                                        </script>
                                    @else
                                        <a href="#" class="flex flex-row items-center text-blue-600" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">Resend</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Formulir tersembunyi untuk mengirim ulang OTP -->
                    <form id="resend-form" method="POST" action="{{ route('otp.resend') }}" style="display: none;">
                        @csrf
                        <input type="hidden" name="otp_id" value="{{ $otp_id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function moveToNextInput(currentInput, nextInputId) {
            if (currentInput.value.length === currentInput.maxLength) {
                document.getElementById(nextInputId)?.focus();
            }
        }

        function combineOTP() {
            const otpCode = Array.from(document.querySelectorAll('.otp-input'))
                .map(input => input.value)
                .join('');
            document.getElementById('otp_code').value = otpCode;
        }

        // Menampilkan SweetAlert jika ada status
        @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('status') }}',
            });
        @endif
    </script>
</body>
</html>