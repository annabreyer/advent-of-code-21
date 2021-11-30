<?php

declare(strict_types = 1);

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class     => ['all' => true],
    Liip\FunctionalTestBundle\LiipFunctionalTestBundle::class => ['dev' => true, 'test' => true],
    Liip\TestFixturesBundle\LiipTestFixturesBundle::class     => ['dev' => true, 'test' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class             => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class               => ['all' => true],
];
