<?php

namespace Kester36\IpCollection;

class IpCollection
{
    private $ips = [];

    public function add(IpInterface $ip)
    {
        $this->ips[] = $ip;
    }

    public function getAll()
    {
        return $this->ips;
    }

}
