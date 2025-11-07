<?php include 'includes/header.php'; ?>

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  }

 body {
    min-height: 100vh;
    background: #ffffff; /* plain white background */
}
  .weather-container {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    border-radius: 25px;
    padding: 40px;
    width: 100%;
    max-width: 1100px;
    margin: 40px auto;
    color: #2d5016;
    text-align: center;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
  }

  h2 {
    margin-bottom: 8px;
    font-size: 2.4rem;
    font-weight: 700;
    background: linear-gradient(to right, #56ab2f, #a8e063);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .clock {
    font-size: 1.1rem;
    margin-bottom: 25px;
    color: #555;
    font-weight: 500;
  }

  .search-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 15px;
    flex-wrap: wrap;
  }

  input {
    flex: 1;
    min-width: 250px;
    padding: 14px 20px;
    border: 2px solid #dde8d5;
    border-radius: 30px;
    outline: none;
    font-size: 1.05rem;
    transition: border 0.3s;
  }

  input:focus {
    border-color: #56ab2f;
  }

  button {
    padding: 14px 30px;
    border: none;
    background: linear-gradient(90deg, #a8e063 0%, #56ab2f 100%);
    color: white;
    font-weight: 600;
    border-radius: 30px;
    cursor: pointer;
    transition: 0.3s;
    font-size: 1.05rem;
  }

  button:hover {
    background: linear-gradient(90deg, #56ab2f 0%, #a8e063 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(86, 171, 47, 0.3);
  }

  .button-group {
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 15px;
  }

  .gps-btn {
    background: linear-gradient(90deg, #00bcd4 0%, #0097a7 100%);
  }

  .gps-btn:hover {
    background: linear-gradient(90deg, #0097a7 0%, #00bcd4 100%);
  }

  .map-btn {
    background: linear-gradient(90deg, #ff9800 0%, #f57c00 100%);
  }

  .map-btn:hover {
    background: linear-gradient(90deg, #f57c00 0%, #ff9800 100%);
  }

  .weather {
    display: none;
    animation: fadeIn 0.8s ease;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .divider {
    height: 4px;
    border-radius: 5px;
    margin: 20px 0;
    background: linear-gradient(to right, #56ab2f, #a8e063);
  }

  .icon img {
    width: 120px;
    height: 120px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
  }

  .temp {
    font-size: 3.5rem;
    font-weight: 700;
    margin: 15px 0;
    color: #2d5016;
  }

  .toggle {
    cursor: pointer;
    font-size: 0.95rem;
    color: #56ab2f;
    font-weight: 600;
    text-decoration: underline;
  }

  .toggle:hover {
    color: #3d7a1f;
  }

  .description {
    font-size: 1.3rem;
    margin: 10px 0;
    color: #4a7c2c;
    font-weight: 600;
  }

  .details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 20px;
    text-align: left;
  }

  .details p {
    background: #f0f8e8;
    padding: 12px 18px;
    border-radius: 12px;
    font-size: 1.05rem;
    color: #2d5016;
  }

  .details span {
    color: #56ab2f;
    font-weight: 600;
  }

  .error {
    color: #d32f2f;
    background: rgba(255, 0, 0, 0.1);
    padding: 12px;
    border-radius: 12px;
    margin-top: 10px;
    font-weight: 600;
  }

  .forecast {
    margin-top: 30px;
  }

  .forecast h4 {
    margin-bottom: 15px;
    text-align: left;
    color: #2d5016;
    font-size: 1.3rem;
  }

  .forecast-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 12px;
  }

  .forecast-day {
    background: linear-gradient(135deg, #f0f8e8 0%, #e8f5e0 100%);
    border-radius: 15px;
    padding: 15px 10px;
    text-align: center;
    color: #2d5016;
    transition: 0.3s;
    border: 2px solid transparent;
  }

  .forecast-day:hover {
    background: linear-gradient(135deg, #e8f5e0 0%, #d4ecc8 100%);
    transform: translateY(-5px);
    border-color: #56ab2f;
    box-shadow: 0 8px 20px rgba(86, 171, 47, 0.2);
  }

  .forecast-day img {
    width: 50px;
    height: 50px;
  }

  .forecast-day p {
    font-size: 0.95rem;
    margin: 5px 0;
    font-weight: 500;
  }

  .crop-suggestions {
    margin-top: 30px;
    background: linear-gradient(135deg, #fff8e1 0%, #fffde7 100%);
    border-radius: 20px;
    padding: 25px;
    text-align: left;
    border: 2px solid #ffd54f;
  }

  .crop-suggestions h4 {
    color: #f57c00;
    margin-bottom: 15px;
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .crop-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
  }

  .crop-item {
    background: white;
    padding: 12px 16px;
    border-radius: 12px;
    border-left: 4px solid #66bb6a;
    font-size: 1.05rem;
    color: #2d5016;
    transition: 0.3s;
  }

  .crop-item:hover {
    transform: translateX(5px);
    box-shadow: 0 4px 12px rgba(102, 187, 106, 0.3);
  }

  .crop-item strong {
    color: #388e3c;
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    animation: fadeIn 0.3s;
  }

  .modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border-radius: 20px;
    width: 90%;
    max-width: 900px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
  }

  .close:hover {
    color: #000;
  }

  #map {
    width: 100%;
    height: 700px;
    border-radius: 15px;
    margin-top: 15px;
  }

  .gm-err-container,
  .gm-err-content,
  .gm-err-message {
    display: none !important;
  }

  .gm-style-iw-chr {
    display: none !important;
  }

  @media (max-width: 768px) {
    .weather-container {
      padding: 25px;
    }
    
    h2 {
      font-size: 1.8rem;
    }

    .temp {
      font-size: 2.5rem;
    }

    .details {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="weather-container">
  <h2>🌦 Weather Forecast</h2>
  <div class="clock" id="clock"></div>
  
  <div class="search-box">
    <input type="text" id="city" placeholder="Enter city name (e.g., Mumbai, Delhi)" />
    <button onclick="getWeather()">🔍 Search</button>
  </div>

  <div class="button-group">
    <button class="gps-btn" onclick="getLocationWeather()">📍 Current Location</button>
    <button class="map-btn" onclick="openMapModal()">🗺️ Select from Map</button>
  </div>

  <div class="divider"></div>
  <div class="error" id="error"></div>

  <div class="weather" id="weather">
    <div class="icon"><img id="icon" alt="Weather icon" /></div>
    <h3 id="city-name" style="font-size: 1.6rem; margin: 10px 0; color: #2d5016;"></h3>
    <div class="temp" id="temp"></div>
    <div class="toggle" onclick="toggleTemp()">Switch to °F</div>
    <div class="description" id="desc"></div>
    
    <div class="details">
      <p>🌡️ Feels Like: <span id="feels"></span></p>
      <p>💧 Humidity: <span id="humidity"></span></p>
      <p>🌬 Wind Speed: <span id="wind"></span></p>
      <p>🌫 Visibility: <span id="visibility"></span></p>
      <p>🔼 Pressure: <span id="pressure"></span></p>
      <p>🌅 Sunrise: <span id="sunrise"></span></p>
      <p>🌇 Sunset: <span id="sunset"></span></p>
    </div>

    <div class="forecast">
      <h4>📅 5-Day Forecast</h4>
      <div class="forecast-container" id="forecast"></div>
    </div>

    <div class="crop-suggestions" id="crop-suggestions">
      <h4>🌾 Suitable Crops for Current Weather</h4>
      <div class="crop-list" id="crop-list"></div>
    </div>
  </div>
</div>

<div id="mapModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeMapModal()">&times;</span>
    <h3 style="color: #2d5016; margin-bottom: 15px;">📍 Select Location on Map</h3>
    <div id="map"></div>
    <button onclick="confirmMapLocation()" style="margin-top: 15px; width: 100%;">✓ Confirm Location</button>
  </div>
</div>

<script>
  const apiKey = "b621aba9315a58ca821027bfec03c86b";
  let currentTempC = 0;
  let isCelsius = true;
  let map, marker, selectedLat, selectedLng;

  function recommendCrops(temp, humidity, rainfall, season) {
    const crops = [];
    
    if (temp >= 25 && temp <= 35 && humidity >= 60) {
      crops.push({ name: "Rice", reason: "High temp & humidity ideal" });
      crops.push({ name: "Cotton", reason: "Warm weather crop" });
    }
    
    if (temp >= 15 && temp <= 25) {
      crops.push({ name: "Wheat", reason: "Moderate temperature" });
      crops.push({ name: "Barley", reason: "Cool season crop" });
      crops.push({ name: "Potato", reason: "Cool weather tuber" });
    }
    
    if (temp >= 20 && temp <= 30 && humidity >= 50) {
      crops.push({ name: "Maize/Corn", reason: "Warm season cereal" });
      crops.push({ name: "Sugarcane", reason: "High moisture needs" });
    }
    
    if (temp >= 18 && temp <= 28) {
      crops.push({ name: "Tomato", reason: "Moderate climate" });
      crops.push({ name: "Onion", reason: "Versatile conditions" });
      crops.push({ name: "Cabbage", reason: "Cool season vegetable" });
    }
    
    if (temp >= 25 && temp <= 35) {
      crops.push({ name: "Chili", reason: "Hot weather crop" });
      crops.push({ name: "Okra", reason: "Warm season vegetable" });
    }
    
    if (humidity < 40) {
      crops.push({ name: "Millets", reason: "Drought tolerant" });
      crops.push({ name: "Sorghum", reason: "Low water requirement" });
    }
    
    if (temp >= 10 && temp <= 20) {
      crops.push({ name: "Peas", reason: "Cool season legume" });
      crops.push({ name: "Mustard", reason: "Winter crop" });
    }

    return crops.length > 0 ? crops : [
      { name: "Consult Local Expert", reason: "Unique weather conditions" }
    ];
  }

  function displayCropSuggestions(temp, humidity) {
    const cropList = document.getElementById("crop-list");
    const season = new Date().getMonth();
    const crops = recommendCrops(temp, humidity, 0, season);
    
    cropList.innerHTML = crops.map(crop => `
      <div class="crop-item">
        <strong>🌱 ${crop.name}</strong><br>
        <small style="color: #666;">${crop.reason}</small>
      </div>
    `).join('');
  }

  async function getWeather(cityInput) {
    const city = cityInput || document.getElementById("city").value.trim();
    const errorBox = document.getElementById("error");
    const weatherBox = document.getElementById("weather");

    if (!city) {
      errorBox.textContent = "⚠️ Please enter a city name!";
      weatherBox.style.display = "none";
      return;
    }

    errorBox.textContent = "";

    try {
      const [currentRes, forecastRes] = await Promise.all([
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`),
        fetch(`https://api.openweathermap.org/data/2.5/forecast?q=${city}&units=metric&appid=${apiKey}`)
      ]);

      const currentData = await currentRes.json();
      const forecastData = await forecastRes.json();

      if (currentData.cod !== 200) throw new Error(currentData.message);

      currentTempC = currentData.main.temp;
      document.getElementById("city-name").textContent = `${currentData.name}, ${currentData.sys.country}`;
      document.getElementById("temp").textContent = `${Math.round(currentData.main.temp)}°C`;
      document.getElementById("desc").textContent = capitalize(currentData.weather[0].description);
      document.getElementById("feels").textContent = `${Math.round(currentData.main.feels_like)}°C`;
      document.getElementById("humidity").textContent = `${currentData.main.humidity}%`;
      document.getElementById("wind").textContent = `${currentData.wind.speed} m/s`;
      document.getElementById("pressure").textContent = `${currentData.main.pressure} hPa`;
      document.getElementById("visibility").textContent = `${(currentData.visibility / 1000).toFixed(1)} km`;
      document.getElementById("sunrise").textContent = new Date(currentData.sys.sunrise * 1000).toLocaleTimeString('en-IN', { hour: '2-digit', minute: '2-digit' });
      document.getElementById("sunset").textContent = new Date(currentData.sys.sunset * 1000).toLocaleTimeString('en-IN', { hour: '2-digit', minute: '2-digit' });
      document.getElementById("icon").src = `https://openweathermap.org/img/wn/${currentData.weather[0].icon}@4x.png`;

      displayForecast(forecastData.list);
      displayCropSuggestions(currentData.main.temp, currentData.main.humidity);
      
      weatherBox.style.display = "block";
    } catch (error) {
      errorBox.textContent = `❌ ${error.message.toUpperCase()}`;
      weatherBox.style.display = "none";
    }
  }

  function displayForecast(data) {
    const forecastEl = document.getElementById("forecast");
    forecastEl.innerHTML = "";
    const daily = {};

    data.forEach(item => {
      const date = item.dt_txt.split(" ")[0];
      if (!daily[date]) daily[date] = item;
    });

    Object.keys(daily).slice(0, 5).forEach(date => {
      const item = daily[date];
      const dayName = new Date(date).toLocaleDateString("en-IN", { weekday: "short" });
      forecastEl.innerHTML += `
        <div class="forecast-day">
          <p><strong>${dayName}</strong></p>
          <img src="https://openweathermap.org/img/wn/${item.weather[0].icon}@2x.png" />
          <p style="font-size: 1.05rem; color: #2d5016;"><strong>${Math.round(item.main.temp)}°C</strong></p>
          <p style="font-size: 0.85rem; color: #666;">${capitalize(item.weather[0].description)}</p>
        </div>`;
    });
  }

  function capitalize(text) {
    return text.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
  }

  function toggleTemp() {
    const tempEl = document.getElementById("temp");
    const toggleEl = document.querySelector(".toggle");
    
    if (isCelsius) {
      const tempF = (currentTempC * 9) / 5 + 32;
      tempEl.textContent = `${Math.round(tempF)}°F`;
      toggleEl.textContent = "Switch to °C";
    } else {
      tempEl.textContent = `${Math.round(currentTempC)}°C`;
      toggleEl.textContent = "Switch to °F";
    }
    isCelsius = !isCelsius;
  }

  function getLocationWeather() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(async (position) => {
        const { latitude, longitude } = position.coords;
        const response = await fetch(
          `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&units=metric&appid=${apiKey}`
        );
        const data = await response.json();
        document.getElementById("city").value = data.name;
        getWeather(data.name);
      }, (error) => {
        document.getElementById("error").textContent = "❌ Unable to get your location. Please enable location services.";
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function openMapModal() {
    document.getElementById("mapModal").style.display = "block";
    setTimeout(initMap, 100);
  }

  function closeMapModal() {
    document.getElementById("mapModal").style.display = "none";
  }

  function initMap() {
    const defaultLocation = { lat: 20.5937, lng: 78.9629 };
    map = new google.maps.Map(document.getElementById("map"), {
      center: defaultLocation,
      zoom: 5,
    });

    map.addListener("click", (event) => {
      if (marker) marker.setMap(null);
      
      selectedLat = event.latLng.lat();
      selectedLng = event.latLng.lng();
      
      marker = new google.maps.Marker({
        position: event.latLng,
        map: map,
      });
    });
  }

  async function confirmMapLocation() {
    if (!selectedLat || !selectedLng) {
      alert("Please select a location on the map first!");
      return;
    }

    closeMapModal();
    
    try {
      const response = await fetch(
        `https://api.openweathermap.org/data/2.5/weather?lat=${selectedLat}&lon=${selectedLng}&units=metric&appid=${apiKey}`
      );
      const data = await response.json();
      document.getElementById("city").value = data.name;
      getWeather(data.name);
    } catch (error) {
      document.getElementById("error").textContent = "❌ Unable to fetch weather for selected location";
    }
  }

  function updateClock() {
    const now = new Date();
    document.getElementById("clock").textContent =
      now.toLocaleString('en-IN', { 
        weekday: 'long', 
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit', 
        hour12: true 
      });
  }

  setInterval(updateClock, 1000);
  updateClock();

  window.onclick = function(event) {
    const modal = document.getElementById("mapModal");
    if (event.target == modal) {
      closeMapModal();
    }
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&callback=initMap" async defer></script>


