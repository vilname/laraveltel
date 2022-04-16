<?php


namespace App\Models\Interfaces;


interface DtoInterface
{
    public static function map(array $data): self;
}
