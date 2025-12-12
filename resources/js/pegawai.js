import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
import axios from 'axios';
window.Swal = Swal;
const tabelPegawai = $('#new-cons').DataTable({
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
        }
    },
    ajax: {
        type: 'get',
        url: 'http://127.0.0.1:8000/api/pegawai',
    },
    processing: true,
    serverSide: true,
    columns: [{
            data: 'nrp'
        },
        {
            data: 'nm_pegawai'
        },
        {
            data: 'jk'
        },
        {
            data: 'email_utama'
        },
        {
            data: 'pekerja_aktif'
        },
        {
            data: null,
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete" id="btn-delete-${data.id}" data-id="${data.id}"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm" ><i class="ti ti-edit-circle"></i></button>
                <button type="button" class="btn btn-success btn-sm"><i class="ti ti-file-search"></i></button>
                `
            }
        }
    ]
});

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete');
    if (btn) {
        const id = btn.getAttribute('data-id');
        axios.delete('http://127.0.0.1:8000/api/delete_pegawai', {
                data: {
                    id: id
                }
            })
            .then(response => {
                alert(response.data.message);
                tabelPegawai.ajax.reload(null, false);
            })
            .catch(error => {
                alert('Error deleting item:', error);
            });
    }
});


