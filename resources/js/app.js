import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// repupero pulsanti dalla tabella
const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach((button) => {
    button.addEventListener('click', function(){
        let slug = button.getAttribute('data-slug');
        let path = button.getAttribute('data-path');

        let text_modal = document.getElementById('custom-message-modal');

        if (path == 'types') {
            text_modal.textContent = 'tipo';
        }
        else{
            text_modal.textContent = 'progetto';
        }

        let url = `${window.location.origin}/admin/${path}/${slug}`;

        let form_delete = document.getElementById('form-delete');

        form_delete.setAttribute('action', url);
    })
})
