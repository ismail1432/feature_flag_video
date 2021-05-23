<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:15
 */

namespace App;


class ToggleFeature
{
    private $name;

    private $value;


    public function __construct(string $name, bool $value)
    {
        $this->name = $name;

        $this->value = $value;
    }

    public function isEnabled(): bool
    {
        return $this->value;
    }
}