function fetchAQI() {
    let city = document.getElementById("cityInput").value.trim();
    if (!city) {
        alert("Please enter a city name.");
        return;
    }

    let aqiApiKey = "dc98805a7a56c06b10a11ccf5a0564225321ef02"; // AQICN API
    let weatherApiKey = "d41ec4c989434d63a7883906251003"; // WeatherAPI

    let aqiUrl = `https://api.waqi.info/feed/${city}/?token=${aqiApiKey}`;
    let weatherUrl = `https://api.weatherapi.com/v1/current.json?key=${weatherApiKey}&q=${city}`;

    Promise.all([
        fetch(aqiUrl).then(response => response.json()),
        fetch(weatherUrl).then(response => response.json())
    ])
    .then(([aqiData, weatherData]) => {
        console.log("AQI Response:", aqiData);
        console.log("WeatherAPI Response:", weatherData);

        if (aqiData.status === "ok" && weatherData.location) {
            let aqi = aqiData.data.aqi;
            let temperature = weatherData.current.temp_c ? `${weatherData.current.temp_c}°C` : "N/A";
            let category = getAQICategory(aqi);

            document.getElementById("result").innerHTML = `
                <div class="result-card">
                    <h4>City: ${city}</h4>
                    <p><strong>AQI:</strong> ${aqi}</p>
                    <p><strong>Category:</strong> ${category}</p>
                    <p><strong>Temperature:</strong> ${temperature}</p>
                </div>
            `;

            let clampedAQI = Math.max(0, Math.min(aqi, 500));
            let pointerPosition = (clampedAQI / 300) * 100;
            document.getElementById("aqiPointer").style.left = `${pointerPosition}%`;
        } else {
            throw new Error("City Not Found. Enter an Appropriate City Name.");
        }
    })
    .catch(error => {
        console.error("Error fetching AQI or Temperature data:", error);
        document.getElementById("result").innerHTML = `
            <p class="text-danger">${error.message}</p>
        `;
        document.getElementById("aqiPointer").style.left = `-9999px`;
    });
}

function getAQICategory(aqi) {
    if (aqi <= 50) return "Good";
    else if (aqi <= 100) return "Moderate";
    else if (aqi <= 150) return "Unhealthy for Sensitive Groups";
    else if (aqi <= 200) return "Unhealthy";
    else if (aqi <= 300) return "Very Unhealthy";
    else return "Hazardous";
}
