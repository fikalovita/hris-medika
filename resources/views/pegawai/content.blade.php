<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Sample Page</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-12 col-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-6 col-sm-6">

                                    <h5>Data Pegawai</h5>
                                </div>
                                <div class="col-md-6 col-6 col-sm-6 text-end">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="ti ti-plus"></i> Tambah
                                        Pegawai</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="new-cons"
                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">NRP</label>
                                <input type="email" class="form-control" placeholder="Enter full name">
                                <small class="form-text text-muted">Please enter your full name</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" placeholder="Enter email">
                                <small class="form-text text-muted">Please enter your email</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Belakang:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Password">
                                </div>
                                <small class="form-text text-muted">Please enter your Password</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Pekerja Aktif:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Ya</option>
                                    <option>Tidak</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Negara Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Enter your address">
                                <small class="form-text text-muted">Please enter your address</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kota Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Enter your address">
                                <small class="form-text text-muted">Please enter your address</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="pc-datepicker-3"
                                        placeholder="Pilih Tanggal">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Usia</label>
                                <input type="number" class="form-control">
                                <small class="form-text text-muted">Please enter your address</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Umur:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>10-20</option>
                                    <option>20-25</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Utama:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Kedua:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Provinsi:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>10-20</option>
                                    <option>20-25</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kabupaten:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>10-20</option>
                                    <option>20-25</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kecamatan:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>10-20</option>
                                    <option>20-25</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelurahan:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>10-20</option>
                                    <option>20-25</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kode Pos:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp Utama :</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp kedua :</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Utama:</label>
                                <input type="email" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Kedua:</label>
                                <input type="email" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">TMT:</label>
                                <input type="email" class="form-control" placeholder="Masukkan alamat...">
                                <small class="form-text text-muted">Silahkan masukkan alamat anda</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status Menikah:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Kawin</option>
                                    <option>Belum Kawin</option>
                                    <option>Cerai Mati</option>
                                    <option>Cerai Hidup</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status PTKP Anak:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Kawin</option>
                                    <option>Belum Kawin</option>
                                    <option>Cerai Mati</option>
                                    <option>Cerai Hidup</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Bidang:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Kawin</option>
                                    <option>Belum Kawin</option>
                                    <option>Cerai Mati</option>
                                    <option>Cerai Hidup</option>
                                </select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Pengangkatan</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="tgl_pengangkatan"
                                        placeholder="Pilih Tanggal">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Posisi:</label>
                                <div class="input-group">
                                    <select id="inputState" class="form-control form-select">
                                        <option selected>Kawin</option>
                                        <option>Belum Kawin</option>
                                        <option>Cerai Mati</option>
                                        <option>Cerai Hidup</option>
                                    </select>
                                    <button class="input-group-text">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>

                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="inputState" class="form-control form-select">
                                        <option selected>Kawin</option>
                                        <option>Belum Kawin</option>
                                        <option>Cerai Mati</option>
                                        <option>Cerai Hidup</option>
                                    </select>
                                    <button class="input-group-text">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="inputState" class="form-control form-select">
                                        <option selected>Kawin</option>
                                        <option>Belum Kawin</option>
                                        <option>Cerai Mati</option>
                                        <option>Cerai Hidup</option>
                                    </select>
                                    <button class="input-group-text">
                                        <i class="ti ti-plus"></i>
                                    </button>
                                </div>

                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
