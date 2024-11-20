<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaxController extends AbstractController
{
    #[Route('/calculate', name: 'calculate', methods: ['POST'])]
    public function calculate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $revenus = $data['revenus'] ?? 0;
        $parts = $data['parts'] ?? 1;

        if ($parts <= 0) {
            return new JsonResponse(['error' => 'Invalid number of parts'], 400);
        }

        // Exemple de calcul simplifié (à adapter selon la logique fiscale)
        $quotient = $revenus / $parts;
        $impot = max(0, $quotient * 0.2); // 20% d'imposition fictive

        return new JsonResponse([
            'revenus' => $revenus,
            'parts' => $parts,
            'impot' => round($impot, 2),
        ]);
    }
}
