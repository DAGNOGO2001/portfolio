/* =====================================================
   MENU MOBILE
===================================================== */

const menuToggle = document.getElementById("menu-toggle");
const navMenu = document.getElementById("nav-menu");

if (menuToggle && navMenu) {

    menuToggle.addEventListener("click", () => {

        navMenu.classList.toggle("active");

        const icon = menuToggle.querySelector("i");

        if (navMenu.classList.contains("active")) {
            icon.classList.remove("bi-list");
            icon.classList.add("bi-x-lg");
        } else {
            icon.classList.remove("bi-x-lg");
            icon.classList.add("bi-list");
        }

    });

}


/* =====================================================
   FERMER LE MENU APRÈS AVOIR CLIQUÉ SUR UN LIEN
===================================================== */

const navLinks = document.querySelectorAll(".nav-link");

navLinks.forEach(link => {

    link.addEventListener("click", () => {

        if (navMenu) {
            navMenu.classList.remove("active");
        }

        const icon = menuToggle?.querySelector("i");

        if (icon) {
            icon.classList.remove("bi-x-lg");
            icon.classList.add("bi-list");
        }

    });

});


/* =====================================================
   NAVIGATION ACTIVE AU DÉFILEMENT
===================================================== */

const sections = document.querySelectorAll("section[id]");

function updateActiveLink() {

    const scrollPosition = window.scrollY + 150;

    sections.forEach(section => {

        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute("id");

        if (
            scrollPosition >= sectionTop &&
            scrollPosition < sectionTop + sectionHeight
        ) {

            navLinks.forEach(link => {
                link.classList.remove("active");
            });

            const activeLink = document.querySelector(
                `.nav-link[href="#${sectionId}"]`
            );

            if (activeLink) {
                activeLink.classList.add("active");
            }

        }

    });

}

window.addEventListener("scroll", updateActiveLink);


/* =====================================================
   BOUTON RETOUR EN HAUT
===================================================== */

const backToTop = document.getElementById("back-to-top");

if (backToTop) {

    window.addEventListener("scroll", () => {

        if (window.scrollY > 500) {

            backToTop.classList.add("show");

        } else {

            backToTop.classList.remove("show");

        }

    });


    backToTop.addEventListener("click", () => {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });

}


/* =====================================================
   ANIMATION DES ÉLÉMENTS AU DÉFILEMENT
===================================================== */

const animatedElements = document.querySelectorAll(
    ".skill-card, .project-card, .timeline-item, .education-card, .contact-form"
);

const observer = new IntersectionObserver(
    (entries, observer) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";

                observer.unobserve(entry.target);

            }

        });

    },
    {
        threshold: 0.15
    }
);


animatedElements.forEach(element => {

    element.style.opacity = "0";
    element.style.transform = "translateY(30px)";
    element.style.transition =
        "opacity 0.6s ease, transform 0.6s ease";

    observer.observe(element);

});


/* =====================================================
   FORMULAIRE DE CONTACT
===================================================== */

const contactForm = document.getElementById("contact-form");

if (contactForm) {

    contactForm.addEventListener("submit", function (event) {

        event.preventDefault();

        const nom = document.getElementById("nom").value.trim();
        const email = document.getElementById("email").value.trim();
        const sujet = document.getElementById("sujet").value.trim();
        const message = document.getElementById("message").value.trim();


        if (!nom || !email || !sujet || !message) {

            alert("Veuillez remplir tous les champs.");

            return;
        }


        /*
         * Pour l'instant, le formulaire ne possède
         * pas encore de serveur.
         *
         * Nous connecterons plus tard le formulaire
         * à un service d'envoi d'e-mails ou à PHP.
         */

        const mailtoLink =
            `mailto:tchadagnogo@gmail.com` +
            `?subject=${encodeURIComponent(sujet)}` +
            `&body=${encodeURIComponent(
                `Bonjour,\n\n` +
                `Nom : ${nom}\n` +
                `Email : ${email}\n\n` +
                `Message :\n${message}`
            )}`;

        window.location.href = mailtoLink;

    });

}


/* =====================================================
   ANNÉE AUTOMATIQUE DU FOOTER
===================================================== */

const currentYear = new Date().getFullYear();

const footerText = document.querySelector(".footer p");

if (footerText) {

    footerText.innerHTML =
        `© ${currentYear} <strong>Dagnogo Tchabouan</strong>. ` +
        `Tous droits réservés.`;

}


/* =====================================================
   EFFET SUR LA NAVBAR AU DÉFILEMENT
===================================================== */

const header = document.querySelector(".header");

window.addEventListener("scroll", () => {

    if (!header) return;

    if (window.scrollY > 50) {

        header.style.boxShadow =
            "0 5px 20px rgba(15, 23, 42, 0.08)";

    } else {

        header.style.boxShadow = "none";

    }

});