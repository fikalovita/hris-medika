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
                                        Pegawai
                                    </button>
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
<!-- Modal tambah Pegawai -->
<div class="modal fade" id="modal-pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Form Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-pegawai">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">NRP</label>
                                <input type="email" class="form-control" placeholder="Masukkan NRP..." name="nrp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Depan</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Depan..."
                                    name="nm_pegawai">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Belakang:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Belakang..."
                                        name="nm_pegawai_tmb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Pekerja Aktif:</label>
                                <select id="inputState" class="form-control form-select" name="pekerja_aktif">
                                    <option selected>Ya</option>
                                    <option>Tidak</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin:</label>
                                <select id="inputState" class="form-control form-select" name="jk">
                                    <option selected>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Negara Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Masukkan Negara Kelahiran..."
                                    name="negara_kelahiran">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kota Kelahiran</label>
                                <input type="text" class="form-control" placeholder="Masukkan Kota Kelahiran..."
                                    name="kota_kelahiran">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="pc-datepicker-3"
                                        placeholder="Pilih Tanggal" name="tgl_lahir">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Usia</label>
                                <input type="number" class="form-control" name="usia">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Umur:</label>
                                <select id="kelompok_umur" class="form-control form-select"
                                    name="kelompok_umur"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Utama:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat..."
                                    name="alamat_utama">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Kedua:</label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat..."
                                    name="alamat_kedua">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Provinsi:</label>
                                <select id="provinsi" class="form-control form-select" name="provinsi">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kabupaten:</label>
                                <select id="kabupaten" class="form-control form-select" name="kabupaten"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kecamatan:</label>
                                <select id="kecamatan" class="form-control form-select" name="kecamatan">
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelurahan:</label>
                                <select id="kelurahan" class="form-control form-select" name="kelurahan">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kode Pos:</label>
                                <input type="text" class="form-control" placeholder="Kode Pos..."
                                    name="kode_pos">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp Utama :</label>
                                <input type="text" class="form-control" placeholder="No Tlp Utama..."
                                    name="no_telepon_utama">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp kedua :</label>
                                <input type="text" class="form-control" placeholder="No Tlp kedua..."
                                    name="no_telepon_kedua">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Utama:</label>
                                <input type="email" class="form-control" placeholder="Email Utama..."
                                    name="email_utama">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Kedua:</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email Kedua..."
                                    name="email_kedua">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">TMT:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="tmt"
                                        placeholder="Pilih Tanggal" name="tmt">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status Menikah:</label>
                                <select id="inputState" class="form-control form-select" name="stts_menikah">
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
                                <select id="ptkp-stts-anak" class="form-control form-select"
                                    name="ptkp_status_anak"></select>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Bidang:</label>
                                <div class="input-group">
                                    <select id="bidang" class="form-control form-select" name="bidang"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Pengangkatan</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="tgl_pengangkatan"
                                        placeholder="Pilih Tanggal" name="tgl_pengangkatan">
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
                                    <select id="posisi" class="form-control form-select" name="posisi"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Perusahaan:</label>
                                <div class="input-group">
                                    <select id="perusahaan" class="form-control form-select"
                                        name="perusahaan"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="gol-pekerjaan" class="form-control form-select"
                                        name="gol_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="jenis-pekerjaan" class="form-control form-select"
                                        name="jns_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Karyawan:</label>
                                <div class="input-group">
                                    <select id="jenis-karyawan" class="form-control form-select"
                                        name="jns_karyawan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="kel-gol-pekerjaan" class="form-control form-select"
                                        name="kelompok_gol_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Level Manager:</label>
                                <div class="input-group">
                                    <select id="role" class="form-control form-select" data-live-search="true"
                                        name="lvl_manager"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Manager:</label>
                                <select id="manager" class="form-control form-select" name="manager">
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No.KTP:</label>
                                <input type="text" class="form-control" placeholder="Masukkan No.KTP..."
                                    name="no_ktp">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Passport:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Passport..."
                                    name="passport">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">BPJS Ket:</label>
                                <input type="text" class="form-control" placeholder="Masukkan BPJS Ket..."
                                    name="bpjs_ket">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Ibu..."
                                    name="nm_ibu">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kontak Darurat</label>
                                <input type="text" class="form-control" placeholder="Masukkan Kontak Darurat..."
                                    name="kontak_darurat">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-pegawai">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal tambah pegawai --}}
<!-- Modal editPegawai -->
<div class="modal fade" id="modal-edit-pegawai" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Form Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit-pegawai">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">NRP</label>
                                <input type="text" class="form-control edit-pegawai" placeholder="Masukkan NRP..."
                                    name="nrp" data-key="nrp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Depan</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Nama Depan..." name="nm_pegawai" data-key="nm_pegawai">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Belakang:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control edit-pegawai"
                                        placeholder="Masukkan Nama Belakang..." name="nm_pegawai_tmb"
                                        data-key="nm_pegawai_tmb">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Pekerja Aktif:</label>
                                <select id="edit-pekerja-aktif" class="form-control form-select edit-pegawai"
                                    name="pekerja_aktif" data-key="pekerja_aktif">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin:</label>
                                <select id="edit-jk" class="form-control form-select edit-pegawai" name="jk"
                                    data-key="jk">
                                    <option value="Laki-laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Negara Kelahiran</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Negara Kelahiran..." name="negara_kelahiran"
                                    data-key="negara_kelahiran">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kota Kelahiran</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Kota Kelahiran..." name="kota_kelahiran"
                                    data-key="kota_kelahiran">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control edit-pegawai" id="pc-datepicker-3"
                                        placeholder="Pilih Tanggal" name="tgl_lahir" data-key="tgl_lahir">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Usia</label>
                                <input type="number" class="form-control edit-pegawai" name="usia"
                                    data-key="usia">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Umur:</label>
                                <select id="edit-kelompok-umur" class="form-control form-select edit-pegawai"
                                    name="kelompok_umur" data-key="kelompok_umur"></select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Utama:</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan alamat..." name="alamat_utama" data-key="alamat_utama">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Alamat Kedua:</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan alamat..." name="alamat_kedua" data-key="alamat_kedua">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Provinsi:</label>
                                <select id="edit-provinsi" class="form-control form-select edit-pegawai"
                                    name="provinsi" data-key="provinsi">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kabupaten:</label>
                                <select id="edit-kabupaten" class="form-control form-select edit-pegawai"
                                    name="kabupaten" data-key="kabupaten"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kecamatan:</label>
                                <select id="edit-kecamatan" class="form-control form-select edit-pegawai"
                                    name="kecamatan" data-key="kecamatan">
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelurahan:</label>
                                <select id="edit-kelurahan" class="form-control form-select edit-pegawai"
                                    name="kelurahan" data-key="kelurahan">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kode Pos:</label>
                                <input type="text" class="form-control edit-pegawai" placeholder="Kode Pos..."
                                    name="kode_pos" data-key="kode_pos">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp Utama :</label>
                                <input type="text" class="form-control edit-pegawai" placeholder="No Tlp Utama..."
                                    name="no_telepon_utama" data-key="no_telepon_utama">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No Tlp kedua :</label>
                                <input type="text" class="form-control edit-pegawai" placeholder="No Tlp kedua..."
                                    name="no_telepon_kedua" data-key="no_telepon_kedua">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Utama:</label>
                                <input type="email" class="form-control edit-pegawai" placeholder="Email Utama..."
                                    name="email_utama" data-key="email_utama">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Email Kedua:</label>
                                <input type="email" class="form-control edit-pegawai"
                                    placeholder="Masukkan Email Kedua..." name="email_kedua" data-key="email_kedua">

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">TMT:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control edit-pegawai" id="tmt"
                                        placeholder="Pilih Tanggal" name="tmt" data-key="tmt">
                                    <span class="input-group-text">
                                        <i class="feather icon-calendar"></i>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status Menikah:</label>
                                <select id="edit-status-nikah" class="form-control form-select edit-pegawai"
                                    name="stts_menikah" data-key="stts_menikah">
                                    <option>Kawin</option>
                                    <option>Belum Kawin</option>
                                    <option>Cerai Mati</option>
                                    <option>Cerai Hidup</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status PTKP Anak:</label>
                                <select id="edit-ptkp-stts-anak" class="form-control form-select edit-pegawai"
                                    name="ptkp_status_anak" data-key="ptkp_status_anak"></select>

                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Bidang:</label>
                                <div class="input-group">
                                    <select id="edit-bidang" class="form-control form-select edit-pegawai"
                                        name="bidang" data-key="bidang"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Pengangkatan</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control edit-pegawai" id="tgl_pengangkatan"
                                        placeholder="Pilih Tanggal" name="tgl_pengangkatan"
                                        data-key="tgl_pengangkatan">
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
                                    <select id="edit-posisi" class="form-control form-select edit-pegawai"
                                        name="posisi" data-key="posisi"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Perusahaan:</label>
                                <div class="input-group">
                                    <select id="edit-perusahaan" class="form-control form-select edit-pegawai"
                                        name="perusahaan" data-key="kd_perusahaan"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="edit-gol-pekerjaan" class="form-control form-select edit-pegawai"
                                        name="gol_pekerjaan" data-key="gol_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="edit-jenis-pekerjaan" class="form-control form-select edit-pegawai"
                                        name="jns_pekerjaan" data-key="jns_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Karyawan:</label>
                                <div class="input-group">
                                    <select id="edit-jenis-karyawan" class="form-control form-select edit-pegawai"
                                        name="jns_karyawan" data-key="jns_karyawan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kelompok Golongan Pekerjaan:</label>
                                <div class="input-group">
                                    <select id="edit-kel-gol-pekerjaan" class="form-control form-select edit-pegawai"
                                        name="kelompok_gol_pekerjaan" data-key="kelompok_gol_pekerjaan"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Level Manager:</label>
                                <div class="input-group">
                                    <select id="edit-role" class="form-control form-select edit-pegawai"
                                        data-live-search="true" name="lvl_manager" data-key="lvl_manager"></select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Manager:</label>
                                <select id="edit-manager" class="form-control form-select edit-pegawai"
                                    name="manager" data-key="manager">
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">No.KTP:</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan No.KTP..." name="no_ktp" data-key="no_ktp">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Passport:</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Passport..." name="passport" data-key="passport">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">BPJS Ket:</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan BPJS Ket..." name="bpjs_ket" data-key="bpjs_ket">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Nama Ibu..." name="nm_ibu" data-key="nm_ibu">

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Kontak Darurat</label>
                                <input type="text" class="form-control edit-pegawai"
                                    placeholder="Masukkan Kontak Darurat..." name="kontak_darurat"
                                    data-key="kontak_darurat">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-pegawai">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal edit pegawai --}}
<div class="modal fade" id="modal-detail-pegawai" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pegawai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body-detail-pegawai">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">NRP</th>
                            <td>23124567</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Depan</th>
                            <td>23124567</td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Depan</th>
                            <td>23124567</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
