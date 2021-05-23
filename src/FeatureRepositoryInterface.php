<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:42
 */

namespace App;


interface FeatureRepositoryInterface
{
    public function find(Feature $feature): ToggleFeature;

}