<?php 
// src/Service/ParamsProvider.php
namespace App\Service;

use App\Repository\ParamsRepository;

class ParamsProvider
{
    public function __construct(private ParamsRepository $repo) {}

    public function get(): ?\App\Entity\Params
    {
        // Adapter selon votre modèle (unique row, par site, etc.)
        return $this->repo->findOneBy([]); 
    }
}
