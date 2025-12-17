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

                                    <h5>Data PTKP Status Anak</h5>
                                </div>
                                <div class="col-md-6 col-6 col-sm-6 text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn-modal-ptkp"><i
                                            class="ti ti-plus"></i> Tambah
                                       PTKP Status Anak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel-ptkp"
                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Kode PTKP Status Anak</th>
                                    <th>Nama PTKP Status Anak</th>
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
<div class="modal fade" id="modal-ptkp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah PTKP  Status Anak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="kd_bidang" class="form-label">Kode PTKP  Status Anak</label>
                        <input type="text" class="form-control" id="kode-ptkp" name="kd_kd_ptkp">
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Nama PTKP  Status Anak</label>
                        <input type="text" class="form-control" id="nama-ptkp" name="nm_kd_ptkp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-ptkp">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah bidang --}}
{{-- modal edit bidang --}}
    <div class="modal fade" id="modal-edit-ptkp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit PTKP Status Anak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="kd_bidang" class="form-label">Kode PTKP  Status Anak</label>
                        <input type="text" class="form-control edit-ptkp" id="edit-kode-ptkp" name="kd_ptkp" data-key="kd_ptkp" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Nama PTKP  Status Anak</label>
                        <input type="text" class="form-control edit-ptkp" id="edit-nama-ptkp" name="nm_ptkp" data-key="nm_ptkp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-ptkp">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal edit bidang --}}
