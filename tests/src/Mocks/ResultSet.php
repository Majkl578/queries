<?php

declare(strict_types=1);

namespace UselessSoftTests\Queries\Mocks;

use Kdyby\StrictObjects\Scream;
use UselessSoft\Queries\ResultSetInterface;

class ResultSet implements \IteratorAggregate, ResultSetInterface
{
    use Scream;

	/** @var array */
	private $data;

	/** @var array */
	private $paginated;


	public function __construct(array $data)
	{
		$this->data = $this->paginated = $data;
	}


	public function applyPaging(int $offset, int $limit) : ResultSetInterface
	{
		$this->paginated = array_slice($this->data, $offset, $limit);
		return $this;
	}


	public function getTotalCount() : int
	{
		return count($this->data);
	}


	public function count() : int
	{
		return count($this->paginated);
	}


	public function getIterator() : iterable
	{
		return new \ArrayIterator($this->data);
	}

}
