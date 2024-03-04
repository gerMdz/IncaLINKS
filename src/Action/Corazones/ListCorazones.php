<?php

namespace App\Action\Corazones;

use App\Repository\CountandaddRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListCorazones
{
    private $countandaddRepository;

    public function __construct(CountandaddRepository $countandaddRepository)
    {
        $this->countandaddRepository = $countandaddRepository;
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse($this->countandaddRepository->countCorazones());
    }
}
