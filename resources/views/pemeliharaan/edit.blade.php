<x-app-layout>
    <div class="py-10">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

            <h2 class="text-lg font-semibold mb-4">Edit Pemeliharaan</h2>

            <form action="{{ route('pemeliharaan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="alat" value="{{ $data->alat }}" class="w-full border p-2 mb-2 rounded">
                <input type="text" name="sn" value="{{ $data->sn }}" class="w-full border p-2 mb-2 rounded">
                <input type="text" name="ruang" value="{{ $data->ruang }}" class="w-full border p-2 mb-2 rounded">
                <input type="text" name="type" value="{{ $data->type }}" class="w-full border p-2 mb-2 rounded">

                <div class="flex justify-end gap-2">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>