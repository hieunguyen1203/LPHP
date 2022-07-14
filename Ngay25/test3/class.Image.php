<?php

class Image{
    public $url = '';
    public $altImage = '';
    public $width = 0;
    public $height = 0;

    /**
     * @param string $url
     * @param string $altImage
     * @param int $width
     * @param int $height
     */
    public function __construct(string $url, string $altImage, int $width, int $height)
    {
        $this->url = $url;
        $this->altImage = $altImage;
        $this->width = $width;
        $this->height = $height;
    }


    public function render(){
        return '<img src="'.$this->url.'" alt="'.$this->altImage.'" height="'.$this->height.'" width="'.$this->width.'">';
    }
}