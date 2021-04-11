<?php

namespace Kester36\IpCollection;

class IpCidr implements IpInterface
{
    /** @var int */
    private $from;
    /** @var int */
    private $to;

    /**
     * @param string $ipCidr IPv4 only
     * @throws InvalidArgumentException
     */
    public function __construct(string $ipCidr)
    {
        $parts = explode('/', $ipCidr);

        $mask = filter_var($parts[1], FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 0,
                'max_range' => 32,
            ],
        ]);

        if ($mask === false) {
            throw new InvalidArgumentException("Mask part of IP CIDR '$ipCidr'  is not valid: must be a number between 0 and 32");
        }

        var_dump($mask);

        if (!(bool)filter_var($parts[0], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new InvalidArgumentException("Network address in '$ipCidr' is not valid");
        }


        $networkInt = ip2long($parts[0]);
        $networkIntExpected = ($networkInt >> $mask) << $mask;

        if ($networkInt !== $networkIntExpected) {
            throw new InvalidArgumentException(sprintf(
                "For mask '$mask' expected network address '%s' but '%s' given"
                , long2ip($networkIntExpected)
                , $parts[0]
            ));
        }

        $this->from = $networkInt;
        $this->to = $networkInt + (2 ** $mask);
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

