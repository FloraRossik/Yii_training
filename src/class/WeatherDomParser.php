<?php

namespace app\class;

class WeatherDomParser
{
    private $site;
    private $temperature;
    private $air_humidity;
    private $wind;
    private $rainfall;
    private $date;

    public function parseWeatherData()
    {
        $dom = new \DOMDocument;
        $dom->loadHTML($this->get_html(), LIBXML_NOERROR);
        $xpath = new \DOMXPath($dom);
       
        // $sign = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[2]/div/div/div/div[1]/div[3]/div[1]/span[1]/span[1])');
        $this->temperature = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[2]/div/div/div/div[1]/div[3]/div[1]/span[1])');

        $this->air_humidity = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[3]/div/div[2])');

        $this->wind = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[1]/div[2]/div[1])');
        
        $this->rainfall = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[5]/div[2]/span[1])');

        $this->date = $xpath->evaluate('string(/html/body/section[2]/div[1]/section[2]/div/div/div/div[1]/div[2])');
    }

    public function getDigits($string) {
        $digits = '';
        for ($i = 0; $i < strlen($string); $i++) {
            if (is_numeric($string[$i])) {
                $digits .= $string[$i];
            }
        }
        return $digits;
    }

    public function get_html()
    {
        $data = file_get_contents($this->site);
        return $data;
    }

    public function getTemperature()
    {
      return $this->temperature;
    }

    public function getAirHumidity()
    {
      return $this->air_humidity;
    }

    public function getWind()
    {
        return $this->wind;
    }

    public function getRainfall()
    {
        return $this->rainfall;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setSite($site) {
        $this->site = $site;
    }
}