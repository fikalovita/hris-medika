import axios from 'axios';
import Swal from 'sweetalert2';

//bidang trigger
document.getElementById("btn-modal-role").addEventListener("click", function (e) {
    e.preventDefault();
    const modalRole = new bootstrap.Modal(document.getElementById('modal-role'));
    modalRole.show();
});
const tabelRole = $('#tabel-role').DataTable({
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
        }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/pegawai_lvl',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_lvl'
        },
        {
            data: 'nm_lvl'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-role"  data-id=${data.kd_lvl}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-role" data-id=${data.kd_lvl}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-role').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_pegawai_lvl', {
                kd_lvl: document.getElementById('kode-role').value,
                nm_lvl: document.getElementById('nama-role').value
            }, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
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
            tabelRole.ajax.reload();
        })
        .catch(function (error) {
            console.log(error.response.data);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: error.response.data.message,
            });
        });
});
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-role');
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
            const kd_lvl = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_pegawai_lvl', {
                    params: {
                        kd_lvl: kd_lvl
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    tabelRole.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-role');
    if (!btn) return;
    const modalEditBidang = new bootstrap.Modal(document.getElementById('modal-edit-role'));
    modalEditBidang.show();
    const kd_lvl = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_pegawai_lvl', {
        params: {
            kd_lvl: kd_lvl
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-role').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-role').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_pegawai_lvl', {
        kd_lvl: document.getElementById('edit-kode-role').value,
        nm_lvl: document.getElementById('edit-nama-role').value
    }, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }).then(response => {
        Swal.fire({
            position: "center",
            icon: "success",
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500
        });
        tabelRole.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
