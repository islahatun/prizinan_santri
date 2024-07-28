<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir pengajuan Izin</title>
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

            .table1 {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #000;
                text-align: center;
                padding: 5px;
            }
        </style>
        <title>Report Santri</title>
    </head>

    <body>
        <table class="table1">
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
        <h1 style="text-align: center">Izin Formulir Santri</h1>
        <table>
            <tr>
                <td>Nama Santri</td>
                <td>: {{ $data->santri->nama }}</td>
            </tr>
            <tr>
                <td>Tanggal Pulang</td>
                <td>: {{ date('d-m-Y',strtotime($data->tgl_pulang)) }}</td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>: {{ date('d-m-Y',strtotime($data->tgl_balik)) }}</td>
            </tr>
            <tr>
                <td>Alasan Izin</td>
                <td>: {{ $data->alasan_izin }}</td>
            </tr>
            <tr>
                <td>Pemberi Izin</td>
                <td>: {{ $data->user->name }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>: {{ $data->keterangan }}</td>
            </tr>
        </table>



    </body>

    </html>


</body>

</html>
