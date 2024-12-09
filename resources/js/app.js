import './bootstrap';

import Alpine from 'alpinejs';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

window.toastr = toastr

window.Alpine = Alpine;

Alpine.start();  




//dropdown utilisateur connecté
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('user-dropdown');

    if (menuButton) {
        menuButton.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });
    }

    // Ferme le dropdown si l'utilisateur clique ailleurs
    document.addEventListener('click', (event) => {
        if (!menuButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
});


//messages flash d'avertissement

document.addEventListener('DOMContentLoaded', () => {
    if (window.flashMessage) {
        const { type, message } = window.flashMessage;

        // Configure les options de Toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000"
        };

        // Affiche le message selon le type
        if (type === 'success') {
            toastr.success(message);
        } else if (type === 'error') {
            toastr.error(message);
        } else if (type === 'warning') {
            toastr.warning(message);
        } else if (type === 'info') {
            toastr.info(message);
        }
    }
});
