document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".form-step");
    let currentStep = 0;
    steps[currentStep].classList.remove("d-none");
    steps[currentStep].classList.add("active");
    const nextBtns = document.querySelectorAll(".next-btn");
    const prevBtns = document.querySelectorAll(".prev-btn");

    const progressBarFill = document.getElementById("progressBarFill");


    function validateStep(step) {
        const inputs = step.querySelectorAll("input, select, textarea");
  
        for (const input of inputs) {
            if (input.type === "radio") {
                const name = input.name;
                const radios = step.querySelectorAll(`input[name="${name}"]`);
                if (![...radios].some(radio => radio.checked)) {
                    alert("Please select an option before proceeding.");
                    return false;
                }
            }
            if (input.type === "email") {
                const emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/;
                const invalidChars = /[!#$%^&*(),?":{}|<>]/; 
                if (!emailPattern.test(input.value) || invalidChars.test(input.value)) {
                    alert("Please enter a valid email in the format 'example@domain.com' without special characters.");
                    return false;
                }
            }
          
            if (!input.checkValidity()) {
                input.reportValidity();
                return false;
            }
        }
        return true;
    }

    nextBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const currentFieldset = steps[currentStep];
            if (!validateStep(currentFieldset)) return;

            currentFieldset.classList.add("d-none");
            currentFieldset.classList.remove("active");
            currentStep++;
            steps[currentStep].classList.remove("d-none");
            steps[currentStep].classList.add("active");
            updateProgressBar();
        });
    });

    prevBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            steps[currentStep].classList.add("d-none");
            steps[currentStep].classList.remove("active");
            currentStep--;
            steps[currentStep].classList.remove("d-none");
            steps[currentStep].classList.add("active");
            updateProgressBar();
        });
    });

    function updateProgressBar() {
        const totalSteps = steps.length;
        const percent = ((currentStep + 1) / totalSteps) * 100;
        progressBarFill.style.width = percent + "%";
        progressBarFill.textContent = "Step " + (currentStep + 1) + " of " + totalSteps;

    }
});