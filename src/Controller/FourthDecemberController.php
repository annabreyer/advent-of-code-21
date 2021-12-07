<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Manager\BingoManager;
use App\Manager\InputLoader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FourthDecemberController extends AbstractController
{
    /**
     * @Route("/december/4", name="december-4", methods={"GET"})
     */
    public function getLastWinningGridScore(): Response
    {
        $bingoManager = new BingoManager($this->getBoardsFromFile(), $this->getNumbers());

        $bingoManager->drawNumbersUntilBingo(false);
        $score = $bingoManager->getScore();

        return new Response((string) $score);
    }

    private function getNumbers(): array
    {
        $inputLoader = new InputLoader('../data/');
        $input       = $inputLoader->getInput('december4_numbers.txt');

        $withoutEmptyLines = \array_filter($input, function ($value) {
            return '' !== $value;
        });

        return \explode(',', $withoutEmptyLines[0]);
    }

    private function getBoardsFromFile()
    {
        $inputLoader = new InputLoader('../data/');
        $input       = $inputLoader->getInput('december4_grids.txt');

        $withoutEmptyLines = \array_filter($input, function ($value) {
            return '' !== $value;
        });

        $bingoGrids = [];
        $gridNumber = 0;

        while (\count($withoutEmptyLines) > 0) {
            $grid = \array_splice($withoutEmptyLines, 0, 5);

            foreach ($grid as $line) {
                $row = \explode(' ', $line);
                foreach ($row as $key => $value) {
                    if (empty($value)) {
                        unset($row[$key]);

                        continue;
                    }

                    $row[$key] = (int) $value;
                }

                $bingoGrids[$gridNumber][] = \array_values($row);
            }

            $gridNumber++;
        }

        return $bingoGrids;
    }
}
