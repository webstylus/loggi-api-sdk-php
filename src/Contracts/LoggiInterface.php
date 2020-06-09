<?php

namespace Loggi\Contracts;

use Loggi\Models\Authorization;

interface LoggiInterface
{
    public function getApiKey(): ?string;

    public function getCredentials(string $email, string $password): ?string;
}