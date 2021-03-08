<?php

namespace spec\Kester36\IpCollection;

use Kester36\IpCollection\IpCollection;
use PhpSpec\ObjectBehavior;

class IpCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(IpCollection::class);
    }

    function it_has_method_for_add_ip_to_collection()
    {
        $this->add('1.1.1.1');
    }
}
