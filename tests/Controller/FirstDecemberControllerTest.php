<?php

declare(strict_types = 1);

namespace App\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class FirstDecemberControllerTest extends WebTestCase
{
    public function testGetNumberOfIncreases(): void
    {
        $client = $this->createClient();
        $url    = $this->getUrl('december-1');
        $client->request('GET', $url);

        /** @var Response $response */
        $response = $client->getResponse();
        $content  = $response->getContent();
        $number   = (int) $content;

        $this->assertIsInt($number);
        $this->assertEquals(1665, $number);
    }
}
