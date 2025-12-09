import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
//bidang trigger
document.getElementById("btn-modal-posisi").addEventListener("click", function (e) {
    e.preventDefault();
    const modalBidang = new bootstrap.Modal(document.getElementById('modal-posisi'));
    modalBidang.show();
});
const tabelPosisi = $('#tabel-posisi').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/posisi',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_posisi'
        },
        {
            data: 'nm_posisi'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-posisi"  data-id=${data.kd_posisi}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-posisi" data-id=${data.nm_posisi}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-posisi').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_posisi', {
                nm_posisi: document.getElementById('nama-posisi').value
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
            tabelBidang.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-posisi');
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
            const kd_posisi = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_posisi', {
                    params: {
                        kd_posisi: kd_posisi
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelPosisi.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-bidang');
    if (!btn) return;
    const modalEditBidang = new bootstrap.Modal(document.getElementById('modal-edit-posisi'));
    modalEditBidang.show();
    const kd_bidang = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_bidang', {
        params: {
            kd_bidang: kd_bidang
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-posisi').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-bidang').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_bidang', {
        kd_bidang: document.getElementById('edit-kode-posisi').value,
        nm_bidang: document.getElementById('edit-nama-posisi').value
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
        tabelBidang.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
