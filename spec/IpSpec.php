<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\Ip;

class IpSpec extends IpInterfaceSpec
{

    function it_is_initializable()
    {
        $this->shouldImplement(Ip::class);
    }

    protected function validConstructorParameter()
    {
        return '192.168.123.123';
    }

    protected function invalidConstructorParameter()
    {
        return '1.1.alfa.$$.3000';
    }

    protected function supportedValue()
    {
        return '192.168.123.123';
    }

    protected function unsupportedValue()
    {
        return '234.234.234.234';
    }
}
