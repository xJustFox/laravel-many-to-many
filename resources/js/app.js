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

        switch (path) {
            case 'types':
                text_modal.textContent = 'questo tipo';
                break;
            case 'projects':
                text_modal.textContent = 'questo progetto';
                break;
            case 'technologies':
                text_modal.textContent = 'questa tecnologia';
                break;
        
            default:
                break;
        }

        let url = `${window.location.origin}/admin/${path}/${slug}`;

        let form_delete = document.getElementById('form-delete');

        form_delete.setAttribute('action', url);
    })
})
