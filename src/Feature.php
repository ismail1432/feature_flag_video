<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:24
 */

namespace App;


class Feature
{
    private const ALL = [
        'API_V2',
    ];

    private $name;

    private function __construct()
    {
    }

    public static function create(string $name): self
    {
       if(!in_array($name, self::ALL)) {
           throw new \RuntimeException(sprintf("Invalid feature %s, available features are : %s", $name, implode(", ", self::ALL)));
       }

       $feature = new self();
       $feature->name = $name;

       return $feature;
    }

    public function toString(): string
    {
        return $this->name;
    }
}