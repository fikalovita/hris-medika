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
            render: function (data, type, row) {
                return `
                <button type="button" class="btn btn-danger btn-sm btn-delete-pegawai" data-id="${data.id}"><i class="ti ti-trash"></i></button>
                <button type="button" class="btn btn-warning btn-sm" ><i class="ti ti-edit-circle" data-id="${data.id}"></i></button>
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
// select option perusahaan
async function perusahaan() {
    try {
        const res = await axios.get(urlPerusahaan);
        const data = res.data.data;
        const select = document.getElementById('perusahaan');
        select.innerHTML = '<option value="">-- Pilih Perusahaan --</option>';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.kd_perusahaan;
            option.textContent = item.nm_perusahaan;
            select.appendChild(option);
        });

    } catch (err) {
        console.error(err);
    }
}
perusahaan();
// select option jenis role
async function role() {
    try {
        const res = await axios.get(urlRole);
        const data = res.data.data;
        const select = document.getElementById('role');
        select.innerHTML = '<option value="">-- Pilih Level Manager --</option>';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.kd_lvl;
            option.textContent = item.nm_lvl;
            select.appendChild(option);
        });

    } catch (err) {
        console.error(err);
    }
}
role();
async function manager() {
    try {
        const res = await axios.get(urlManager);
        const data = res.data.data;
        const select = document.getElementById('manager');
        select.innerHTML = '<option value="">-- Pilih Manager --</option>';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.nrp;
            option.textContent = item.nm_pegawai;
            select.appendChild(option);
        });

    } catch (err) {
        console.error(err);
    }
}
manager();
async function provinsi() {
    try {
        const res = await axios.get(urlProvinsi);
        const data = res.data
        const select = document.getElementById('provinsi');
        select.innerHTML = '<option value="">-- Pilih Provinsi --</option>';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item.kd_provinsi;
            option.textContent = item.nm_provinsi;
            select.appendChild(option);
        });

    } catch (err) {
        console.error(err);
    }
}
provinsi();
async function kabupaten() {
    document.getElementById('provinsi').addEventListener('change', function () {
        const kd_provinsi = this.value;
        const kabupaten = document.getElementById('kabupaten');
        if (!kd_provinsi) {
            kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
            return;
        }

        axios.get(`${urlKabupaten}/${kd_provinsi}`)
            .then(res => {
                kabupaten.innerHTML = '<option value="">-- Pilih Kabupaten --</option>';
                res.data.forEach(item => {
                    kabupaten.innerHTML += `
                    <option value="${item.kd_kabupaten}">
                        ${item.nm_kabupaten}
                    </option>
                `;
                });
            })
            .catch(err => {
                console.error(err);
                kabupaten.innerHTML = '<option>Error load data</option>';
            });
    })
}
kabupaten();
async function kecamatan() {
    document.getElementById('kabupaten').addEventListener('change', function () {
        const kd_kabupaten = this.value;
        const kecamatan = document.getElementById('kecamatan');
        if (!kd_kabupaten) {
            kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
            return;
        }
        axios.get(`${urlKecamatan}/${kd_kabupaten}`)
            .then(res => {
                kecamatan.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';
                res.data.forEach(item => {
                    kecamatan.innerHTML += `
                    <option value="${item.kd_kecamatan}">
                        ${item.nm_kecamatan}
                    </option>
                `;
                });
            })
            .catch(err => {
                console.error(err);
                kecamatan.innerHTML = '<option>Error load data</option>';
            });
    })
}
kecamatan();
async function kelurahan() {
    document.getElementById('kecamatan').addEventListener('change', function () {
        const kd_kecamatan = this.value;
        const kelurahan = document.getElementById('kelurahan');
        if (!kd_kecamatan) {
            kelurahan.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
            return;
        }
        axios.get(`${urlKelurahan}/${kd_kecamatan}`)
            .then(res => {
                kelurahan.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';
                res.data.forEach(item => {
                    kelurahan.innerHTML += `
                    <option value="${item.kd_kelurahan}">
                        ${item.nm_kelurahan}
                    </option>
                `;
                });
            })
            .catch(err => {
                console.error(err);
                kelurahan.innerHTML = '<option>Error load data</option>';
            });
    })
}
kelurahan();

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-edit-pegawai');
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
