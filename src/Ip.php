<?php

namespace Kester36\IpCollection;

class Ip implements IpInterface
{
    /** @var string */
    private $ip;

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $ip)
    {
        if (!(bool)filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new InvalidArgumentException("'$ip' is not valid IP address");
        }

        $this->ip = $ip;
    }
    public function support(string $ip): bool
    {
        return $this->ip === $ip;
    }
}
