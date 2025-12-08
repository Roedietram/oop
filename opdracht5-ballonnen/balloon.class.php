<?php

class Balloon {
    public $color;
    public $size;
    public $name;
    public $emoji;

    public function __construct($color, $size, $name, $emoji) {
        $this->color = $color;
        $this->size = $size;
        $this->name = $name;
        $this->emoji = $emoji;
    }

    public function toArray() {
        return [
            "color" => $this->color,
            "size" => $this->size,
            "name" => $this->name,
            "emoji" => $this->emoji
        ];
    }
}
