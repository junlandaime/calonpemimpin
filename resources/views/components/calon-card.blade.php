@props(['calon'])

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
    <div class="relative pb-48 overflow-hidden">
        <img class="absolute inset-0 h-full w-full object-cover"
            src="{{ $calon->foto_profil ? asset('storage/' . $calon->foto_profil) : asset('images/default-profile.jpg') }}"
            alt="{{ $calon->nama }}">
        <div class="absolute bottom-0 left-0 bg-[#90EE90] text-hitam px-2 py-1 text-sm font-semibold">
            {{ $calon->jabatan }}
        </div>
    </div>
    <div class="p-4">
        <h2 class="mt-2 mb-2 font-bold text-xl">{{ $calon->nama }}</h2>
        <p class="text-sm text-gray-600 mb-2">{{ $calon->partai }}</p>
        <p class="text-sm text-gray-800 mb-4">{{ Str::limit($calon->visi, 100) }}</p>
        <div class="mt-4 flex items-center text-sm text-gray-600">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            {{ $calon->daerah->nama }}
        </div>
    </div>
    <div class="p-4 border-t border-gray-200 bg-gray-50">
        <a href="{{ route('profil-singkat', $calon->id) }}"
            class="text-[#90EE90] hover:text-green-700 font-semibold text-sm">
            Lihat Profil Singkat
        </a>
        <a href="{{ route('profil-lengkap', $calon->id) }}"
            class="float-right text-[#90EE90] hover:text-green-700 font-semibold text-sm">
            Profil Lengkap &rarr;
        </a>
    </div>
</div>
