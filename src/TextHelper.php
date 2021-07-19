<?php

declare(strict_types = 1);

namespace App;

use App\Strategies\SpaceStrategyInterface;

class TextHelper
{
    private $strategy;

    public function __construct(SpaceStrategyInterface $strategy){
        $this->strategy = $strategy;
    }

    public function removeExtraSpaces(string $text): string
    {
        return $this->strategy->removeExtraSpaces($text);
    }
}