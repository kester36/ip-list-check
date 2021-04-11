# IP Collection
This is IP collection library. You can fill collection IP's in several formats:
from single IP to range of IPs.

Then you can check is any IP is included inside this collection.

## How to use
### Create and fill collection
```php
use Kester36\IpCollection;

$collection = new IpCollection\IpCollection;

// add single IP
$collection->add(new IpCollection\Ip('10.10.0.1'));
$collection->add(new IpCollection\Ip('10.10.100.212'));
// add IPv4 range
$collection->add(new IpCollection\IpRange('127.0.0.1-127.0.0.100'));
$collection->add(new IpCollection\IpRange('127.0.1.223-127.0.2.31'));
// add CIDR notation (IPv4)
$collection->add(new IpCollection\IpCidr('192.168.0.0/16'));
```

### Check if IP in collection
```php
/** @var Kester36\IpCollection\IpCollection $collection */
$collection->includes('192.168.100.200');
```

### Get all items from collection
```php
/** @var Kester36\IpCollection\IpCollection $collection */
$items = $collection->getAll();
```
