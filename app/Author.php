<?php

namespace App;

use Tempest\Database\IsDatabaseModel;

final class Author
{
    use IsDatabaseModel;

    public function __construct(
        public string $name,
    ) {}
}