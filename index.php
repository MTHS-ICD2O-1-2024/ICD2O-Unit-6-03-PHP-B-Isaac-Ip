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
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css" />
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
        <img src="./images/temp.png" alt="Temperature">
      </div>
      <div class="page-content">Press the button to get the current temperature:</div>
      <br>
      <?php
      // OpenWeatherMap API URL
      $apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=45.4211435&lon=-75.6900574&appid=fe1d80e1e103cff8c6afd190cad23fa5";

      // Fetch the weather data
      $resultJSON = file_get_contents($apiUrl);

      if ($resultJSON === FALSE) {
        // If data fetch fails
        echo "<div class='page-content'>Sorry, an error has occurred. Please try again later.</div>";
        return;
      }

      $jsonData = json_decode($resultJSON, true);

      // Process
      $weatherDescription = $jsonData['weather'][0]['description'];
      $weatherIconId = $jsonData['weather'][0]['icon'];
      $weatherIconUrl = "https://openweathermap.org/img/wn/" . $weatherIconId . "@2x.png";
      $currentWeatherKelvin = $jsonData['main']['temp'];
      $currentWeatherCelcius = $currentWeatherKelvin - 273.15;

      // Output
      echo "<div class='page-content'>";
      echo "<p>The current temperature is " . round($currentWeatherCelcius) . "°C.</p>";
      echo "<p>The current weather is " . $weatherDescription . ".</p>";
      echo "<img src='" . $weatherIconUrl . "' alt='Weather Icon'>";
      echo "</div>";
      ?>
  </div>
  </main>
  </div>
</body>

</html>