<?php

namespace App\Services;

interface CacheServiceInterface
{
    public function getConnection();
    public function setValues(array $values);
    public function getValues(array $keys);
}
