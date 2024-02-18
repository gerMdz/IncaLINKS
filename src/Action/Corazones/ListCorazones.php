<?php

namespace App\Action\Corazones;

use App\Repository\CountandaddRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListCorazones
{
    public function __construct(private readonly CountandaddRepository $countandaddRepository)
    {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->countandaddRepository->countCorazones());
    }
}
