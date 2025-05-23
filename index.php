<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="API & JSON" />
  <meta name="keywords" content="mths, ics2o" />
  <meta name="author" content="Mr. Coxall" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png" />
  <link rel="manifest" href="site.webmanifest" />
  <title>API & JSON</title>
</head>

<body>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="./js/script.js"></script>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">API & JSON</span>
      </div>
    </header>
    <main class="mdl-layout__content">
      <div class="right-image">
        <img src="./images/temp.png" alt="Temperature" width="95%" height="auto">
      </div>
      <div class="page-content">Press the button to get the current temperature:</div>
      <br />
      <!-- Simple Textfield for integers-->
      <!-- Accent-colored raised button with ripple -->
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
        onclick="getTemperature()">
        Get Current Weather
      </button>
      <br />
      <script>
        async function getTemperature() {
          const resultJSON = await fetch(
            "https://api.openweathermap.org/data/2.5/weather?lat=45.4211435&lon=-75.6900574&appid=fe1d80e1e103cff8c6afd190cad23fa5"
          );
          const jsonData = await resultJSON.json();
          console.log(jsonData);
          const weatherDescription = jsonData.weather[0].description;
          const weatherIconId = jsonData.weather[0].icon;
          const weatherIconUrl = "https://openweathermap.org/img/wn/" + weatherIconId + "@2x.png";
          const currentWeatherInKelvin = jsonData.main.temp;
          const currentWeatherInCelcius = currentWeatherInKelvin - 273.15;
          // You can display the results on the page here
          echo("Current weather: " + weatherDescription + ", " + currentWeatherInCelcius.toFixed(0) + "°C." + weatherIconUrl + "");
        }
      </script>
  </div>
  </main>
  </div>
</body>

</html>