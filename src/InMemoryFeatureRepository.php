<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:44
 */

namespace App;


class InMemoryFeatureRepository implements FeatureRepositoryInterface
{
    private $value = false;

    public function find(Feature $feature): ToggleFeature
    {
        return new ToggleFeature(Feature::create('API_V2')->toString(), $this->value);
    }

    public function setValue(bool $value)
    {
        $this->value = $value;
    }
}