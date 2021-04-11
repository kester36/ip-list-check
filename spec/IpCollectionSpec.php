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

    function let(IpInterface $ip1, IpInterface $ip2, IpInterface $ip3)
    {
        $this->add($ip1);
        $this->add($ip2);
        $this->add($ip3);
    }

    function it_is_ip_collection_container(IpInterface $ip1, IpInterface $ip2, IpInterface $ip3)
    {
        $this->getAll()->shouldBe([$ip1, $ip2, $ip3]);
    }

    function it_knows_what_includes(IpInterface $ip1, IpInterface $ip2, IpInterface $ip3)
    {
        $searchIp = '192.168.0.1';
        $ip1->support($searchIp)->willReturn(false)->shouldBeCalled();
        $ip2->support($searchIp)->willReturn(true)->shouldBeCalled();
        $ip3->support($searchIp)->shouldNotBeCalled();

        $this->includes($searchIp)->shouldBe(true);
    }

    function it_knows_what_not_includes(IpInterface $ip1, IpInterface $ip2, IpInterface $ip3)
    {
        $searchIp = '8.8.8.8';
        $ip1->support($searchIp)->willReturn(false)->shouldBeCalled();
        $ip2->support($searchIp)->willReturn(false)->shouldBeCalled();
        $ip3->support($searchIp)->willReturn(false)->shouldBeCalled();

        $this->includes($searchIp)->shouldBe(false);
    }
}
