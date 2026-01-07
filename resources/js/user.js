import axios from 'axios';
import Swal from 'sweetalert2';
const user = JSON.parse(localStorage.getItem('user'));
const token = JSON.parse(localStorage.getItem('token'));
//bidang trigger
document.getElementById("btn-modal-user").addEventListener("click", function (e) {
    e.preventDefault();
    const modalUser = new bootstrap.Modal(document.getElementById('modal-user'));
    modalUser.show();
});
const tabelUser = $('#tabel-user').DataTable({
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
        }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/user',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    },  
    processing: true,
    serverSide: true,
    columns: [{
            data: 'email'
        },
        {
            data: 'password'
        },
        {
            data: 'role_user.nama_role'
        },
        {
            data: null,
            render: function (data) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-user"  data-id=${data.id}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-user" data-id=${data.id}><i class="ti ti-edit-circle"></i></button>
                `
            },
        },
    ],
});
axios.get('http://127.0.0.1:8000/api/role', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(function (response) {
        console.log(response.data)
        console.log(response.data)
        const select = document.getElementById('role-id');
        const data = response.data;

        data.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.id_role;
            option.text = item.nama_role;
            select.appendChild(option);
        });
    })
    .catch(function (error) {
        console.log(error);
    });
axios.get('http://127.0.0.1:8000/api/pegawai', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(function (response) {
        console.log(response.data.data)
        const select = document.getElementById('name-user');
        const data = response.data.data;

        data.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.nrp;
            option.text = item.nm_pegawai + ' ' + item.nm_pegawai_tmb;
            select.appendChild(option);
        });
    })
    .catch(function (error) {
        console.log(error);
    });

document.getElementById('submit-user').addEventListener('click', function (e) {
    e.preventDefault();
    axios.post(
            'http://127.0.0.1:8000/api/add_user', {
                nrp: document.getElementById('name-user').value,
                email: document.getElementById('user-email').value,
                password: document.getElementById('user-password').value,
                role_id: document.getElementById('role-id').value
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
            tabelUser.ajax.reload();
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
    const btn = e.target.closest('.btn-delete-user');
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
            const id_user = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_user', {
                    params: {
                        id: id_user
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
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    tabelUser.ajax.reload(null, false);
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
axios.get('http://127.0.0.1:8000/api/role', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(function (response) {
        console.log(response.data)
        console.log(response.data)
        const select = document.getElementById('edit-role-id');
        const data = response.data;

        data.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.id_role;
            option.text = item.nama_role;
            select.appendChild(option);
        });
    })
axios.get('http://127.0.0.1:8000/api/pegawai', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    })
    .then(function (response) {
        console.log(response.data.data)
        const select = document.getElementById('edit-name-user');
        const data = response.data.data;

        data.forEach(function (item) {
            const option = document.createElement('option');
            option.value = item.nrp;
            option.text = item.nm_pegawai + ' ' + item.nm_pegawai_tmb;
            select.appendChild(option);
        });
    })
    .catch(function (error) {
        console.log(error);
    });
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-edit-user');
    if (!btn) return;
    const modalEditBidang = new bootstrap.Modal(document.getElementById('modal-edit-user'));
    modalEditBidang.show();
    const id_user = btn.getAttribute('data-id');
    axios.get('http://127.0.0.1:8000/api/detail_user', {
        params: {
            id: id_user
        },
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    }).then(response => {
        const data = response.data;
        document.querySelectorAll('.edit-user').forEach(field => {
            const key = field.dataset.key;

            if (data[key] !== undefined) {
                field.value = data[key];
            }
        });
    })
});
document.getElementById('btn-update-user').addEventListener('click', function () {
    axios.put('http://127.0.0.1:8000/api/update_user', {
        id: document.getElementById('edit-user-id').value,
        nrp: document.getElementById('edit-name-user').value,
        email: document.getElementById('edit-user-email').value,
        password: document.getElementById('edit-user-password').value,
        role_id: document.getElementById('edit-role-id').value,

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
        tabelUser.ajax.reload();
    }).catch(error => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    })
})
