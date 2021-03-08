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
}
