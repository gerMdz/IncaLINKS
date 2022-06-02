<?php

namespace App\Action\Corazones;

use App\Entity\Countandadd;
use App\Repository\CorazonRepository;
use App\Repository\CountandaddRepository;
use App\Repository\EnlaceCortoRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Serializer;

class ListCorazones
{

    private $countandaddRepository;


    /**
     * @param CountandaddRepository $countandaddRepository
     */
    public function __construct(CountandaddRepository $countandaddRepository)
    {

        $this->countandaddRepository = $countandaddRepository;
    }

    /**
     */
    public function __invoke(): JsonResponse
    {

        return new JsonResponse($this->countandaddRepository->countCorazones());
    }
}