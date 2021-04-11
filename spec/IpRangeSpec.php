<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\IpRange;
use PhpSpec\ObjectBehavior;

class IpRangeSpec extends IpInterfaceSpec
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IpRange::class);
    }
    protected function validConstructorParameter()
    {
        return '192.168.0.1-192.168.0.255';
    }

    protected function invalidConstructorParameter()
    {
        return '192.168.0.100-192.168.0.99';
    }

    protected function supportedValue()
    {
        return '192.168.0.10';
    }

    protected function unsupportedValue()
    {
        return '8.8.8.8';
    }
}
