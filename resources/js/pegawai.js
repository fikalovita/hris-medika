import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
import axios from 'axios';
window.Swal = Swal;
// url untuk get data option dari database
const urlKelompokUmur = 'http://127.0.0.1:8000/api/kelompok_umur';
const urlBidang = 'http://127.0.0.1:8000/api/bidang';
const urlPosisi = 'http://127.0.0.1:8000/api/posisi';
const urlgolPekerjaan = 'http://127.0.0.1:8000/api/pegawai_gol_pekerjaan';
const urlPtkpSttsAnak = 'http://127.0.0.1:8000/api/ptkp_stts_anak';
const urlKelGolPekerjaan = 'http://127.0.0.1:8000/api/pegawai_kel_gol_pekerjaan';
const urlJenisPekerjaan = 'http://127.0.0.1:8000/api/pegawai_jns_pekerjaan';
const urlJenisKaryawan = 'http://127.0.0.1:8000/api/pegawai_jns_karyawan';
// tabel list data pegawai
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
// hapus data pegawai
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
// select option kelompok umur
async function loadKelompokUmur() {
  try {
    const res = await axios.get(urlKelompokUmur);
    const data = res.data.data;

    const select = document.getElementById('kelompok_umur');
    select.innerHTML = '<option value="">-- Pilih Kelompok Umur --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_kelompok_umur;
      option.textContent = item.nm_kelompok_umur;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
loadKelompokUmur();
// select option bidang
async function bidang() {
  try {
    const res = await axios.get(urlBidang);
    const data = res.data.data;

    const select = document.getElementById('bidang');
    select.innerHTML = '<option value="">-- Pilih Bidang --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_bidang;
      option.textContent = item.nm_bidang;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}

bidang();
// select option posisi
async function posisi() {
  try {
    const res = await axios.get(urlPosisi);
    const data = res.data.data;

    const select = document.getElementById('posisi');
    select.innerHTML = '<option value="">-- Pilih Posisi --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_posisi;
      option.textContent = item.nm_posisi;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
posisi();
// select option golongan pekrjaan
async function golPekerjaan() {
  try {
    const res = await axios.get(urlgolPekerjaan);
    const data = res.data.data;

    const select = document.getElementById('gol-pekerjaan');
    select.innerHTML = '<option value="">-- Pilih Golongan Pekerjaan --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_gol_pekerjaan;
      option.textContent = item.nm_gol_pekerjaan;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}

golPekerjaan();
// select option PTKP status anak
async function ptkpSttsAnak() {
  try {
    const res = await axios.get(urlPtkpSttsAnak);
    const data = res.data.data;

    const select = document.getElementById('ptkp-stts-anak');
    select.innerHTML = '<option value="">-- Pilih Status PTKP Anak --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_ptkp;
      option.textContent = item.nm_ptkp;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
ptkpSttsAnak();
// select option kelompok gol pekerjaan
async function kelGolPekerjaan() {
  try {
    const res = await axios.get(urlKelGolPekerjaan);
    const data = res.data.data;

    const select = document.getElementById('kel-gol-pekerjaan');
    select.innerHTML = '<option value="">-- Pilih Kelompok Golongan Pekerjaan --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_kelompok_gol_pekerjaan;
      option.textContent = item.nm_kelompok_gol_pekerjaan;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
kelGolPekerjaan();
// select option jenis pekerjaan
async function jenisPekerjaan() {
  try {
    const res = await axios.get(urlJenisPekerjaan);
    const data = res.data.data;

    const select = document.getElementById('jenis-pekerjaan');
    select.innerHTML = '<option value="">-- Pilih Jenis Pekerjaan --</option>';

    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_jns_pekerjaan;
      option.textContent = item.nm_jns_pekerjaan;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
jenisPekerjaan();
// select option jenis karyawan
async function jenisKaryawan() {
  try {
    const res = await axios.get(urlJenisKaryawan);
    const data = res.data.data;
    const select = document.getElementById('jenis-karyawan');
    select.innerHTML = '<option value="">-- Pilih Jenis Karyawan --</option>';
    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.kd_jns_karyawan;
      option.textContent = item.nm_jns_karyawan;
      select.appendChild(option);
    });

  } catch (err) {
    console.error(err);
  }
}
jenisKaryawan();

