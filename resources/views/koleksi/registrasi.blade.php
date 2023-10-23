<!--NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 -->
<x-guest-layout>
    <form method="POST" action="{{ route('koleksiStore') }}">
        @csrf
        <!-- Nama Koleksi -->
        <div class="mt-4">
            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi"
                :value="old('namaKoleksi')" required autofocus />
            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label :value="__('Jenis Koleksi')" for="jenisKoleksi" />
            <select name="jenisKoleksi" class="form-select" required>
                <option value="1" {{ old('jenisKoleksi') === '1' ? 'selected' : '' }}>Buku</option>
                <option value="2" {{ old('jenisKoleksi') === '2' ? 'selected' : '' }}>Majalah</option>
                <option value="3" {{ old('jenisKoleksi') === '3' ? 'selected' : '' }}>Cakram Digital</option>
            </select>
            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
        </div>

        <!-- Jumlah Koleksi -->
        <div class="mt-4">
            <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
            <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="number" name="jumlahKoleksi"
                :value="old('jumlahKoleksi')" required autofocus />
            <x-input-error :messages="$errors->get('jumlahKoleksi')" class="mt-2" />
        </div>

        <!-- Nama Pengarang -->
        <div class="mt-4">
            <x-input-label for="namaPengarang" :value="__('Nama Pengarang')" />
            <x-text-input id="namaPengarang" class="block mt-1 w-full" type="text" name="namaPengarang"
                :value="old('namaPengarang')" required autocomplete="namaPengarang" />
            <x-input-error :messages="$errors->get('namaPengarang')" class="mt-2" />
        </div>

        <!-- Tahun Terbit -->
        <div class="mt-4">
            <x-input-label for="tahunTerbit" :value="__('Tahun Terbit')" />
            <x-text-input id="tahunTerbit" class="block mt-1 w-full" type="number" name="tahunTerbit"
                :value="old('tahunTerbit')" required autofocus />
            <x-input-error :messages="$errors->get('tahunTerbit')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- button reset -->
            <x-primary-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4 ml-4x"
                type="reset">
                Reset
            </x-primary-button>
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>