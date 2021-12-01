<?php

declare(strict_types = 1);

namespace App\Tests\Controller;

use App\Helper\MessageHelper;
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

        $this->assertEquals(MessageHelper::getResultMessage('1665', '1702'), $content);
    }
}
