<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard SIMALKES
            </h2>

            <button onclick="openModal()" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                + Tambah
            </button>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Card -->
            <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4">Data Pemeliharaan</h3>
            <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
                <div class="flex gap-2">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}"
                        onkeyup="this.form.submit()"
                        placeholder="Cari alat, SN, ruang, teknisi..."
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400"
                    >

                    <button 
                        type="submit"
                        class="bg-blue-600 text-white px-4 rounded-lg hover:bg-blue-700">
                        🔍
                    </button>

                    @if(request('search'))
                        <a href="{{ route('dashboard') }}" 
                            class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
            @if($data->isEmpty())
                <p class="text-gray-500">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach ($data as $item)
                        <div class="border rounded-lg p-4 hover:shadow transition">
                            
                            <div class="flex justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        {{ $item->alat ?? '-' }}
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        SN: {{ $item->sn ?? '-' }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Type: {{ $item->type ?? '-' }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Ruang: {{ $item->ruang ?? '-' }}
                                    </p>
                                </div>
                            </div>

                            <!-- QR CODE -->
                            <div class="mt-4">
                              <center><p><b>{{ $item->alat ?? '-' }}</b></p></center>
                              <center>{!! QrCode::size(120)->generate(
                                  "Link: " . url('/pemeliharaan/' . $item->id)
                              ) !!}</center>
                              <center><p><b>{{ $item->sn ?? '-' }}</b></p></center>
                            </div>

                            <div class="mt-4 flex justify-end">
                            <!-- Tombol Edit -->
                                <a href="{{ route('pemeliharaan.edit', $item->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm">
                                    ✏️ Edit
                                </a>
                            </div>

                            <!-- PRINT -->
                            <div class="mt-4 flex justify-end">
                                <a href="{{ route('pemeliharaan.print', $item->id) }}" target="_blank"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-sm">
                                    🖨️ Print
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50">
        
        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 animate-fadeIn">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Tambah Pemeliharaan</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-black text-xl">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('pemeliharaan.store') }}" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="alat" placeholder="Nama Alat"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400">

                <input type="text" name="sn" placeholder="Serial Number"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400">
                
                <input type="text" name="type" placeholder="Type"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400">

                <input type="text" name="ruang" placeholder="Ruangan"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-blue-400">

                <!-- Action -->
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal()" 
                        class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Batal
                    </button>

                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

    <!-- Script -->
    <script>
        function openModal() {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    <!-- Animation -->
    <style>
        .animate-fadeIn {
            animation: fadeIn 0.2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>

</x-app-layout>