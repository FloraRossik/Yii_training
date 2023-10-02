<?php

namespace CloudCrm\sites;

use Yii;
use yii\base\BaseObject;
use CloudCrm\CloudCrmSelenium;
use app\Weather;

class WeatherParsingService extends CloudCrmSelenium {


    protected function updateAllRecords()
    {

        $records = Weather::find()->all();
        $links = Weather::getCities();


        foreach ($records as $record) {

            $site = 'https://www.gismeteo.ru/' . $links[$record->city] . '/now';
        
            $drv = $this->driver->get($site);

            $record->temperature = $drv->findElement(
                WebDriverBy::xpath('string(/html/body/section[2]/div[1]/section[2]/div/div/div/div[1]/div[3]/div[1]/span[1])')
            )->getText();

            $record->air_humidity = $drv->findElement(
                WebDriverBy::xpath('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[3]/div/div[2])')
            )->getText();
            
            
            $record->wind = $drv->findElement(
                WebDriverBy::xpath('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[1]/div[2]/div[1])')
            )->getText();

            $record->rainfall = $drv->findElement(
                WebDriverBy::xpath('string(/html/body/section[2]/div[1]/section[3]/div/div[6]/div/div[5]/div[2]/span[1])')
            )->getText();

            // $record->date = $drv->findElement(
            //     WebDriverBy::xpath('string(/html/body/section[2]/div[1]/section[2]/div/div/div/div[1]/div[2])')
            // )->getText();

            $record->date = date('Y-m-d H:i:s');

            $record->save();

        }
    }

    public function run()
    {
        $this->driver->get($this->site);
        $this->echoText();
        $this->quit();
    }


}


