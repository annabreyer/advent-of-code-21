<?php

declare(strict_types = 1);

namespace App\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldControllerTest extends WebTestCase
{
    public function testMainReturnsHelloWorld(): void
    {
        $client = $this->createClient();
        $url    = $this->getUrl('main');
        $client->request('GET', $url);

        /** @var Response $response */
        $response = $client->getResponse();
        $content  = $response->getContent();

        $this->assertSame($content, 'hello world');
    }
}
