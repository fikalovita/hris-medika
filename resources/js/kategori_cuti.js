import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
document.getElementById("btn-modal-kategori").addEventListener("click", function (e) {
    e.preventDefault();
    const modalKategori = new bootstrap.Modal(document.getElementById('modal-kategori'));
    modalKategori.show();
});
const tabelKategori = $('#tabel-kategori').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/kategori',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_kategori'
        },
        {
            data: 'nm_kategori'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-kategori"  data-id=${data.kd_kategori}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-kategori" data-id=${data.kd_kategori}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-kategori').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_kategori', {
                kd_kategori: document.getElementById('kd_kategori').value,
                nm_kategori: document.getElementById('nm_kategori').value
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
            tabelKategori.ajax.reload();
        })
        .catch(function (error) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: error.response.data.message,
            });
        });
})

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-kategori');
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
            const kd_kategori = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_kategori', {
                    params: {
                        kd_kategori: kd_kategori
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelKategori.ajax.reload(null, false);
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
    })

})

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-edit-kategori');
    if (!btn) return;
    const modalEditKategori = new bootstrap.Modal(document.getElementById('modal-edit-kategori'));
    modalEditKategori.show();
    const kd_kategori = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_kategori', {
        params: {
            kd_kategori: kd_kategori
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-kategori').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-kategori').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_kategori', {
        kd_kategori: document.getElementById('edit_kd_kategori').value,
        nm_kategori: document.getElementById('edit_nm_kategori').value
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
        tabelKategori.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})