<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 22/05/2021
 * Time: 19:36
 */

namespace App\Controller;


use App\Feature;
use App\FeatureRepositoryInterface;

class ApiToggleEnable
{
    private $repository;

    function __construct(FeatureRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function isEnable()
    {
        $feature = Feature::create('API_V2');

        $toggleFeature = $this->repository->find($feature);

        return $toggleFeature->isEnabled();
    }
}