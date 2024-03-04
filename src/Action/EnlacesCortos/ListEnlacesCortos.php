<?php

namespace App\Action\EnlacesCortos;

use App\Repository\EnlaceCortoRepository;

class ListEnlacesCortos
{
    protected $enlaceCortoRepository;

    public function __construct(EnlaceCortoRepository $enlaceCortoRepository)
    {
        $this->enlaceCortoRepository = $enlaceCortoRepository;
    }

    public function __invoke(): array
    {
        return $this->enlaceCortoRepository->findBy(['isActive' => true]);
    }
}
