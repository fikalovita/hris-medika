import axios from 'axios';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
document.getElementById('btn-login').addEventListener('click', function (e) {
    axios.post('http://127.0.0.1:8000/api/login', {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value
    }, {

        headers: {
            Accept: 'application/json'
        }

    }).then(function (response) {
        localStorage.setItem('user', JSON.stringify(response.data.data))
        localStorage.setItem('token', JSON.stringify(response.data.token))
        localStorage.setItem('pegawai', JSON.stringify(response.data.pegawai))

        window.location.href = 'http://127.0.0.1:8000/dashboard'

        

    }).catch((err) => {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: err.response.data.message,
        });
    });
})
