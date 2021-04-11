<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\InvalidArgumentException;
use Kester36\IpCollection\IpInterface;
use PhpSpec\ObjectBehavior;

abstract class IpInterfaceSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith($this->validConstructorParameter());
    }

    function it_implement_ip_interface()
    {
        $this->shouldImplement(IpInterface::class);
    }

    function it_will_not_be_constructed_with_invalid_parameter()
    {
        $this->beConstructedWith($this->invalidConstructorParameter());
        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }

    function it_knows_what_is_supported()
    {
        $this->support($this->supportedValue())->shouldBe(true);
    }

    function it_knows_what_is_not_supported()
    {
        $this->support($this->unsupportedValue())->shouldBe(false);
    }

    abstract protected function validConstructorParameter();
    abstract protected function invalidConstructorParameter();
    abstract protected function supportedValue();
    abstract protected function unsupportedValue();
}
