<!DOCTYPE html>
<html>
<head>
    <title>Weather</title>
</head>
<body>
    <h1>Weather Information</h1>
    <p>City: {{ $weatherData['name'] }}</p>
    <p>Temperature: {{ $weatherData['main']['temp'] }}</p>
    <!-- Agrega más datos de clima según tus necesidades -->
</body>
</html>
