<?php declare(strict_types = 1);

namespace App\Manager;

class LifeSupportManager
{
    public function getLifeSupportRating(array $input): int
    {
        $oxygenRating = $this->getOxygenRating($input);
        $co2Rating = $this->getCo2Rating($input);

        return bindec($oxygenRating) * bindec($co2Rating);
    }

    public function getOxygenRating(array $input): string
    {
        $loopCount = 0;
        while (count($input) > 1) {
            $oxygenFilter = $this->getOxygenFilter($input, $loopCount);

            foreach ($input as $key => $binaryString) {
                if ($oxygenFilter !== \mb_substr($binaryString, $loopCount, 1)) {
                    unset($input[$key]);
                }
            }

            $loopCount++;
        }

        return array_values($input)[0];
    }

    public function getCo2Rating(array $input): string
    {
        $loopCount = 0;
        while (count($input) > 1) {
            $co2Filter = $this->getCo2Filter($input, $loopCount);

            foreach ($input as $key => $binaryString) {
                if ($co2Filter !== \mb_substr($binaryString, $loopCount, 1)) {
                    unset($input[$key]);
                }
            }

            $loopCount++;
        }

        return array_values($input)[0];
    }

    private function getOxygenFilter(array $input, $offset): string
    {
        $countZero = 0;
        $countOne  = 0;

        foreach ($input as $binaryString) {
            if ('1' === \mb_substr($binaryString, $offset, 1)) {
                $countOne++;
            }

            if ('0' === \mb_substr($binaryString, $offset, 1)) {
                $countZero++;
            }
        }

        return $countOne >= $countZero ? '1' : '0';
    }

    private function getCo2Filter(array $input, int $offset): string
    {
        $countZero = 0;
        $countOne  = 0;

        foreach ($input as $binaryString) {
            if ('1' === \mb_substr($binaryString, $offset, 1)) {
                $countOne++;
            }

            if ('0' === \mb_substr($binaryString, $offset, 1)) {
                $countZero++;
            }
        }

        return $countOne >= $countZero ? '0' : '1';
    }

}
