import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
window.Swal = Swal;
const tabelPegawai = $('#new-cons').DataTable({
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
          }
        },
        ajax:{
          type:'get',
          url:'http://127.0.0.1:8000/api/pegawai',
        },
        processing: true,
        serverSide: true,
        columns: [
            { data: 'nrp' },
            { data: 'nm_pegawai' },
            { data: 'jk' },
            { data: 'email_utama' },
            { data: 'pekerja_aktif' },
            {data: null,
              render: function(data, type, row){
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete" id="btn-delete-${data.id}" data-id="${data.id}"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm" ><i class="ti ti-edit-circle"></i></button>
                <button type="button" class="btn btn-success btn-sm"><i class="ti ti-file-search"></i></button>
                `
              }
            }
        ]
      });

document.addEventListener('click', function(e){
    const btn = e.target.closest('.btn-delete');
    if (btn) {
         const id = btn.getAttribute('data-id');
         axios.delete('http://127.0.0.1:8000/api/delete_pegawai', {data: {id: id}})
    .then(response => {
        alert(response.data.message);
         tabelPegawai.ajax.reload(null, false);
    })
    .catch(error => {
        alert('Error deleting item:', error);
    });
    }
});

//bidang trigger
document.getElementById("btn-modal-bidang2").addEventListener("click", function (e) {
  e.preventDefault();
  const modalBidang = new bootstrap.Modal(document.getElementById('modal-bidang'));
  modalBidang.show();
});
document.getElementById("btn-bidang").addEventListener("click", function (e) {
  e.preventDefault();
  const modalBidang2 = new bootstrap.Modal(document.getElementById('modal-bidang-2'));
  modalBidang2.show();
});
document.getElementById("btn-modal-bidang").addEventListener("click", function (e) {
  e.preventDefault();
  const modalBidang = new bootstrap.Modal(document.getElementById('modal-bidang'));
  modalBidang.show();
});

const tabelBidang = $('#tabel-bidang').DataTable({
        responsive: {
          details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate,
            type: ''
          }
        },
        ajax:{
          type:'get',
          url:'http://127.0.0.1:8000/api/bidang',
        },
        processing: true,
        serverSide: true,
        columns: [
            { data: 'kd_bidang' },
            { data: 'nm_bidang' },
            {data: null,
              render: function(data, type, row){
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-bidang"  data-id=${data.kd_bidang}><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-bidang"><i class="ti ti-edit-circle"></i></button>
                <button type="button" class="btn btn-success btn-sm"><i class="ti ti-file-search"></i></button>
                `
      },
    },
  ],
});
document.getElementById('submit-bidang').addEventListener('click', function (e) {
  e.preventDefault();
  axios.post(
    'http://127.0.0.1:8000/api/add_bidang',
    {
      kd_bidang: document.getElementById('kode-bidang').value,
      nm_bidang: document.getElementById('nama-bidang').value
    },
    {
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
    console.log(error.response.data);
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: error.response.data.message,
    });
  });
});
document.addEventListener('click', function(e){
  const btn = e.target.closest('.btn-delete-bidang');
  
  if (btn) {
    const kd_bidang = btn.getAttribute('data-id');
         axios.delete('http://127.0.0.1:8000/api/delete_bidang', {data: {kd_bidang: kd_bidang}})
    .then(response => {
          Swal.fire({
            position: "center",
            icon: "success",
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500
          });
         tabelBidang.ajax.reload(null, false);
    })
    .catch(error => {
      if (error.response.status === 409) {
        Swal.fire({
      icon: "error",
      title: "Oops...",
      text: error.response.data.message,
    });
      }
      //  console.log(error.response.status === 409)
    });
    // Swal.fire({
    //   position: "center",
    //   icon: "success",
    //   title: "Your work has been saved",
    //   showConfirmButton: false,
    //   timer: 1500
    // });
  }
});



