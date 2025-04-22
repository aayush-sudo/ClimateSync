document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const section = urlParams.get("section");
  
    if (section) {
      const targetSection = document.getElementById(`${section}-section`);
      if (targetSection) {
        targetSection.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    }
  
    const sections = document.querySelectorAll('.admin-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, {
      threshold: 0.1
    });
  
    sections.forEach(section => {
      section.classList.add('hidden');
      observer.observe(section);
    });
  });
  