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
const urlJenisKaryawan = 'http://127.0.0.1:8000/api/pegawai_jns_karyawan';
const urlJenisPekerjaan = 'http://127.0.0.1:8000/api/pegawai_jns_pekerjaan';
const urlRole = 'http://127.0.0.1:8000/api/pegawai_lvl';
const urlManager = 'http://127.0.0.1:8000/api/pegawai';
const urlProvinsi = 'http://127.0.0.1:8000/api/provinsi';
const urlKabupaten = 'http://127.0.0.1:8000/api/kabupaten';
const urlKecamatan = 'http://127.0.0.1:8000/api/kecamatan';
const urlKelurahan = 'http://127.0.0.1:8000/api/kelurahan';
const urlPerusahaan = 'http://127.0.0.1:8000/api/perusahaan';
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
            render: function (data) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-pegawai" data-id="${data.id}"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm btn-edit-pegawai" data-id="${data.id}"><i class="ti ti-edit-circle" ></i></button>
                <button type="button" class="btn btn-success btn-sm"><i class="ti ti-file-search"></i></button>
                `
            }
        }
    ]
});
// tambah data pegawai
document.getElementById('submit-pegawai').addEventListener('click', function (e) {
    e.preventDefault();
    const formPegawai = document.getElementById('form-pegawai');
    let formData = new FormData(formPegawai)
    axios.post('http://127.0.0.1:8000/api/add_pegawai', formData, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'multipart/form-data',
        }
    }).then(function (response) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: response.data.message,
            showConfirmButton: false,
            timer: 1500
        });
        tabelPegawai.ajax.reload();
    }).catch(function (error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error.response.data.message,
        });
    });

});
// hapus data pegawai
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-pegawai');
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
            const id = btn.getAttribute('data-id');
            axios.delete('http://127.0.0.1:8000/api/delete_pegawai', {
                    params: {
                        id: id
                    }
                })
                .then(response => {
                    Swal.fire({
                        title: "Deleted!",
                        text: response.message,
                        icon: "success"
                    });
                    tabelPegawai.ajax.reload(null, false);
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

async function loadOptions(selectId, url, selectedValue = '', keyValue = 'value', keyText = 'text') {
    try {
        const select = document.getElementById(selectId);
        console.log('Element select:', select);
        if (!select) {
            console.error('Select element tidak ditemukan:', selectId);
            return;
        }

        const res = await axios.get(url);
        const data = res.data.data

        select.innerHTML = `<option value="">-- Pilih --</option>`;
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item[keyValue];
            option.textContent = item[keyText];
            select.appendChild(option);
        });
        if (selectedValue) select.value = selectedValue;
    } catch (err) {
        console.error('Gagal load options', selectId, err);
    }
}
// select option
loadOptions('kelompok_umur', urlKelompokUmur, '', 'kd_kelompok_umur', 'nm_kelompok_umur');
loadOptions('bidang', urlBidang, '', 'kd_bidang', 'nm_bidang');
loadOptions('posisi', urlPosisi, '', 'kd_posisi', 'nm_posisi');
loadOptions('gol-pekerjaan', urlgolPekerjaan, '', 'kd_gol_pekerjaan', 'nm_gol_pekerjaan');
loadOptions('ptkp-stts-anak', urlPtkpSttsAnak, '', 'kd_ptkp', 'nm_ptkp');
loadOptions('jenis-pekerjaan', urlJenisPekerjaan, '', 'kd_jns_pekerjaan', 'nm_jns_pekerjaan');
loadOptions('jenis-karyawan', urlJenisKaryawan, '', 'kd_jns_karyawan', 'nm_jns_karyawan');
loadOptions('perusahaan', urlPerusahaan, '', 'kd_perusahaan', 'nm_perusahaan');
loadOptions('role', urlRole, '', 'kd_lvl', 'nm_lvl');
loadOptions('manager', urlManager, '', 'nrp', 'nm_pegawai');
loadOptions('provinsi', urlProvinsi, '', 'kd_provinsi', 'nm_provinsi');
loadOptions('kel-gol-pekerjaan', urlKelGolPekerjaan, '', 'kd_kelompok_gol_pekerjaan', 'nm_kelompok_gol_pekerjaan');

function kabupaten() {
    document.getElementById('provinsi').addEventListener('change', function () {
        const kd_provinsi = this.value;
        const kabupaten = document.getElementById('kabupaten');
        if (!kd_provinsi) {
            kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
            return;
        }

        loadOptions('kabupaten', `${urlKabupaten}/${kd_provinsi}`, '', 'kd_kabupaten', 'nm_kabupaten');

    })
}
kabupaten();

function kecamatan() {
    document.getElementById('kabupaten').addEventListener('change', function () {
        const kd_kabupaten = this.value;
        const kecamatan = document.getElementById('kecamatan');
        if (!kd_kabupaten) {
            kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            return;
        }
        loadOptions('kecamatan', `${urlKecamatan}/${kd_kabupaten}`, '', 'kd_kecamatan', 'nm_kecamatan');
    })
}
kecamatan();

function kelurahan() {
    document.getElementById('kecamatan').addEventListener('change', function () {
        const kd_kecamatan = this.value;
        const kelurahan = document.getElementById('kelurahan');
        if (!kd_kecamatan) {
            kelurahan.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
            return;
        }
        loadOptions('kelurahan', `${urlKelurahan}/${kd_kecamatan}`, '', 'kd_kelurahan', 'nm_kelurahan');
    })
}
kelurahan();
// end select option
// edit pegawai

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-edit-pegawai');
    if (!btn) return;

    const modalEditkgp = new bootstrap.Modal(
        document.getElementById('modal-edit-pegawai')
    );
    modalEditkgp.show();

    const id = btn.getAttribute('data-id');

    axios.get('http://127.0.0.1:8000/api/detail_pegawai', {
            params: {
                id
            }
        })
        .then(async response => {
            const data = response.data;
            await Promise.all([
                loadOptions(
                    'edit-kelompok-umur',
                    urlKelompokUmur,
                    data.kd_kelompok_umur,
                    'kd_kelompok_umur',
                    'nm_kelompok_umur'
                ),
                loadOptions(
                    'edit-provinsi',
                    urlProvinsi,
                    data.kd_provinsi,
                    'kd_provinsi',
                    'nm_provinsi'
                ),
                loadOptions(
                    'edit-ptkp-stts-anak',
                    urlPtkpSttsAnak,
                    data.kd_ptkp_status_anak,
                    'kd_ptkp',
                    'nm_ptkp'
                ),
                loadOptions(
                    'edit-bidang',
                    urlBidang,
                    data.kd_bidang,
                    'kd_bidang',
                    'nm_bidang'
                ),
                loadOptions(
                    'edit-posisi',
                    urlPosisi,
                    data.kd_posisi,
                    'kd_posisi',
                    'nm_posisi'
                ),
                loadOptions(
                    'edit-perusahaan',
                    urlPerusahaan,
                    data.kd_perusahaan,
                    'kd_perusahaan',
                    'nm_perusahaan'
                ),
                loadOptions(
                    'edit-gol-pekerjaan',
                    urlgolPekerjaan,
                    data.kd_gol_pekerjaan,
                    'kd_gol_pekerjaan',
                    'nm_gol_pekerjaan'
                ),
                loadOptions(
                    'edit-jenis-pekerjaan',
                    urlJenisPekerjaan,
                    data.kd_jns_pekerjaan,
                    'kd_jns_pekerjaan',
                    'nm_jns_pekerjaan'
                ),
                loadOptions(
                    'edit-jenis-karyawan',
                    urlJenisKaryawan,
                    data.kd_jns_karyawan,
                    'kd_jns_karyawan',
                    'nm_jns_karyawan'
                ),
                loadOptions(
                    'edit-kel-gol-pekerjaan',
                    urlKelGolPekerjaan,
                    data.kd_kelompok_gol_pekerjaan,
                    'kd_kelompok_gol_pekerjaan',
                    'nm_kelompok_gol_pekerjaan'
                ),
                loadOptions(
                    'edit-role',
                    urlRole,
                    data.kd_lvl_manager,
                    'kd_lvl',
                    'nm_lvl'
                ),
                loadOptions(
                    'edit-manager',
                    urlManager,
                    data.nrp,
                    'nrp',
                    'nm_pegawai'
                ),
                
            ])

            await loadOptions(
                'edit-kabupaten',
                `${urlKabupaten}/${data.kd_provinsi}`,
                data.kd_kabupaten,
                'kd_kabupaten',
                'nm_kabupaten'
                    
            )
            await loadOptions(
                'edit-kecamatan',
                `${urlKecamatan}/${data.kd_kabupaten}`,
                data.kd_kecamatan,
                'kd_kecamatan',
                'nm_kecamatan'
                    
            )
            await loadOptions(
                'edit-kelurahan',
                `${urlKelurahan}/${data.kd_kecamatan}`,
                data.kd_kelurahan,
                'kd_kelurahan',
                'nm_kelurahan'
                    
            )

            return data;
        })
        .then(data => {
            document.querySelectorAll('.edit-pegawai').forEach(field => {
                const key = field.dataset.key;

                if (data[key] !== undefined && field.tagName !== 'SELECT') {
                    field.value = data[key];
                }
            });
        })
        .catch(err => console.error(err));
});
let currentEditId = null;

document.addEventListener('click', async function(e) {
    const btn = e.target.closest('.btn-edit-pegawai');
    if (!btn) return;

    const id = btn.getAttribute('data-id');
    currentEditId = id;

    const modal = new bootstrap.Modal(document.getElementById('modal-edit-pegawai'));
    modal.show();

    // Ambil data pegawai
    const { data } = await axios.get('http://127.0.0.1:8000/api/detail_pegawai', { params: { id } });
    
    // isi form
    document.querySelectorAll('.edit-pegawai').forEach(field => {
        const key = field.dataset.key;
        if (data[key] !== undefined) field.value = data[key];
    });

    // Load select options (misal provinsi/kabupaten/kecamatan)
    await loadOptions('edit-provinsi', urlProvinsi, data.kd_provinsi, 'kd_provinsi', 'nm_provinsi');
    await loadOptions('edit-kabupaten', `${urlKabupaten}/${data.kd_provinsi}`, data.kd_kabupaten, 'kd_kabupaten', 'nm_kabupaten');
    // ...dst
});

// Ambil modal
const modalEdit = document.getElementById('modal-edit-pegawai');

// Hapus backdrop setiap kali modal ditutup
modalEdit.addEventListener('hidden.bs.modal', function () {
    const backdrop = document.querySelectorAll('.modal-backdrop');
    backdrop.forEach(el => el.remove());
});

// Listener tombol update tetap terpisah
document.getElementById('btn-update-pegawai').addEventListener('click', async function (e) {
    e.preventDefault();
    const btn = this;
    const form = document.getElementById('form-edit-pegawai');

    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => data[key] = value);
    data.id = currentEditId;

    btn.disabled = true;
    try {
        const response = await axios.put('http://127.0.0.1:8000/api/update_pegawai', data, {
            headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' }
        });

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: response.data.message || 'Data berhasil diubah',
            showConfirmButton: false,
            timer: 1500
        });

        tabelPegawai.ajax.reload(null, false);
        // Modal tetap terbuka, jadi tidak di-hide

    } catch (error) {
        let message = 'Terjadi kesalahan';
        if (error.response?.data?.errors) {
            message = Object.values(error.response.data.errors).flat().join('\n');
        } else if (error.response?.data?.message) {
            message = error.response.data.message;
        }

        Swal.fire({ icon: 'error', title: 'Oops...', text: message });
    } finally {
        btn.disabled = false;
    }
});




