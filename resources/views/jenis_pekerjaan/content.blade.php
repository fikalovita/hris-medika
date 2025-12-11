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

                                    <h5>Data Jenis Pekerjaan</h5>
                                </div>
                                <div class="col-md-6 col-6 col-sm-6 text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn-modal-jp"><i
                                            class="ti ti-plus"></i> Tambah
                                        Jenis Pekerjaan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel-jp"
                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Kode Jenis Pekerjaan</th>
                                    <th>Nama Jenis Pekerjaan</th>
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
{{-- modal tambah bidang --}}
<div class="modal fade" id="modal-jp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Jenis Pekerjaan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="kd_bidang" class="form-label">Kode Jenis Pekerjaan</label>
                        <input type="text" class="form-control" id="kode-jp" name="kd_jns_pekerjaan">
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Nama Jenis Pekerjaan</label>
                        <input type="text" class="form-control" id="nama-jp" name="nm_jns_pekerjaan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-jp">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah bidang --}}
{{-- modal edit bidang --}}
    <div class="modal fade" id="modal-edit-jp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Jenis Pekerjaan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="kd_bidang" class="form-label">Kode Jenis Pekerjaan</label>
                        <input type="text" class="form-control edit-jp" id="edit-kode-jp" name="kd_jns_pekerjaan" data-key="kd_jns_pekerjaan" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Nama Jenis Pekerjaan</label>
                        <input type="text" class="form-control edit-jp" id="edit-nama-jp" name="nm_jns_pekerjaan" data-key="nm_jns_pekerjaan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-jp">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal edit bidang --}}
