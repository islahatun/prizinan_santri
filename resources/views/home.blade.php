</body>

</html>
@extends('layouts.app')
@push('custom-style')
    <style>
        .background {
            width: 634px;
            height: 700px;
            border-radius: 13px;
            background-image: url({{ url('/build/assets/beside-preview.png') }});
        }

        #visi-misi .background2 {
            width: 100%;
            height: 768px;
            background-image: url({{ url('/build/assets/bakcgrond-vm.png') }});
        }

        #visi-misi .card {
            width: 80%;
            height: 483px;
            color: white;
            border-radius: 10px;
        }

        #sejarah .bg-sj-1 {
            border-radius: 20px;
            height: 825px;
            width: 660px;
            background-color: #078FB7;
        }

        #sejarah .bg-sj-2 {
            border-radius: 20px;
            height: 825px;
            width: 660px;
            background-color: #D9D9D9;
        }

        #kontak .background2 {
            width: 100%;
            height: 500px;
            background-image: url({{ url('/build/assets/bakcgrond-vm.png') }});
        }

        #kontak .card {
            width: 70%;
            height: 439px;
            background-color: #1E1E1E;
            border-radius: 20px;
        }

        #footer .bg-footer {
            width: 100%;
            height: 178px;
            background-color: #D9D9D9;
        }

        #footer .card {
            width: 251px;
            height: 86px;
            background-color: #1E1E1E;
            border-radius: 16px;
        }

        .btn-home {
            width: 300.47px;
            height: 64.58px;
            border: none;
            background: #083AA9;
            border-radius: 10px;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 38px;
            color: #FFFFFF;
        }

        .btn-home:hover {
            filter: drop-shadow(5px 5px 4px #083AA9);
            transition: 0.3s;
        }

        #home {
            background: linear-gradient(247.6deg, rgba(255, 231, 204, 0.26) 1.51%, #FFE7CC 93.99%, #FFE7CC 94.88%);
            height: 100vh;
            position: relative;
            top: 0px;
        }

        .homeconten {
            z-index: 2;
        }
    </style>
@endpush

@section('content')
    <section id="beranda">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <img src="/build/assets/foto pondok.jpg" alt="landingp" width="750" height="700">
                </div>
                <div class="col-6 ">
                    <div class="background text-center d-flex align-items-center ">
                        <div class="row">
                            <div class="col-12 mb-4 fs-3">
                            </div>
                            <div class="col-12 mt-5">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-4 fs-3">
                                <br>
                            </div>
                            <div class="col-12 mb-2 fs-2">
                                <h3 class="fw-bold">Modern Islamic College Boarding School</h3>
                                <h3 class="fw-bold">Pesantren modern Al-Rahmah</h3>
                            </div>
                            <div>
                                <br>
                                <p class="mb-5 fs-5 fw-semibold">Berdiri diatas dan untuk semua golongan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- section visi misi --}}
    <section id="visi-misi">
        <div class="container-fluid">
            <h4 class="text-center mt-4 fw-bold">AL-RAHMAH</h4>
            <div class="background2 ">
                <div class="mx-5">
                    <img src="/build/assets/Line.png" alt="iconl">
                    <h5 class="d-inline-block text-center mx-3 mt-4 text-white fw-bold ">What we do</h5>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 justify-content-center d-flex align-content-center">
                        <div class="card mt-5 text-black">
                            <img src="/build/assets/icon-pin.png" alt="iconl" width="50px" height="48px"
                                class="mx-5 mt-4">
                            <h3 class="fw-bold mx-5 mt-4">VISI & MISI</h3>
                            <p class="m-5 fw-semibold fs-5 text-justify">Membentuk generasi Islam yang cerdas dan
                                berkarakter
                                rahmatan lil alamin, dan menjadi lembaga pendidikan yang merangkul para anak yatim dan kaum
                                dhuafa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    {{-- section gallery --}}
    <section id="gallery">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                        aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/build/assets/poster pondok.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="fw-bold text-black">Informasi pendaftaran</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/build/assets/poster pondok 1.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="fw-bold text-black">Informasi Kegiatan santri</h3>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('/build/assets/poster pondok 2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="fw-bold text-black">Informasi Biaya Santri</h3>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <div class="container-fluid">
        <h4 class="text-center mt-4 fw-bold"></h4>


        {{-- section sejarah --}}
        <section id="sejarah">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-6 justify-content-center align-content-center">
                        <div class="bg-sj-2 position-relative">
                            <div class="text-black position-absolute mt-5 ms-5">
                                <h3 class="fw-bold">SEJARAH</h3>
                                <h3 class="fw-bold">SEJARAH BERDIRINYA</h3>
                                <p class="fw-normal text-justify" style="text-align: justify">
                                    <span><br>Pondok Pesantren Al-Rahmah berdiri Rabu,
                                        11 Mei 2005 dengan peletakan batu pertama
                                        <br> di sebuah lahan yang sekarang
                                        merupakan lokasi berdirinya gedung Kuwait. Pondok ini <br> berdiri awal
                                        mulanya
                                        diatas
                                        tanah
                                        pinjaman milik H. Yahya,
                                        salah seorang warga kampung
                                        <br> Lebakwangi.
                                        Geliat kegiatan pendidikan dan pengajaran Pesantren al-Rahmah berjalan
                                        <br> dengan
                                        segala
                                        keterbatasan dana,
                                        jumlah tenaga pengajar dan sarana dan prasarana.
                                        <br> Karena rata-rata peserta didik yang ada merupakan kalangan ekonomi lemah
                                        (yatim
                                        dan <br>
                                        duafa).
                                        Dimulai pada tahun 2005 dengan jumlah santri 35 orang yang merupakan
                                        santri <br>
                                        yatim
                                        dan
                                        dhu’afa ponpes al-Rahmah memulai kiprahnya.
                                    </span>
                                    <br>
                                    <br>
                                    <span> Pada tahun 2010 Ust. Abdul Rasyid Muslim bertemu Ust Abdullah Saeed
                                        Baharmus. <br>
                                        Kunjungan pertamanya ditemani oleh KH. Ikhwan Hadiyin (pimpinan ponpes
                                        Daar
                                        <br>El-Azhar
                                        Rangkasbitung)
                                        dan Ust Sa’du Suud, ahli bekam yang merupakan alumni Gontor. <br> Ust. Sa’du
                                        Suud
                                        beberapa kali berkunjung dan menginap di al-Rahmah, dan melalui <br> lisan
                                        beliau
                                        Ust.
                                        Abdullah Saeed Baharmus
                                    </span>
                                    <br>
                                    <br>
                                    <span> Saat itu jumlah santri telah mencapai 280 an.
                                        Tahun 2010 merupakan puncaknya <br> kesulitan sekaligus terbukanya kemudahan
                                        bagi
                                        ponpes
                                        al-Rahmah.
                                        Dimulai <br> dengan kedatangan Ust. Abdullah Saeed Baharmus, yang kemudian
                                        menjadi
                                        ketua
                                        Badan <br> Wakaf al-Rahmah.
                                        Berkat Beliau, mulailah berdatangan bantuan dari negara-negara <br> Timur
                                        Tengah
                                        diantaranya
                                        Saudi, dan Kuwait.
                                        Pada tahun 2017 Ponpes Al-Rahmah <br> ditetapkan menjadi Qoryah Kuwait
                                        al-Khairiyyah
                                        (Kampung
                                        Amal Kuwait).</span>
                                    <br>
                                    <br>
                                    <span>Pondok Pesantren al-Rahmah yang berada di Walantaka, Lebak Wangi, Kota
                                        Serang, <br>
                                        Provinsi
                                        Banten.
                                        Pada tahun ajaran 2023/2024 pesantren ini memiliki santri dan santriwati <br>
                                        mencapai
                                        1.300
                                        orang yang
                                        terbagi pada jenjang Madrasah Tsanawiyah (MTS) <br> dan
                                        Madrasah Aliyah (MA).</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    {{-- End section sejarah --}}

    <div class="container-fluid">
        <h4 class="text-center mt-4 fw-bold"></h4>

        {{-- section kontak --}}
        <section id="kontak">
            <div class="container-fluid">
                <div class="background2">
                    <div class="row">
                        <div class="col-6 justify-content-center d-flex align-content-center">
                            <div class="card mt-5 text-white">
                                <h4 class="mt-2 fw-bold text-center">CONTACT</h4>
                                <p class="mt-5 ms-5 fw-normal text-justify">
                                    Jl Ciruas - Petir Lebakwangi -
                                    <br>
                                    Walantaka Kota Serang -
                                    <br>
                                    Banten - Indonesia
                                    <br>
                                    <br>
                                    HP:
                                    <br>
                                    Ust. Wahyudin, S.Pd.I : 085216100194
                                    <br>
                                    Ust. Tedi Hartadi : 089651854068
                                    <br>
                                    Usth. Harisah Jamilah : 08888145972
                                </p>
                            </div>
                        </div>
                        <div class="col-6 justify-content-center d-flex align-content-center">
                            <div class="card mt-5 text-white">
                                <h4 class="mt-2 text-center">SARAN & MASUKAN</h4>
                                <form class="row g-3 ms-2 me-2 mt-1 mb-1">
                                    <div class="col-md-6">
                                        <label for="inputname" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="inputname"
                                            placeholder="masukkan nama">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputemail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="inputemail"
                                            placeholder="masukkan email">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputalamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="inputalamat"
                                            placeholder="jalan/desa">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputfeedback">Feedback</label>
                                        <textarea class="form-control" name="feedback" id="feedback" rows="3" placeholder="masukkan ulasan"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>

    {{-- section footer --}}
    <section id="footer">
        <div class="container-fluid">
            <div class="bg-footer">
                <div class="row">
                    <div class="col-4 justify-content-center d-flex align-content-center">
                        {{-- <div class="mt-3 text-black text-center">
                            <img src="{{ asset('/build/assets/map.png') }}" alt="">
                            <h5 class="fw-bold mt-2">Denah Lokasi</h5>
                        </div> --}}
                    </div>
                    <div class="col-4 justify-content-center d-flex align-content-center">
                        <div class=" text-center text-black m-3">
                            <h5 class="fw-bold mb-4">OUR SOCIALMEDIA</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-facebook-circle-fil" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            <h5 class="fw-bold mt-4">@Copyright-by.Licht-2024</h5>
                        </div>
                    </div>
                    <div class="col-4 justify-content-center d-flex align-content-center">
                        <div class="mt-5 text-white text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
