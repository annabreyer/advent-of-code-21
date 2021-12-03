<?php

declare(strict_types = 1);

namespace App\Manager;

class PowerManager
{
    public function getPowerConsumption(array $input): int
    {
        $binaryCount = $this->countBinaries($input);
        $gamma       = $this->getDecimal($this->getGammaBinary($binaryCount));
        $epsilon     = $this->getDecimal($this->getEpsilonBinary($binaryCount));

        return $gamma * $epsilon;
    }

    public function getGammaBinary(array $binaryData): string
    {
        $gammaBinary = '';

        foreach ($binaryData as $data) {
            if ($data[0] > $data[1]) {
                $gammaBinary = $gammaBinary . '0';
            }

            if ($data[0] < $data[1]) {
                $gammaBinary = $gammaBinary . '1';
            }
        }

        return $gammaBinary;
    }

    public function getDecimal(string $binary): int
    {
        return \bindec($binary);
    }

    public function getEpsilonBinary(array $binaryData): string
    {
        $epsilonBinary = '';

        foreach ($binaryData as $data) {
            if ($data[0] < $data[1]) {
                $epsilonBinary = $epsilonBinary . '0';
            }

            if ($data[0] > $data[1]) {
                $epsilonBinary = $epsilonBinary . '1';
            }
        }

        return $epsilonBinary;
    }

    public function countBinaries(array $input): array
    {
        $binaryData = [];

        foreach ($input as $binaryString) {
            $length = \mb_strlen($binaryString);
            $offset = 0;

            while ($offset <= $length) {
                if (false === isset($binaryData[$offset][0])) {
                    $binaryData[$offset][0] = 0;
                }

                if (false === isset($binaryData[$offset][1])) {
                    $binaryData[$offset][1] = 0;
                }

                if ('1' === \mb_substr($binaryString, $offset, 1)) {
                    $binaryData[$offset][1]++;
                }

                if ('0' === \mb_substr($binaryString, $offset, 1)) {
                    $binaryData[$offset][0]++;
                }

                $offset++;
            }
        }

        return $binaryData;
    }
}
