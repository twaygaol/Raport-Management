<x-filament-panels::page>
    <div class="space-y-6 p-6 bg-gray-900 text-white">
        <h2 class="text-2xl font-semibold text-center rounded-xl inline-block p-2 text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">Silahkan Lihat Nilai Anda</h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Mata Pelajaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tugas 1
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tugas 2
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tugas 3
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tugas 4
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Tugas 5
                            </th>
                            <th scope="col" class="px-2 py-3">
                                UH 1
                            </th>
                            <th scope="col" class="px-2 py-3">
                                UH 2
                            </th>
                            <th scope="col" class="px-2 py-3">
                                UH 3
                            </th>
                            <th scope="col" class="px-2 py-3">
                                UH 4
                            </th>
                            <th scope="col" class="px-2 py-3">
                                UH 5
                            </th>
                            <th scope="col" class="px-2 py-3">
                                NIlai UTS
                            </th>
                            <th scope="col" class="px-2 py-3">
                                NIlai UAS
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($this->nilai as $n)
                        <tr class="bg-black border-b dark:bg-gray-800 dark:border-gray-700 border-b-gray-900 hover:bg-gray-50 text-center  dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $n->mapel->name_mapel }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $n->kelas->kelas }}
                            </th>
                            <td class="px-6 py-4">
                            {{ $n->nilai_tugas1 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_tugas2 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_tugas3 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_tugas4 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_tugas5 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uh1 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uh2 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uh3 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uh4 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uh5 }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uts }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $n->nilai_uas }}
                            </td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td colspan="16" class="py-3 px-4 text-center text-gray-500">
                                Tidak ada data nilai yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
</x-filament-panels::page>
