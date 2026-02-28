<?php 
// src/Twig/AppExtension.php
namespace App\Twig;

use App\Service\ParamsProvider;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    public function __construct(private ParamsProvider $params) {}

    public function getGlobals(): array
    {
        return [
            'params' => $this->params->get(),
        ];
    }
}
