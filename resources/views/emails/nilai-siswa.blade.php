<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hasil Studi Siswa</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h2>Hasil Studi Siswa</h2>

    <p>Kepada Orang Tua/Wali Siswa,</p>
    <p>Berikut adalah hasil studi dari siswa yang bersangkutan:</p>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Nama Siswa</th>
            <td style="padding: 8px;">{{ $nilai->siswa->name }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">NISN</th>
            <td style="padding: 8px;">{{ $nilai->nisn }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Kelas</th>
            <td style="padding: 8px;">{{ $nilai->kelas->kelas }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">Mata Pelajaran</th>
            <td style="padding: 8px;">{{ $nilai->mapel->name_mapel }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 8px; background-color: #f2f2f2;">KIKD</th>
            <td style="padding: 8px;">{{ $nilai->mapel->kikd_mapel }}</td>
        </tr>
    </table>

    <h3>Rincian Nilai</h3>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 8px; text-align: left;">Jenis Nilai</th>
                <th style="padding: 8px; text-align: left;">Nilai</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 8px;">Nilai Tugas 1</td>
                <td style="padding: 8px;">{{ $nilai->nilai_tugas1 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai Tugas 2</td>
                <td style="padding: 8px;">{{ $nilai->nilai_tugas2 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai Tugas 3</td>
                <td style="padding: 8px;">{{ $nilai->nilai_tugas3 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai Tugas 4</td>
                <td style="padding: 8px;">{{ $nilai->nilai_tugas4 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai Tugas 5</td>
                <td style="padding: 8px;">{{ $nilai->nilai_tugas5 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UH 1</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uh1 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UH 2</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uh2 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UH 3</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uh3 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UH 4</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uh4 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UH 5</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uh5 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UTS</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uts }}</td>
            </tr>
            <tr>
                <td style="padding: 8px;">Nilai UAS</td>
                <td style="padding: 8px;">{{ $nilai->nilai_uas }}</td>
            </tr>
        </tbody>
    </table>

    <p>Terima kasih atas perhatian Anda.</p>

    <p>Hormat kami,</p>
    <p>Manajemen Sekolah</p>

</body>
</html>
