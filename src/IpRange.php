<?php

namespace Kester36\IpCollection;

class IpRange implements IpInterface
{
    /** @var int */
    private $from;
    /** @var int */
    private $to;

    /**
     * @param string $ipCidr IPv4 only
     * @throws InvalidArgumentException
     */
    public function __construct(string $ipRange)
    {
        $range = explode('-', $ipRange);
        if (count($range) !== 2) {
            throw new InvalidArgumentException("'$ipRange' is not valid, it must include 2 IP's separated by single hyphen(-)");
        }

        if (!(bool)filter_var($range[0], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidArgumentException("First part of '$ipRange' is not valid IP)");
        }

        if (!(bool)filter_var($range[1], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidArgumentException("Second part of '$ipRange' is not valid IP)");
        }

        $this->from = ip2long($range[0]);
        $this->to = ip2long($range[1]);

        if ($this->from > $this->to) {
            throw new InvalidArgumentException("Second IP must be not less then first IP");
        }

    }

    public function support(string $ip): bool
    {
        $ipInt = ip2long($ip);

        return $ipInt !== false
            && $ipInt >= $this->from
            && $ipInt <= $this->to
        ;
    }
}
