<x-filament::page>
    <div class="p-6 bg-white shadow-md rounded-lg">
        @if($isEditing)
            <!-- Form to edit the profile -->
            <form wire:submit.prevent="submit" class="space-y-6">
                {{ $this->form }}

                <div class="flex items-center justify-between">
                    <x-filament::button type="submit" wire:loading.attr="disabled" class="bg-blue-500 hover:bg-blue-600 text-white">
                        <span wire:loading.remove>
                            <!-- Print Icon (inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.5-1.5M9 17H4l1.5-1.5m0-6.5L5 4h14l-1.5 1.5m-5 5V9h4v2h-4zm0 4v-2h4v2h-4z" />
                            </svg>
                            Simpan
                        </span>
                        <span wire:loading>
                            <!-- Loading Spinner Icon (inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v4M12 20v-4M4 12h4M16 12h4M7 7l2.828 2.828M16.97 16.97L19.798 19.798M7 17l2.828-2.828M16.97 7.03L19.798 4.2M12 4a8 8 0 100 16 8 8 0 000-16z" />
                            </svg>
                            Memproses...
                        </span>
                    </x-filament::button>

                    <x-filament::button type="button" wire:click="$set('isEditing', false)" class="bg-gray-500 hover:bg-gray-600 text-white">
                        Batal
                    </x-filament::button>
                </div>
            </form>
        @else
            <!-- Display the profile information -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold">Profil Siswa</h2>
                <p><strong>NAMA:</strong> {{ $siswa->name ?? 'N/A' }}</p>
                <p><strong>NISN:</strong> {{ $siswa->nisn ?? 'N/A' }}</p>
                <p><strong>NIK:</strong> {{ $siswa->nik ?? 'N/A' }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $siswa->tmp_lhr ?? 'N/A' }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $siswa->tgl_lhr ?? 'N/A' }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $siswa->jk ?? 'N/A' }}</p>
                <p><strong>Hobi:</strong> {{ $siswa->hobi ?? 'N/A' }}</p>
                <p><strong>Cita-cita:</strong> {{ $siswa->cita_cita ?? 'N/A' }}</p>
                <p><strong>Status Anak:</strong> {{ $siswa->sts_anak ?? 'N/A' }}</p>
                <p><strong>Jumlah Saudara:</strong> {{ $siswa->jml_saudara ?? 'N/A' }}</p>
                <p><strong>Anak Ke:</strong> {{ $siswa->anak_ke ?? 'N/A' }}</p>
                <p><strong>Nama Ibu:</strong> {{ $siswa->nama_ibu ?? 'N/A' }}</p>
                <p><strong>Pekerjaan Ibu:</strong> {{ $siswa->pekerjaan_ibu ?? 'N/A' }}</p>
                <p><strong>Nama Ayah:</strong> {{ $siswa->nama_ayah ?? 'N/A' }}</p>
                <p><strong>Pekerjaan Ayah:</strong> {{ $siswa->pekerjaan_ayah ?? 'N/A' }}</p>
                <p><strong>Nama Wali:</strong> {{ $siswa->nama_wali ?? 'N/A' }}</p>
                <p><strong>Pekerjaan Wali:</strong> {{ $siswa->pekerjaan_wali ?? 'N/A' }}</p>

                <x-filament::button wire:click="startEditing" class="bg-blue-500 hover:bg-blue-600 text-white">
                    Edit Profil
                </x-filament::button>
            </div>
        @endif
    </div>
</x-filament::page>
