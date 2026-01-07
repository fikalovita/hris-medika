import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));
//bidang trigger
document.getElementById("btn-modal-kgp").addEventListener("click", function (e) {
    e.preventDefault();
    const modalkgp = new bootstrap.Modal(document.getElementById('modal-kgp'));
    modalkgp.show();
});
const tabelkgp = $('#tabel-kgp').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/pegawai_kel_gol_pekerjaan',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_kelompok_gol_pekerjaan'
        },
        {
            data: 'nm_kelompok_gol_pekerjaan'
        },
        {
            data: null,
            render: function (data) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-kgp"  data-id=${data.kd_kelompok_gol_pekerjaan}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-kgp" data-id=${data.kd_kelompok_gol_pekerjaan}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-kgp').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_pegawai_kel_gol_pekerjaan', {
                kd_kelompok_gol_pekerjaan: document.getElementById('kode-kgp').value,
                nm_kelompok_gol_pekerjaan: document.getElementById('nama-kgp').value
            }, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token
                }
            }
        )
        .then(function (response) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: response.data.message,
                showConfirmButton: false,
                timer: 1500
            });
            tabelkgp.ajax.reload();
        })
        .catch(function (error) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: error.response.data.message,
            });
        });
});
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-kgp');
    if (!btn) return;
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            const kd_kelompok_gol_pekerjaan = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_pegawai_kel_gol_pekerjaan', {
                    params: {
                        kd_kelompok_gol_pekerjaan: kd_kelompok_gol_pekerjaan
                    },
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelkgp.ajax.reload(null, false);
                })
                .catch(error => {
                    if (error.response.status === 409) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: error.response.data.message,
                        });
                    }
                });
        }
    });
});

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-edit-kgp');
    if (!btn) return;
    const modalEditkgp = new bootstrap.Modal(document.getElementById('modal-edit-kgp'));
    modalEditkgp.show();
    const kd_kelompok_gol_pekerjaan = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_pegawai_kel_gol_pekerjaan', {
        params: {
            kd_kelompok_gol_pekerjaan: kd_kelompok_gol_pekerjaan
        },
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-kgp').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-kgp').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_pegawai_kel_gol_pekerjaan', {
        kd_kelompok_gol_pekerjaan: document.getElementById('edit-kode-kgp').value,
        nm_kelompok_gol_pekerjaan: document.getElementById('edit-nama-kgp').value
    }, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    }).then(response => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500
        });
        tabelkgp.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
