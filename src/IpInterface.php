<?php


namespace Kester36\IpCollection;


interface IpInterface
{
    /** @throws InvalidArgumentException */
    public function __construct(string $ip);

    public function support(string $ip): bool;
}
