import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
//bidang trigger
document.getElementById("btn-modal-umur").addEventListener("click", function (e) {
    e.preventDefault();
    const modalKelUmur = new bootstrap.Modal(document.getElementById('modal-umur'));
    modalKelUmur.show();
});
const tabelKelUmur = $('#tabel-kel-umur').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/kelompok_umur',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_kelompok_umur'
        },
        {
            data: 'nm_kelompok_umur'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-umur"  data-id=${data.kd_kelompok_umur}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-umur" data-id=${data.kd_kelompok_umur}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-kel-umur').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_kelompok_umur', {
                kd_kelompok_umur: document.getElementById('kode-kel-umur').value,
                nm_kelompok_umur: document.getElementById('nama-kel-umur').value
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
            tabelKelUmur.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-umur');
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
            const kd_kelompok_umur = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_kelompok_umur', {
                    params: {
                        kd_kelompok_umur: kd_kelompok_umur
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelKelUmur.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-umur');
    if (!btn) return;
    const modalEditUmur = new bootstrap.Modal(document.getElementById('modal-edit-umur'));
    modalEditUmur.show();
    const kd_kelompok_umur = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_kelompok_umur', {
        params: {
            kd_kelompok_umur: kd_kelompok_umur
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-kel-umur').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-umur').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_kelompok_umur', {
        kd_kelompok_umur: document.getElementById('edit-kode-umur').value,
        nm_kelompok_umur: document.getElementById('edit-nama-umur').value
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
        tabelKelUmur.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
