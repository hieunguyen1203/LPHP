<?php
class ValidateData{
    public $phone;
    public $email;
    public $website;
    public $date;

    /**
     * @param $phone
     * @param $email
     * @param $website
     * @param $date
     */
    public function __construct($phone, $email, $website, $date)
    {
        $this->phone = $phone;
        $this->email = $email;
        $this->website = $website;
        $this->date = $date;
    }


    public function validateEmail (){
        $regexEmail = '/^[a-zA-Z0-9_\.]{5,32}@[a-zA-Z0-9_\.]{6,32}$/';
        return preg_match($regexEmail, $this->email);
    }
    public function validateDate (){
        $regexDate = '/^(0?[0-9]|[12][0-9]|3[01])(\/)(0?[1-9]|[1][012])(\/)([12][0-9][0-9][0-9])$/';
        return preg_match($regexDate, $this->date);
    }
    public function validatePhone (){
        $regexPhoneNumber = '/^[0-9]{10,11}$/';
        return preg_match($regexPhoneNumber, $this->phone);
    }
    public function validateWebsite (){
        $regexWebsite = '/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&=]*)/';
        return preg_match($regexWebsite, $this->website);
    }
}