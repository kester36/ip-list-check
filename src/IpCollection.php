<?php

namespace Kester36\IpCollection;

class IpCollection
{
    /** @var IpInterface[] */
    private $ips = [];

    public function add(IpInterface $ip)
    {
        $this->ips[] = $ip;
    }

    /** @return IpInterface[] */
    public function getAll(): array
    {
        return $this->ips;
    }

}
