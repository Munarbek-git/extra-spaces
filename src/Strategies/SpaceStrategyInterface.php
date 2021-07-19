<?php
declare(strict_types = 1);

namespace App\Strategies;

interface SpaceStrategyInterface
{
    public function removeExtraSpaces(string $text): string;
}