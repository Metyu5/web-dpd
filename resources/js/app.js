import './bootstrap';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';

window.Swal = Swal;
window.notyf = new Notyf({
    position: {
        x: 'right',
        y: 'bottom',
    },
});
