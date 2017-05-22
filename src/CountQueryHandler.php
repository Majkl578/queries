<?php

declare(strict_types=1);

namespace Librette\Queries;

use Kdyby\StrictObjects\Scream;

class CountQueryHandler implements QueryHandlerInterface
{
    use Scream;

    /** @var QueryHandlerInterface */
    private $queryHandler;

    public function __construct(QueryHandlerInterface $queryHandler)
    {
        $this->queryHandler = $queryHandler;
    }

    public function fetch(QueryInterface $query)
    {
        assert($query instanceof CountQuery);

        $result = $this->queryHandler->fetch($query->getInnerQuery());
        assert($result instanceof ResultSetInterface);

        return $result->getTotalCount();
    }

    public function supports(QueryInterface $query) : bool
    {
        return $query instanceof CountQuery;
    }

}
