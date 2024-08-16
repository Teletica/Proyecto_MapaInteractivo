
$(document).ready(function() {

    $('#title').hover(
        function() {
            $(this).data("originalText", $(this).text());
            $(this).html('TURISMO <span class="verde">PURA VIDA</span>');
        },
        function() {
            $(this).html($(this).data("originalText"));
        }
    );

});


document.addEventListener("DOMContentLoaded", function() {
    // Añadir desplazamiento suave al hacer clic en los botones
    document.querySelectorAll('.boton-redondo').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            window.scrollTo({
                top: targetSection.offsetTop,
                behavior: 'smooth'
            });
        });
    });

    // Hacer el scroll más llamativo
    const sections = document.querySelectorAll('.section');
    const observerOptions = {
        root: null,
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            } else {
                entry.target.classList.remove('in-view');
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});
