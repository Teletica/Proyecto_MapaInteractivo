
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
<<<<<<< Updated upstream
=======
<<<<<<< HEAD


document.addEventListener("DOMContentLoaded", function() {
    const backButton = document.querySelector(".back-button-emoji");

    backButton.addEventListener("click", function(event) {
        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const linksToHome = document.querySelectorAll(".back-home");

    linksToHome.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            document.body.classList.add("zoom-out");

            setTimeout(() => {
                window.location.href = this.href;
            }, 1000); // Espera a que termine la animación antes de redirigir
        });
    });
});
=======
>>>>>>> 6461874d79fbab259b780c31c1eb56cf9293f215
>>>>>>> Stashed changes
