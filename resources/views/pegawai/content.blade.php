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
                                        data-bs-target="#modal-pegawai"><i class="ti ti-plus"></i> Tambah
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
<!-- Modal Pegawai -->
<div class="modal fade" id="modal-pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="email" class="form-control" placeholder="Masukkan NRP...">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Depan...">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Belakang:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Belakang...">
                                </div>
                            
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
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin:</label>
                                <select id="inputState" class="form-control form-select">
                                    <option selected>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                           
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Negara Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Masukkan Negara Kelahiran...">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kota Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Masukkan Kota Kelahiran...">
                              
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
                          
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Umur:</label>
                                <select id="kelompok_umur" class="form-control form-select"></select>
                                <small class="form-text text-muted">Please enter Profile URL</small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Utama:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                           
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Kedua:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat...">
                             
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
                                <input type="text" class="form-control" placeholder="Kode Pos...">
                             
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp Utama :</label>
                                <input type="text" class="form-control" placeholder="No Tlp Utama...">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp kedua :</label>
                                <input type="text" class="form-control" placeholder="No Tlp kedua...">
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Utama:</label>
                                <input type="email" class="form-control" placeholder=Email Utama...">
                           
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Kedua:</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email Kedua...">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">TMT:</label>
                                <input type="email" class="form-control" placeholder="Masukkan TMT...">
                             
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
                             
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status PTKP Anak:</label>
                                <select id="ptkp-stts-anak" class="form-control form-select"></select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Bidang:</label>
                                <div class="input-group">
                                    <select id="bidang" class="form-control form-select"></select>
                                </div>
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
                                    <select id="posisi" class="form-control form-select"></select>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="gol-pekerjaan" class="form-control form-select"></select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="jenis-pekerjaan" class="form-control form-select"></select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Karyawan:</label>
                                <div class="input-group">
                                    <select id="jenis-karyawan" class="form-control form-select"></select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="kel-gol-pekerjaan" class="form-control form-select"></select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Level Manager:</label>
                                <div class="input-group">
                                    <select id="role" class="form-control form-select"
                                        data-live-search="true"></select>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Manager:</label>
                                <select id="manager" class="form-control form-select" data-live-search="true">
                                    <option value="">-- Pilih Manager --</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No.KTP:</label>
                                <input type="email" class="form-control" placeholder="Masukkan No.KTP...">
                              
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Passport:</label>
                                <input type="email" class="form-control" placeholder="Masukkan Passport...">
                              
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">BPJS Ket:</label>
                                <input type="email" class="form-control" placeholder="Masukkan BPJS Ket...">
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Ibu</label>
                                <input type="email" class="form-control" placeholder="Masukkan Nama Ibu...">
                            
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kontak Darurat</label>
                               <input type="email" class="form-control" placeholder="Masukkan Kontak Darurat...">
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
{{-- end modal pegawai --}}
