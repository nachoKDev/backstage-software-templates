<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HealthController extends AbstractController
{
    #[Route('/api/v1/healthz', name: 'api_healthz', methods: ['GET'])]
    public function health(): JsonResponse
    {
        return $this->json([
            'status' => 'ok',
        ]);
    }

    #[Route('/api/v1/info', name: 'api_info', methods: ['GET'])]
    public function info(): JsonResponse
    {
        return $this->json([
            'service' => 'example-api',
            'version' => '1.0.0',
            'environment' => $_ENV['APP_ENV'] ?? 'unknown',
            'timestamp' => (new \DateTime())->format(\DateTime::ATOM),
        ]);
    }
}
