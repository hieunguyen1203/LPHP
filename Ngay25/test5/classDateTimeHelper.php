<?php
class DateTimeHelper{
    public $timeZone = '';
    public $format;

    /**
     * @param string $timeZone
     * @param $format
     */
    public function __construct(string $timeZone, $format)
    {
        $this->timeZone = $timeZone;
        $this->format = $format;

    }
    public function now(){
        date_default_timezone_set($this->timeZone);
        return date($this->format, time());
    }
    public function toTimestamp($time){
        $date = new DateTime($time);
        echo $date->getTimestamp();
    }

}