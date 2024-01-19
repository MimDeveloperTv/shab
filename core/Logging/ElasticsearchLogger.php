<?php

namespace Core\Logging;

use Elasticsearch\ClientBuilder;
use Monolog\Formatter\ElasticsearchFormatter;
use Monolog\Handler\ElasticsearchHandler;
use Monolog\Logger;

class ElasticsearchLogger
{
    public function __invoke(array $config): Logger
    {
        $client = ClientBuilder::create()
            ->setHosts([$config['host']])
            ->setBasicAuthentication($config['user'], $config['password'])
            ->build();

        $handler = new ElasticsearchHandler($client, [], $config['level'], $config['bubble']);

        $handler->setFormatter(new ElasticsearchFormatter($config['index'], $config['type']));

        return new Logger($config['name'], [$handler]);
    }
}
