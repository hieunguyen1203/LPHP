<?php
class CookieHelper {
    public $cookie_name = '';

    /**
     * @param string $cookie_name
     */
    public function __construct(string $cookie_name)
    {
        $this->cookie_name = $cookie_name;
    }

    public function createCookie($arrString){
        setcookie($this->cookie_name, json_encode($arrString), time() + 24*60*60*1000);
    }
    public function getCookie(){
        return $_COOKIE[$this->cookie_name];
    }
    public static function getAllCookie(){
        $val = '';
        foreach ($_COOKIE as $cookie_name => $value) {
            $val .= $cookie_name.': '.$value. '<br>';
        }
        return $val;
    }
    public function deleteCookie() {
        setcookie($this->cookie_name, '', 0);
    }
}