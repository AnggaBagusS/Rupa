import './bootstrap';
import 'preline';
import Swal from 'sweetalert2';
import 'sweetalert2';

window.Swal = Swal

document.addEventListener('livewire:navigated', () => { 
    window.HSStaticMethods.autoInit();
})