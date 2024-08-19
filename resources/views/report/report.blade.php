<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .page-break {
                page-break-after: always;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                text-align: center;
                padding: 5px;
            }
        </style>
        <title>Report Santri</title>
    </head>

    <body>
        <table>
            <tr>
                <td><img src="{!! public_path('build/assets/Logo Ar-rahmah.jpg') !!}" alt="" height="90px" width="90px"></td>
                <td style="align-content: center">
                    <p> SIPON Al-RAHMAH</p>
                    <p style="text-align: center">Jl Ciruas - Petir Lebakwangi - Walantaka Kota Serang -
                        Banten - Indonesia
                    </p>
                </td>
            </tr>
        </table>
        <h1 style="text-align: center">Laporan Hafalan</h1>
        <label for="">Nama : </label>
        <label for="">{{ $santri }}</label>
        <table>
            <tr>
                <td>NO</td>
                <td>SURAT</td>
                <td>TANGGAL TES</td>
                <td>NILAI KELANCARAN</td>
                <td>PRESTASI</td>
                <td>KETERANGAN</td>
            </tr>
            <tbody>
                @foreach ($hafalan as $key => $h)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $h->surat->name }}</td>
                        <td>{{ $h->tanggal }}</td>
                        <td>{{ $h->nilai }}</td>
                        <td>
                            @if ($h->nilai <= 60)
                                D
                            @elseif ($h->nilai > 60 && $h->nilai <= 75)
                                C
                            @elseif ($h->nilai > 75 && $h->nilai <= 90)
                                B
                            @elseif ($h->nilai > 90)
                                A
                            @endif
                        </td>
                        <td>
                            @if ($h->nilai < 60)
                                KURANG
                            @elseif ($h->nilai > 60 && $h->nilai <= 75)
                                CUKUP
                            @elseif ($h->nilai > 75 && $h->nilai <= 90)
                                BAIK
                            @elseif ($h->nilai >= 90)
                                SANGAT BAIK
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>
        <table>
            <tr>
                <td><img src="{!! public_path('build/assets/Logo Ar-rahmah.jpg') !!}" alt="" height="90px" width="90px"></td>
                <td style="align-content: center">
                    <p> SIPON Al-RAHMAH</p>
                    <p style="text-align: center">Jl Ciruas - Petir Lebakwangi - Walantaka Kota Serang -
                        Banten - Indonesia
                    </p>
                </td>
            </tr>
        </table>
        <h1 style="text-align: center">Laporan Pelanggaran</h1>
        <label for="">Nama : </label>
        <label for="">{{ $santri }}</label>
        <table>
            <tr>
                <td>NO</td>
                <td>PELANGGARAN</td>
                <td>SKOR PELANGGARAN</td>
                <td>KETERANGAN</td>
            </tr>
            <tbody>
                @foreach ($pelanggaran as $key => $h)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $h->pelanggaran->nama_pelanggaran }}</td>
                        <td>{{ $h->pelanggaran->skor_pelanggaran }}</td>
                        <td>{{ $h->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="page-break"></div>

        <table>
            <tr>
                <td><img src="{!! public_path('build/assets/Logo Ar-rahmah.jpg') !!}" alt="" height="90px" width="90px"></td>
                <td style="align-content: center">
                    <p> SIPON Al-RAHMAH</p>
                    <p style="text-align: center">Jl Ciruas - Petir Lebakwangi - Walantaka Kota Serang -
                        Banten - Indonesia
                    </p>
                </td>
            </tr>
        </table>
        <h1 style="text-align: center">Laporan Perilaku</h1>
        <label for="">Nama : </label>
        <label for="">{{ $santri }}</label>
        <table>
            <tr>
                <td>NO</td>
                <td>PERILAKU</td>
                <td>SKOR </td>
                <td>PRESTASI </td>
                <td>KETERANGAN</td>
            </tr>
            <tbody>
                @foreach ($perilaku as $key => $h)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $h['nama'] }}</td>
                        <td>{{ $h['nilai'] }}</td>
                        <td>
                            @if ($h['nilai'] <= 60)
                                D
                            @elseif ($h['nilai'] > 60 && $h['nilai'] <= 75)
                                C
                            @elseif ($h['nilai'] > 75 && $h['nilai'] <= 90)
                                B
                            @elseif ($h['nilai'] >= 90)
                                A
                            @endif
                        </td>
                        <td>
                            @if ($h['nilai'] <= 60)
                                KURANG
                            @elseif ($h['nilai'] > 60 && $h['nilai'] <= 75)
                                CUKUP
                            @elseif ($h['nilai'] > 75 && $h['nilai'] <= 90)
                                BAIK
                            @elseif ($h['nilai'] > 90)
                                SANGAT BAIK
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>


</body>

</html>
