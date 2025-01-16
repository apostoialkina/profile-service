<?php

namespace App\Controller;

use App\Service\ProfileComposer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ProfileController extends AbstractController
{
    #[Route(path:'profiles/{userId}')]
    public function show(string $userId, ProfileComposer $profileComposer): Response
    {
        $profile = $profileComposer->composeProfile($userId);
        return $this->json($profile);
    }
}
