<!-- NAMA : LESTARI
KELAS: D3IF 46-03
NIM  : 6706223114 -->
<x-guest-layout>
    <form method="POST" action="{{ route('transaksiStore') }}">
        @csrf
        <!-- Peminjam -->
        <div class="mt-4">
            <x-input-label for="idPeminjam" :value="__('Peminjam')" />
            <select name="idPeminjam" id="idPeminjam" class="block mt-1 w-full form-select">
                <option value="-1">Pilih Dahulu</option>
                @foreach($users as $user)
                @if($user->id == old('idPeminjam'))
                <option value="{{ $user->id }}" selected>{{ $user->fullname }}</option>
                @elseif($user->id != auth()->user()->id)
                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                @endif
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
        </div>

        <!-- Koleksi -->
        <div class="mt-4">
            <x-input-label for="idKoleksi" :value="__('Koleksi')" />
            <select name="idKoleksi" id="idKoleksi" class="block mt-1 w-full form-select">
                <option value="-1">Pilih Dahulu</option>
                @foreach($collections as $collection)
                <option value="{{ $collection->id }}" @if($collection->id == old('idKoleksi')) selected
                    @endif>{{ $collection->namaKoleksi }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('idKoleksi')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- button reset -->
            <x-primary-button class="bg-red-500 hover-bg-red-700 text-white font-bold py-2 px-4 rounded ml-4 ml-4x"
                type="reset">
                Reset
            </x-primary-button>
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>