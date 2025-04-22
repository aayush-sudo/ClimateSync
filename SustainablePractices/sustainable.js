document.addEventListener("DOMContentLoaded", function() {
  const citySelect = document.getElementById("citySelect");
  const resultsDiv = document.getElementById("results");

  citySelect.addEventListener("change", function() {
      const selectedCity = citySelect.value;
      if (!selectedCity) return;

      fetch(`sustainable.php?city=${encodeURIComponent(selectedCity)}`)
          .then(response => response.json())
          .then(data => {
              resultsDiv.innerHTML = "";
              if (data.error) {
                  resultsDiv.innerHTML = "<p class='text-center text-danger'>No data found for this city.</p>";
                  return;
              }

              resultsDiv.innerHTML = `
                  <div class="col-md-4">
                      <div class="card shadow-sm p-3">
                          <h5 class="card-title">${data.practice1_title}</h5>
                          <p class="card-text">${data.practice1_description}</p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow-sm p-3">
                          <h5 class="card-title">${data.practice2_title}</h5>
                          <p class="card-text">${data.practice2_description}</p>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="card shadow-sm p-3">
                          <h5 class="card-title">${data.practice3_title}</h5>
                          <p class="card-text">${data.practice3_description}</p>
                      </div>
                  </div>
              `;
          })
          .catch(error => console.error("Error fetching data:", error));
  });
});
