<?php

namespace App\Action\Corazones;

use App\Repository\CorazonRepository;
use App\Repository\EnlaceCortoRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Serializer;

class ListCorazones
{

    protected $corazonRepository;


    /**
     * @param CorazonRepository $corazonRepository
     */
    public function __construct(CorazonRepository $corazonRepository)
    {
        $this->corazonRepository = $corazonRepository;
    }

    /**
     */
    public function __invoke(): JsonResponse
    {

        return new JsonResponse($this->corazonRepository->countCorazones());
    }
}