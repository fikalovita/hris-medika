import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));
//bidang trigger
document.getElementById("btn-modal-jp").addEventListener("click", function (e) {
    e.preventDefault();
    const modalJP = new bootstrap.Modal(document.getElementById('modal-jp'));
    modalJP.show();
});
const tabelJP = $('#tabel-jp').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/pegawai_jns_pekerjaan',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_jns_pekerjaan'
        },
        {
            data: 'nm_jns_pekerjaan'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-jp"  data-id=${data.kd_jns_pekerjaan}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-jp" data-id=${data.kd_jns_pekerjaan}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-jp').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_jns_pekerjaan', {
                kd_jns_pekerjaan: document.getElementById('kode-jp').value,
                nm_jns_pekerjaan: document.getElementById('nama-jp').value
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
            tabelJP.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-jp');
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
            const kd_jns_pekerjaan = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_jns_pekerjaan', {
                    params: {
                        kd_jns_pekerjaan: kd_jns_pekerjaan
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
                    tabelJP.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-jp');
    if (!btn) return;
    const modalEditUmur = new bootstrap.Modal(document.getElementById('modal-edit-jp'));
    modalEditUmur.show();
    const kd_jns_pekerjaan = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_jns_pekerjaan', {
        params: {
            kd_jns_pekerjaan: kd_jns_pekerjaan
        },
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-jp').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-jp').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_jns_pekerjaan', {
        kd_jns_pekerjaan: document.getElementById('edit-kode-jp').value,
        nm_jns_pekerjaan: document.getElementById('edit-nama-jp').value
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
        tabelJP.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
