<?php

declare(strict_types=1);

namespace Laminas\Db\Feature\ScrollablePdoResult;

use Laminas\Db\Adapter\Driver\Pdo;
use Laminas\Db\Exception\InvalidArgumentException;

use function get_debug_type;
use function in_array;
use function sprintf;

class Result extends Pdo\Result
{
    private const ALLOWED_MODES = [
        self::STATEMENT_MODE_SCROLLABLE,
        self::STATEMENT_MODE_FORWARD
    ];

    public function setStatementMode(string $mode): void
    {
        if (! in_array($mode, self::ALLOWED_MODES)) {
            throw new InvalidArgumentException(
                sprintf(
                    '$mode must be one of %s::ALLOWED_MODES received: %s',
                    get_debug_type($this),
                    $mode
                ),
            );
        }
        $this->statementMode = $mode;
    }
}
