<?php

declare(strict_types=1);

namespace UselessSoft\Queries;

use Kdyby\StrictObjects\Scream;

class QueryBus implements QueryBusInterface
{
    use Scream;

    /** @var QueryHandlerInterface */
    private $masterHandler;

    public function __construct(QueryHandlerInterface $masterHandler)
    {
        $this->masterHandler = $masterHandler;
    }

    public function handle(QueryInterface $query)
    {
        return $this->masterHandler->handle($query);
    }

    public function supports(QueryInterface $query) : bool
    {
        return $this->masterHandler->supports($query);
    }

}
