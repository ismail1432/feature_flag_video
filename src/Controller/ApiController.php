<?php

namespace App\Controller;

use App\Feature;
use App\FeatureEnvironmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private $apiToggle;

    function __construct(ApiToggleEnable $apiToggle)
    {
        $this->apiToggle = $apiToggle;
    }

    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        $payload = ['lastName' => 'Dalton'];

        if($this->apiToggle->isEnable()) {
            $payload['firstName'] = 'Joe';
        }

        return new JsonResponse($payload);
    }

    /**
     * @Route("/users", name="user")
     */
    public function user(): Response
    {
        if (!$this->apiToggle->isEnable()) {

            throw new NotFoundHttpException();
        }

        return new JsonResponse(['data' => 'OK']);
    }
}
