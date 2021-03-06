<?php

declare(strict_types=1);

namespace UselessSoft\Queries\Exception;

use Kdyby\StrictObjects\Scream;

class UnexpectedValueException extends \UnexpectedValueException implements ExceptionInterface
{
    use Scream;
}
