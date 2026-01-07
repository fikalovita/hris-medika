import axios from "axios";

const getToken = localStorage.getItem('token');
const getPegawai = localStorage.getItem('pegawai');
const token = JSON.parse(getToken);
const pegawai = JSON.parse(getPegawai);
document.getElementById('nama-user').innerHTML = pegawai.nm_pegawai
document.getElementById('nama-user-modal').innerHTML = pegawai.nm_pegawai
console.log(pegawai.nm_pegawai)
document.getElementById('btn-logout').addEventListener('click', function () {
    axios.post('http://127.0.0.1:8000/api/logout', null, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token
        }
    }).then(function (response) {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('pegawai');
        window.location.replace('/auth');
    })
})
if (!token) {
    window.location.replace('/auth');
} 
