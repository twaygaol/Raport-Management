<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        
        <!-- Data Siswa -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Data Siswa</h2>
            @if ($dataSiswa->isNotEmpty())
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Nama</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSiswa as $siswa)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $siswa->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $siswa->nama }}</td>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data siswa.</p>
            @endif
        </div>

        <!-- Data Guru -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Data Guru</h2>
            @if ($dataGuru->isNotEmpty())
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Nama</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataGuru as $guru)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $guru->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $guru->nama }}</td>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data guru.</p>
            @endif
        </div>

        <!-- Data Wali Kelas -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Data Wali Kelas</h2>
            @if ($dataWaliKelas->isNotEmpty())
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 p-2">ID</th>
                            <th class="border border-gray-300 p-2">Nama</th>
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataWaliKelas as $waliKelas)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $waliKelas->id }}</td>
                                <td class="border border-gray-300 p-2">{{ $waliKelas->nama }}</td>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Tidak ada data wali kelas.</p>
            @endif
        </div>
    </div>
</body>
</html>
