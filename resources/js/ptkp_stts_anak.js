import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';

//bidang trigger
document.getElementById("btn-modal-ptkp").addEventListener("click", function (e) {
    e.preventDefault();
    const modalptkp = new bootstrap.Modal(document.getElementById('modal-ptkp'));
    modalptkp.show();
});
const tabelptkp= $('#tabel-ptkp').DataTable({
    responsive: {
        // details: {
        //     display: $.fn.dataTable.Responsive.display.childRowImmediate,
        //     type: ''
        // }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/ptkp_stts_anak',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'kd_ptkp'
        },
        {
            data: 'nm_ptkp'
        },
        {
            data: null,
            render: function (data) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-ptkp"  data-id=${data.kd_ptkp}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-ptkp" data-id=${data.kd_ptkp}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
document.getElementById('submit-ptkp').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_ptkp_stts_anak', {
                kd_ptkp: document.getElementById('kode-ptkp').value,
                nm_ptkp: document.getElementById('nama-ptkp').value
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
            tabelptkp.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-ptkp');
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
            const kd_ptkp = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_ptkp_stts_anak', {
                    params: {
                        kd_ptkp: kd_ptkp
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelptkp.ajax.reload(null, false);
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
    const btn = e.target.closest('.btn-edit-ptkp');
    if (!btn) return;
    const modalEditptkp = new bootstrap.Modal(document.getElementById('modal-edit-ptkp'));
    modalEditptkp.show();
    const kd_ptkp = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_ptkp_stts_anak', {
        params: {
            kd_ptkp: kd_ptkp
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-ptkp').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-ptkp').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_ptkp_stts_anak', {
        kd_ptkp: document.getElementById('edit-kode-ptkp').value,
        nm_ptkp: document.getElementById('edit-nama-ptkp').value
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
        tabelptkp.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
