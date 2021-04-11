<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\IpCidr;
use PhpSpec\ObjectBehavior;

class IpCidrSpec extends IpInterfaceSpec
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IpCidr::class);
    }

    protected function validConstructorParameter()
    {
        return '192.168.0.0/16';
    }

    protected function invalidConstructorParameter()
    {
        return '192.168.0.1/33';
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
