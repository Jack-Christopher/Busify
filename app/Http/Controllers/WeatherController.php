<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index()
    {
        // Obtén tu API key de OpenWeatherMap
        $apiKey = 'tu_clave_de_api';

        // Configura la ciudad y el país para obtener el clima
        $city = 'London';
        $country = 'UK';

        // Crea una instancia del cliente Guzzle
        $client = new Client();

        // Realiza la solicitud a la API de OpenWeatherMap
        $response = $client->get("http://api.openweathermap.org/data/2.5/weather?q={$city},{$country}&appid={$apiKey}");

        // Obtiene la respuesta JSON y la decodifica como un arreglo asociativo
        $data = json_decode($response->getBody(), true);

        // Retorna la vista "weather" con los datos del clima
        return view('weather')->with('weatherData', $data);
    }
}
