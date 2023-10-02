<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Weather extends ActiveRecord
{

    public const    BARNAUL =           'Barnaul';
    public const    BELGOROD    =       'Belgorod';
    public const    VOLGOGRAD   =       'Volgograd';
    public const    VORONEZH    =       'Voronezh';
    public const    YEKATERINBURG   =   'Yekaterinburg';
    public const    KALININGRAD =       'Kaliningrad';
    public const    KRASNODAR   =       'Krasnodar';
    public const    KRASNOYARSK =       'Krasnoyarsk';
    public const    MOSCOW  =           'Moscow';
    public const    NIZHNY_NOVGOROD =   'Nizhny-Novgorod';
    public const    NOVOSIBIRSK =       'Novosibirsk';
    public const    OMSK    =           'Omsk';
    public const    ORENBURG    =       'Orenburg';
    public const    PENZA   =           'Penza';
    public const    PERM    =           'Perm';
    public const    ROSTOV_NA_DANOU =   'Rostov-na-Donu';
    public const    SAMARA  =           'Samara';
    public const    SAINT_PETERBURG =   'Sankt-Peterburg';
    public const    SARATOV =           'Saratov';
    public const    TOLYATTI    =       'Tolyatti';
    public const    TYUMEN  =           'Tyumen';
    public const    UFA =               'Ufa';
    public const    CHELYABINSK =       'Chelyabinsk';
    public const    TOMSK       =       'Tomsk';
    public const    KAZAN       =       'Kazan';


    public const    BARNAULS_LINK =           'weather-barnaul-4720';
    public const    BELGORODS_LINK    =       'weather-belgorod-5039';
    public const    VOLGOGRADS_LINK   =       'weather-volgograd-5089';
    public const    VORONEZHS_LINK    =       'weather-voronezh-5026';
    public const    YEKATERINBURGS_LINK   =   'weather-yekaterinburg-4517';
    public const    KALININGRADS_LINK =       'weather-kaliningrad-4225';
    public const    KRASNODARS_LINK   =       'weather-krasnodar-5136';
    public const    KRASNOYARSKS_LINK =       'weather-krasnoyarsk-4674';
    public const    MOSCOWS_LINK  =           'weather-moscow-4368';
    public const    NIZHNY_NOVGORODS_LINK =   'weather-nizhny-novgorod-4355';
    public const    NOVOSIBIRSKS_LINK =       'weather-novosibirsk-4690';
    public const    OMSKS_LINK    =           'weather-omsk-4578';
    public const    ORENBURGS_LINK    =       'weather-orenburg-5159';
    public const    PENZAS_LINK   =           'weather-penza-4445';
    public const    PERMS_LINK    =           'weather-perm-4476';
    public const    ROSTOV_NA_DANOUS_LINK =   'weather-rostov-na-donu-5110';
    public const    SAMARAS_LINK  =           'weather-samara-4618';
    public const    SAINT_PETERBURGS_LINK =   'weather-sankt-peterburg-4079';
    public const    SARATOVS_LINK =           'weather-saratov-5032';
    public const    TOLYATTIS_LINK    =       'weather-tolyatti-4429';
    public const    TYUMENS_LINK  =           'weather-tyumen-4501';
    public const    UFAS_LINK =               'weather-ufa-4588';
    public const    CHELYABINSKS_LINK =       'weather-chelyabinsk-4565';
    public const    TOMSKS_LINK       =       'weather-tomsk-4652';
    public const    KAZANS_LINK       =       'weather-kazan-4364';


    public const CITY_LINK = [
        self::BARNAUL => self::BARNAULS_LINK,
        self::BELGOROD => self::BELGORODS_LINK,
        self::VOLGOGRAD => self::VOLGOGRADS_LINK,
        self::VORONEZH => self::VORONEZHS_LINK,
        self::YEKATERINBURG => self::YEKATERINBURGS_LINK,
        self::KALININGRAD => self::KALININGRADS_LINK,
        self::KRASNODAR => self::KRASNODARS_LINK,
        self::KRASNOYARSK => self::KRASNOYARSKS_LINK,
        self::MOSCOW => self::MOSCOWS_LINK,
        self::NIZHNY_NOVGOROD => self::NIZHNY_NOVGORODS_LINK,
        self::NOVOSIBIRSK => self::NOVOSIBIRSKS_LINK,
        self::OMSK => self::OMSKS_LINK,
        self::ORENBURG => self::ORENBURGS_LINK,
        self::PENZA => self::PENZAS_LINK,
        self::PERM => self::PERMS_LINK,
        self::ROSTOV_NA_DANOU => self::ROSTOV_NA_DANOUS_LINK,
        self::SAMARA => self::SAMARAS_LINK,
        self::SAINT_PETERBURG => self::SAINT_PETERBURGS_LINK,
        self::SARATOV => self::SARATOVS_LINK,
        self::TOLYATTI => self::TOLYATTIS_LINK,
        self::TYUMEN => self::TYUMENS_LINK,
        self::UFA => self::UFAS_LINK,
        self::CHELYABINSK => self::CHELYABINSKS_LINK,
        self::KAZAN => self::KAZANS_LINK,
    ];

    public static function tableName()
    {
        return 'weather';
    }

    public static function getCities() {
        return self::CITY_LINK;
    }

    public static function isValidCity($city) {
        return  array_key_exists($city, self::CITY_LINK);
    }

}