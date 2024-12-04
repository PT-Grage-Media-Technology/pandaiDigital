@extends('./myskill/layouts.main')
@section('container')

<div class="bg-white text-black p-6 w-screen">
    <div class="mx-auto">
        <h1 class="text-4xl font-bold mb-4">TENTANG PANDAI DIGITAL</h1>
        <p class="text-xl mb-6">
            Pandai Digital adalah platform pengembangan skill profesional dengan lebih dari 1 juta pengguna
            se-Indonesia. Pandai Digital percaya bahwa:
        </p>
        <blockquote class="text-orange-500 font-bold text-2xl mb-8">
            "PENDIDIKAN DAN PEKERJAAN YANG LAYAK ADALAH HAK BAGI SETIAP RAKYAT INDONESIA."
        </blockquote>
        <blockquote class="text-lg font-semibold mb-2 text-center sm:break-words md:break-words">Pandai Digital telah menjadi bagian dari</blockquote>

        <div class="overflow-x-hidden w-screen">
            <div class="flex flex-wrap gap-4 mb-10 w-screen">
                <div class="flex-1 ">
                    <div class="flex gap-4 items-center justify-center">
                        <img src="{{ asset('./foto_metode/startup.svg') }}" alt="Startup Studio"
                            class="lg:w-40 max-sm:w-16 md:w-30  rounded-lg object-cover lg:p-6">
                        <img src="{{ asset('./foto_metode/techinasia.svg') }}" alt="TECHINASIA"
                            class="lg:w-40 max-sm:w-16 md:w-30 rounded-lg object-cover lg:p-6">
                        <img src="{{ asset('./foto_metode/technode.svg') }}" alt="Technode global"
                            class="lg:w-40 max-sm:w-16 md:w-30 rounded-lg object-cover lg:p-6 max-sm:mr-8">
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection