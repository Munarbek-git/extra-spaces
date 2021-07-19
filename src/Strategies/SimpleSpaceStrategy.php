<?php

namespace App\Strategies;

use App\Exceptions\EmptyTextException;

class SimpleSpaceStrategy implements SpaceStrategyInterface
{
    public function removeExtraSpaces(string $text): string
    {
        try {
            $textLength = $this->getFilteredLength($text);
        }catch (EmptyTextException $exception) {
            return $text;
        }

        $filteredText = '';
        $skipSpace = true;

        for ($i = 0; $i < $textLength; $i++) {
            if ($text[$i] === ' ' && $skipSpace) {
                continue;
            }

            $filteredText .= $text[$i];
            $skipSpace = false;

            if ($text[$i] === ' ') {
                $skipSpace = true;
            }
        }

        return $filteredText;
    }

    private function getFilteredLength(string $text): string
    {
        $textLength = strlen($text);

        if ($textLength === 0) {
            throw new EmptyTextException();
        }

        $lastIndex = $textLength - 1;

        for ($j = $lastIndex; $j >= 0; $j-- ) {
            if ($text[$j] === ' ') {
                $textLength--;
                continue;
            }
            break;
        }

        return $textLength;
    }
}