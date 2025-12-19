import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

//bidang trigger
document.getElementById("btn-modal-perusahaan").addEventListener("click", function (e) {
    // e.preventDefault();
    const modalperusahaan = new bootstrap.Modal(document.getElementById('modal-perusahaan'));
    modalperusahaan.show();
});
const tabelperusahaan= $('#tabel-perusahaan').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/perusahaan',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_perusahaan'
        },
        {
            data: 'nm_perusahaan'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-perusahaan"  data-id=${data.kd_perusahaan}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-perusahaan" data-id=${data.kd_perusahaan}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-perusahaan').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_perusahaan', {
                nm_perusahaan: document.getElementById('nama-perusahaan').value
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
            tabelperusahaan.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-perusahaan');
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
            const kd_perusahaan = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_perusahaan', {
                    params: {
                        kd_perusahaan: kd_perusahaan
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelperusahaan.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-perusahaan');
    if (!btn) return;
    const modalEditperusahaan = new bootstrap.Modal(document.getElementById('modal-edit-perusahaan'));
    modalEditperusahaan.show();
    const kd_perusahaan = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_perusahaan', {
        params: {
            kd_perusahaan: kd_perusahaan
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-perusahaan').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-perusahaan').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_perusahaan', {
        kd_perusahaan: document.getElementById('edit-kode-perusahaan').value,
        nm_perusahaan: document.getElementById('edit-nama-perusahaan').value
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
        tabelperusahaan.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
