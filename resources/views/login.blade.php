<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ 'assets/vendor/fontawesome-free/css/all.min.css'}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ 'assets/css/sb-admin-2.min.css' }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" >
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" align="center">
                                <img src="{{ 'img/logo.webp'}}" alt="" width="80%" style="margin-top: 40px;margin-left: 80px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if (session('error'))
                                            <div class="alert alert-danger" id="success-alert">
                                                <b>Opps!</b> {{ session('error') }}
                                            </div>
                                        @endif
                                        @if (session('success'))
                                            <div class="alert alert-success" id="success-alert">
                                                <b>Berhasil !</b> {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{ route('loginaksi') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Log in</button>
                                        <hr>
                                        <a href="#" class="btn btn-secondary btn-user btn-block" data-toggle="modal" data-target="#cekpeserta">
                                            Cek Peserta Didik
                                        </a>
                                    <hr>

                                        <a href="#" class="btn btn-success btn-user btn-block" data-toggle="modal" data-target="#exampleModal">
                                            Daftar Peserta Didik
                                        </a>
                                        {{-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> --}}
                                    </form>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    {{-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="cekpeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cek Peserta Didik Baru</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="daftarForm" action="{{ route('cari.action') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Nama Peserta didik" name="cari">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulir Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="daftarForm" action="{{ route('daftar.action') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nisn" class="col-form-label">NISN:</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $nisn }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nissmp" class="col-form-label">NIS SMP:</label>
                                    <input type="text" class="form-control" id="nissmp" name='nissmp'>
                                </div>
                                <div class="form-group">
                                    <label for="namalengkap" class="col-form-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control" id="namalengkap" name='namalengkap'>
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin" class="col-form-label">Jenis Kelamin:</label>
                                    <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($jk as $k)
                                            <option value="{{ $k->id }}">{{ $k->jeniskelamin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamatpesertadidik" class="col-form-label">Alamat Peserta Didik:</label>
                                    <textarea type="text" class="form-control" id="alamatpesertadidik" name='alamatpesertadidik'></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tgllahir" class="col-form-label">Tgl Lahir:</label>
                                    <input type="date" name="tgllahir" class="form-control mb-3 flatpickr-no-config" placeholder="Select date..">
                                </div>
                                <div class="form-group">
                                    <label for="asalsekolah" class="col-form-label">Asal Sekolah:</label>
                                    <input type="text" class="form-control" id="asalsekolah" name='asalsekolah'>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan" class="col-form-label">Jurusan:</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <option value="" selected>-- Pilih --</option>
                                        @foreach ($jrs as $k)
                                            <option value="{{ $k->id }}">{{ $k->jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="notelepon" class="col-form-label">No Telepon:</label>
                                    <input type="text" class="form-control" id="notelepon" name="notelepon">
                                </div>
                                <div class="form-group">
                                    <label for="alamatsekolah" class="col-form-label">Alamat Sekolah:</label>
                                    <textarea class="form-control" id="alamatsekolah" name="alamatsekolah"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="col-form-label">Jalur Pendaftaran</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="japres">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Jalur Prestasi
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="jasktm">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Jalur SKTM
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="jaszon">
                                    <label class="form-check-label" for="exampleRadios3">
                                        Jalur Zonasi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="japresFields" style="display: none;">
                            <div class="col-12">
                                <label for="ketjalur1" class="col-form-label">Nilai Rata - Rata Raport:</label>
                                <input type="text" class="form-control" id="ketjalur1" placeholder="nilai rata - rata raport" name="ketjalur">
                            </div>
                        </div>
                        <div class="row" id="jasktmFields" style="display: none;">
                            <div class="col-12">
                                <label for="ketjalur2" class="col-form-label">No SKTM</label>
                                <input type="text" class="form-control" id="ketjalur2" placeholder="No SKTM" name="ketjalur">
                            </div>
                        </div>
                        <div class="row" id="jaszonFields" style="display: none;">
                            <div class="col-12">
                                <label for="ketjalur3" class="col-form-label">Jarak :</label>
                                <input type="text" class="form-control" id="ketjalur3" placeholder="Jarak Dari Rumah Ke Sekolah" name="ketjalur">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <script src="{{'assets/vendor/jquery/jquery.min.js'}}"></script>
    <script src="{{'assets/vendor/bootstrap/js/bootstrap.bundle.min.js'}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{'assets/vendor/jquery-easing/jquery.easing.min.js'}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{'assets/js/sb-admin-2.min.js'}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="exampleRadios"]');
            const japresFields = document.getElementById('japresFields');
            const jasktmFields = document.getElementById('jasktmFields');
            const jaszonFields = document.getElementById('jaszonFields');
            const ketjalurInputs = document.querySelectorAll('input[name="ketjalur"]');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function () {
                    japresFields.style.display = 'none';
                    jasktmFields.style.display = 'none';
                    jaszonFields.style.display = 'none';
                    ketjalurInputs.forEach(input => input.disabled = true);

                    if (this.value === 'japres') {
                        japresFields.style.display = 'block';
                        japresFields.querySelector('input').disabled = false;
                    } else if (this.value === 'jasktm') {
                        jasktmFields.style.display = 'block';
                        jasktmFields.querySelector('input').disabled = false;
                    } else if (this.value === 'jaszon') {
                        jaszonFields.style.display = 'block';
                        jaszonFields.querySelector('input').disabled = false;
                    }
                });
            });

            document.getElementById('daftarForm').addEventListener('submit', function (event) {
                if (document.getElementById('exampleRadios1').checked) {
                    japresFields.style.display = 'block';
                    japresFields.querySelector('input').disabled = false;
                } else if (document.getElementById('exampleRadios2').checked) {
                    jasktmFields.style.display = 'block';
                    jasktmFields.querySelector('input').disabled = false;
                } else if (document.getElementById('exampleRadios3').checked) {
                    jaszonFields.style.display = 'block';
                    jaszonFields.querySelector('input').disabled = false;
                }
            });
        });

        var alertBox = document.getElementById('success-alert');

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 3000);
    </script>

</body>

</html>
