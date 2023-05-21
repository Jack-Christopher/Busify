<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
</head>
<body>
    <h1>Weather App</h1>

    <form method="POST" action="/weather">
        @csrf
        <label for="city">City:</label>
        <input type="text" name="city" id="city" required>
        <button type="submit">Search</button>
    </form>
</body>
</html>
