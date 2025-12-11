import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
//bidang trigger
document.getElementById("btn-modal-jk").addEventListener("click", function (e) {
    e.preventDefault();
    const modalJk = new bootstrap.Modal(document.getElementById('modal-jk'));
    modalJk.show();
});
const tabeljk= $('#tabel-jk').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/pegawai_jns_karyawan',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_jns_karyawan'
        },
        {
            data: 'nm_jns_karyawan'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-jk"  data-id=${data.kd_jns_karyawan}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-jk" data-id=${data.kd_jns_karyawan}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-jk').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_pegawai_jns_karyawan', {
                kd_jns_karyawan: document.getElementById('kode-jk').value,
                nm_jns_karyawan: document.getElementById('nama-jk').value
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
            tabeljk.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-jk');
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
            const kd_jns_karyawan = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_pegawai_jns_karyawan', {
                    params: {
                        kd_jns_karyawan: kd_jns_karyawan
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabeljk.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-jk');
    if (!btn) return;
    const modalEditJk = new bootstrap.Modal(document.getElementById('modal-edit-jk'));
    modalEditJk.show();
    const kd_jns_karyawan = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_pegawai_jns_karyawan', {
        params: {
            kd_jns_karyawan: kd_jns_karyawan
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-jk').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-jk').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_pegawai_jns_karyawan', {
        kd_jns_karyawan: document.getElementById('edit-kode-jk').value,
        nm_jns_karyawan: document.getElementById('edit-nama-jk').value
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
        tabeljk.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
