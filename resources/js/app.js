import 'bootstrap';
import '@fortawesome/fontawesome-free/css/all.min.css';

document.addEventListener("DOMContentLoaded", function() {
    let titleElements = document.getElementsByClassName('truncateTitlecard-title');
    let descriptionElements = document.getElementsByClassName('truncateDescription');

    function truncateDescription(description) {
        if (description.length > 18) {
            return description.substring(0, 18) + '...';
        } else {
            return description;
        }
    }

    function truncateTitle(title) {
        if (title.length > 20) {
            return title.substring(0, 17) + '...';
        } else {
            return title;
        }
    }

    Array.from(titleElements).forEach(element => {
        element.textContent = truncateTitle(element.textContent);
    });

    Array.from(descriptionElements).forEach(element => {
        element.textContent = truncateDescription(element.textContent);
    });
});

document.getElementById('backToTop').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'  // Questo aggiunge un effetto di scorrimento animato
    });
});






