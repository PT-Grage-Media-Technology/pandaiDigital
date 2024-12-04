document.querySelectorAll('#buttonContainer a').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();

        // Dapatkan ID target dari button yang diklik
        const targetId = this.getAttribute('data-target');
        const targetDiv = document.getElementById(targetId);

        // Periksa apakah konten yang diklik sudah terlihat
        const isCurrentlyVisible = !targetDiv.classList.contains('hidden');

        // Hapus styling dari semua button dan sembunyikan semua konten
        document.querySelectorAll('#buttonContainer a').forEach(btn => {
            btn.classList.remove('bg-gray-900', 'text-white', 'no-hover');
            btn.classList.add('bg-white', 'text-gray-800');
        });

        document.querySelectorAll('#buttonContainer ~ div').forEach(div => {
            div.classList.add('hidden');
        });

        // Jika konten yang diklik belum terlihat, tampilkan dan berikan styling
        if (!isCurrentlyVisible) {
            this.classList.add('bg-gray-900', 'text-white');
            this.classList.remove('bg-white', 'text-gray-800');
            this.classList.add('no-hover'); // Tambahkan kelas no-hover untuk menonaktifkan hover

            targetDiv.classList.remove('hidden');
        } else {
            this.classList.remove('no-hover'); // Hapus no-hover jika konten disembunyikan kembali
        }
    });
});


window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 0) {
        navbar.classList.add('glassmorphism');
        navbar.classList.remove('bg-orange-400');
    } else {
        navbar.classList.remove('glassmorphism');
        navbar.classList.add('bg-orange-400');
    }
});