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

                                    <h5>Data User</h5>
                                </div>
                                <div class="col-md-6 col-6 col-sm-6 text-end">
                                    <button type="button" class="btn btn-primary btn-sm" id="btn-modal-user"><i
                                            class="ti ti-plus"></i> Tambah
                                        User</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel-user"
                            class="display table table-striped table-hover dt-responsive nowrap table-sm"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
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
<div class="modal fade" id="modal-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <select id="name-user" class="form-control form-select" name="name">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user-email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Password</label>
                        <input type="text" class="form-control" id="user-password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select id="role-id" class="form-control form-select" name="role_id">
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submit-user">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah bidang --}}
{{-- modal edit bidang --}}
<div class="modal fade" id="modal-edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <select id="edit-name-user" class="form-control form-select edit-user" name="name" data-key="name">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Email</label>
                        <input type="email" class="form-control edit-user" id="edit-user-email" name="email" placeholder="Email" data-key="email">
                        <input type="hidden" class="form-control edit-user" id="edit-user-id" name="id" data-key="id">
                    </div>
                    <div class="mb-3">
                        <label for="nm_bidang" class="form-label">Password</label>
                        <input type="text" class="form-control edit-user" id="edit-user-password" name="password"
                            placeholder="Password" data-key="password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select id="edit-role-id" class="form-control form-select edit-user" name="role_id" data-key="role_id">
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-user">Simpan</button>
            </div>
        </div>
    </div>
</div>
{{-- end modal edit bidang --}}
