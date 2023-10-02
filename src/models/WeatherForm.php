<?php

namespace app\models;

use Yii;
use yii\base\Model;

class WeatherForm extends Model
{
    public $city;

    private $_record = false;

    public function rules()
    {
        return [
            [['city'], 'required'],
            ['city', 'isValidCity'],
            ['city', 'unique', 'targetClass' => 'app\models\Weather', 'targetAttribute' => 'city']
        ];
    }

      /**
     * Validates the city.
     * This method serves as the inline validation for city.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function isValidCity($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!Weather::isValidCity( $this->city))
                $this->addError($attribute, 'Unsupported city !');
        }
    }


    public function createNewEntry() {
        if ($this->validate()) {

            $this->_record = new Weather();
            $this->_record->city = $this->city;
            $this->_record->temperature = "-";
            $this->_record->air_humidity = "-";
            $this->_record->wind = "-";
            $this->_record->precipitation = "-";
            return $this->_record->save();
        }
        return false;
    }


    // we can implement black list or filter here
    public function getOptions() {
        $out = [];
        foreach (Weather::CITY_LINK as $k => $v) {
            $out[$k] = $k; 
        }
        return $out;
    }
    
    public function getRecord() {
        return $this->_record;
    }

}