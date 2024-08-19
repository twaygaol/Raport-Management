<x-filament::page>
    <form wire:submit.prevent="submit" class="gap-6">
        {{ $this->form }}

        <x-filament::button type="submit" style="margin-top:15px;" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <!-- Print Icon (inline SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.5-1.5M9 17H4l1.5-1.5m0-6.5L5 4h14l-1.5 1.5m-5 5V9h4v2h-4zm0 4v-2h4v2h-4z" />
                </svg>
                Cetak Nilai PDF
            </span>
            <span wire:loading>
                <!-- Loading Spinner Icon (inline SVG) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v4M12 20v-4M4 12h4M16 12h4M7 7l2.828 2.828M16.97 16.97L19.798 19.798M7 17l2.828-2.828M16.97 7.03L19.798 4.2M12 4a8 8 0 100 16 8 8 0 000-16z" />
                </svg>
                Processing...
            </span>
        </x-filament::button>
    </form>
</x-filament::page>
