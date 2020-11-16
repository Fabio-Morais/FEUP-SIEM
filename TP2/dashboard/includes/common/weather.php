
<?php

class Weather
{
    private $data;
    function __construct()
    {
        $city = $this->get_city();
        $this->set_weather($city);
    }


    function get_city()
    {
        //deteta a cidade que estamos pelo IP
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        return $geo["geoplugin_city"];
    }
    function set_weather($city)
    {
        $apiKey = "49fb978a57bb7cc84127bdd1700a3d94";
        $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=pt&units=metric&APPID=" . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        $this->data = json_decode($response);
    }
    function get_data(){
        return $this->data;
    }
    
    function get_time(){
        setlocale(LC_TIME, 'pt_PT','portuguese');
        
        return strftime('%A, %d de %B de %Y', strtotime('now'));
    }
}

?>
