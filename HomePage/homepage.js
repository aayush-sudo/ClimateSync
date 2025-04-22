document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('nav ul li a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    const header = document.getElementById('main-header');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            header.style.background = 'rgba(0, 0, 0, 0.7)';
        } else {
            header.style.background = 'rgba(0, 0, 0, 0.4)';
        }
    });

    
    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
        themeToggle.textContent = document.body.classList.contains('dark-mode') ? '☀' : '🌙';
    });

    const text = "Welcome to ClimateSync";
    let index = 0;
    function typeEffect() {
        if (index < text.length) {
            document.getElementById("typing-text").textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 100);
        }
    }
    typeEffect();

    const fadeElements = document.querySelectorAll('.fade-in');
    function revealOnScroll() {
        fadeElements.forEach(element => {
            const position = element.getBoundingClientRect().top;
            if (position < window.innerHeight - 50) {
                element.classList.add('visible');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll();

    const backToTop = document.getElementById("back-to-top");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            backToTop.style.display = "block";
        } else {
            backToTop.style.display = "none";
        }
    });
    backToTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });


});
