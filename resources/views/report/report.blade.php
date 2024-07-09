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
            th, td {
                border: 1px solid #000;
                text-align: center;
                padding: 5px;
            }
        </style>
        <title>Report Anak</title>
    </head>
    <body>
        <table>
            <tr>
                <td><img src="{!! public_path('build/assets/Logo Ar-rahmah.jpg') !!}" alt="" height="90px" width="90px"></td>
                <td style="align-content: center">
                    <p> SIPON Al-RAHMAH</p>
                </td>
            </tr>
        </table>
        <h1 style="text-align: center">Laporan Hafalan</h1>
        <label for="">Nama : </label>
        <label for="">{{ $santri }}</label>
        <table>
            <tr>
                <td>NO</td>
                <td>JUZ</td>
                <td>TANGGAL TES</td>
                <td>TAJWID</td>
                <td>MAKHROJ</td>
                <td>NILAI</td>
                <td>PENGUJI</td>
            </tr>
            <tbody>
                @foreach ($hafalan as $key => $h )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $h->juz_id }}</td>
                    <td>{{ $h->tanggal }}</td>
                    <td>{{ $h->tajwid }}</td>
                    <td>{{ $h->makhroj }}</td>
                    <td>{{ $h->nilai }}</td>
                    <td>{{ $h->ustadz->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="page-break"></div>

    </body>
    </html>


</body>
</html>
