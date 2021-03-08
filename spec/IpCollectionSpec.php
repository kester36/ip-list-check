<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\IpCollection;
use Kester36\IpCollection\IpInterface;
use PhpSpec\ObjectBehavior;

class IpCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IpCollection::class);
    }

    function it_is_ip_collection_container(IpInterface $ip)
    {
        $this->add($ip);
        $this->getAll()->shouldBe([$ip]);
    }
}
