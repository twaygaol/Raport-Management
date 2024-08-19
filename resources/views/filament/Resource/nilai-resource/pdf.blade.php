<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Nilai Siswa</h1>
    <h2>{{ $siswa->nama }} - Kelas: {{ $kelas->nama }}</h2>

    <table>
        <thead>
            <tr>
                <th>Mapel</th>
                <th>Nilai Tugas 1</th>
                <th>Nilai Tugas 2</th>
                <th>Nilai Tugas 3</th>
                <th>Nilai Tugas 4</th>
                <th>Nilai Tugas 5</th>
                <th>Nilai UH 1</th>
                <th>Nilai UH 2</th>
                <th>Nilai UH 3</th>
                <th>Nilai UH 4</th>
                <th>Nilai UH 5</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>KIKD</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $mapel->name_mapel }}</td>
                <td>{{ $nilai->nilai_tugas1 }}</td>
                <td>{{ $nilai->nilai_tugas2 }}</td>
                <td>{{ $nilai->nilai_tugas3 }}</td>
                <td>{{ $nilai->nilai_tugas4 }}</td>
                <td>{{ $nilai->nilai_tugas5 }}</td>
                <td>{{ $nilai->nilai_uh1 }}</td>
                <td>{{ $nilai->nilai_uh2 }}</td>
                <td>{{ $nilai->nilai_uh3 }}</td>
                <td>{{ $nilai->nilai_uh4 }}</td>
                <td>{{ $nilai->nilai_uh5 }}</td>
                <td>{{ $nilai->nilai_uts }}</td>
                <td>{{ $nilai->nilai_uas }}</td>
                <td>{{ $mapel->kikd_mapel }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
