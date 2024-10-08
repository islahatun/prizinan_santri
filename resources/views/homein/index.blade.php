@extends('layouts.navin')

@push('custom-style')
    <style>
        #home .card {
            width: 400px;
            height: 75px;
            background-color: antiquewhite;
        }

        #home .table {
            background-color: antiquewhite;
        }
    </style>
@endpush
@section('content')
    {{-- cdnlink --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <section id="home">
        <div class="container-fluid">
            <div class="row">
                {{-- START DASHBOARD --}}
                <div class="container row gap-2">
                    <div class="col-5 justify-content-center d-inline-flex align-content-center">
                        <div class="card">
                            <div class="d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-person-badge mt-3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path
                                        d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                </svg>
                                <div class="d-inline-flex  mt-4 mx-3">
                                    <h4 class="fw-bold">JUMLAH SANTRI</h4>
                                    <h4 class="mx-5 fw-bold">{{ $santricount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 justify-content-center d-inline-flex align-content-center">
                        <div class="card">
                            <div class="d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-journal-album mt-3" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 4a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5zm1 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z" />
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path
                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg>
                                <div class=" d-inline-flex mt-4 mx-3">
                                    <h4 class="fw-bold">JUMLAH PERIZINAN</h4>
                                    <h4 class="mx-5 fw-bold">{{ $perizinancount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 justify-content-center d-inline-flex align-content-center mt-3">
                        <div class="card">
                            <div class="d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-clipboard2-x mt-3" viewBox="0 0 16 16">
                                    <path
                                        d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z" />
                                    <path
                                        d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z" />
                                    <path
                                        d="M8 8.293 6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293Z" />
                                </svg>
                                <div class="d-inline-flex mt-4 mx-3">
                                    <h4 class="fw-bold">JUMLAH PELANGGARAN</h4>
                                    <h4 class="mx-4 fw-bold">{{ $pelanggarancount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 justify-content-center d-inline-flex align-content-center mt-3">
                        <div class="card">
                            <div class="d-inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-person-badge mt-3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path
                                        d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                </svg>
                                <div class=" d-inline-flex mt-4 mx-3">
                                    <h4 class="fw-bold">JUMLAH USTADZ</h4>
                                    <h4 class="mx-5 fw-bold">{{ $ustadcount }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END DASHBOARD --}}
                <div class="col-12 mt-3 d-inline-flex">
                    <div class="placebutton m-3">
                    </div>
                </div>
                <divclass="mt-2" style="max-width: 100%;">
                <h3 class="text-center">DATA PELANGGARAN </h3>
                <table id="tabel2" class="table table-bordered border-dark">
                    <thead>
                        <tr style="align-content: center">
                            <th scope="col">NO</th>
                            <th scope="col">NAMA PELANGGARAN</th>
                            <th scope="col">SKOR</th>
                            <th scope="col">JENIS PELANGGARAN</th>
                            <th scope="col">HUKUMAN</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggaran as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_pelanggaran }}</td>
                                <td>{{ $item->skor_pelanggaran }}</td>
                                <td>
                                    @if ($item->skor_pelanggaran <= 40)
                                        Pelanggaran Ringan
                                    @elseif ($item->skor_pelanggaran > 40 && $item->skor_pelanggaran <= 70)
                                        Pelanggaran Sedang
                                    @else
                                        Pelanggaran Berat
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $hukumanArray = explode(', ', $item->hukuman);
                                    @endphp
                                    @if ($item->hukuman == null)
                                        -
                                    @else
                                        @foreach ($hukumanArray as $key => $h)
                                            {{ $key + 1 }}. {{ $h }} <br>
                                        @endforeach
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-2" style="max-width: 100%;">
                <h3 class="text-center">DATA PERIZINAN</h3>
                <table id="tabel1" class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">TANGGAL IZIN</th>
                            <th scope="col">TANGGAL BALIK</th>
                            <th scope="col">ALASAN IZIN</th>
                            <th scope="col">TERTANDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perizinan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->santri ? $item->santri->nisn : '' }}</td>
                                <td>{{ $item->santri ? $item->santri->nama : '' }}</td>
                                <td>{{ $item->tgl_pulang }}</td>
                                <td>{{ $item->tgl_balik }}</td>
                                <td>{{ $item->alasan_izin }}</td>
                                <td>{{ $item->user ? $item->user->name : '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.inputbox').select2({
                dropdownParent: $('#exampleModal'),
                width: "100%"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({});
            var table = $('#tabel2').DataTable({});
        });
    </script>
@endsection
