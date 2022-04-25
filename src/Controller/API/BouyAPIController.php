<?php

namespace App\Controller\API;

use App\Entity\Bouy;
use App\Handler\BouyHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BouyAPIController extends AbstractController
{
    private BouyHandler $bouyHandler;

    public function __construct(BouyHandler $bouyHandler)
    {
        $this->bouyHandler = $bouyHandler;
    }

    #[Route('/api/location', name: 'bouy_new_location')]
    public function getBouyLocation(Request $request): JsonResponse
    {
        $content = json_decode($request->getContent(), true);
        $bouy = $this->bouyHandler->getBouyByCode($content['code']);

        if (!$this->bouyHandler->checkIfLocationChanged($bouy, $content['y'], $content['x'])) {
            return new JsonResponse(
                '',
                Response::HTTP_ACCEPTED,
                [],
                true
            );
        } else {
            $this->bouyHandler->addLocation($bouy, $content['y'], $content['x']);
            return new JsonResponse(
                '',
                Response::HTTP_OK,
                [],
                true
            );
        }
    }
}
