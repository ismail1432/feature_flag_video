<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:21
 */

namespace App;


class FeatureEnvironmentRepository implements FeatureRepositoryInterface
{
    public function find(Feature $feature): ToggleFeature
    {
        $envVar = $_ENV[$feature->toString()];

        return new ToggleFeature($feature->toString(), filter_var($envVar, FILTER_VALIDATE_BOOL));
    }
}