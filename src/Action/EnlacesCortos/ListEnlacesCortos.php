<?php

namespace App\Action\EnlacesCortos;

use App\Repository\EnlaceCortoRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Serializer;

class ListEnlacesCortos
{

    protected $enlaceCortoRepository;


    /**
     * @param EnlaceCortoRepository $enlaceCortoRepository

     */
    public function __construct(EnlaceCortoRepository $enlaceCortoRepository)
    {
        $this->enlaceCortoRepository = $enlaceCortoRepository;

    }

    public function __invoke(): array
    {
        return $this->enlaceCortoRepository->findBy(['isActive'=>true]);

    }
}