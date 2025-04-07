## Testing
To access removed testing methods, use the `TestCaseTrait` in your parent TestCase class:

```php
namespace App\Ship\Parents\Tests;

use Apiato\Core\Testing\TestCase as AbstractTestCase;
use Apiato\LegacyBridge\v12\Testing\TestCaseTrait;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

abstract class TestCase extends AbstractTestCase
{
    use LazilyRefreshDatabase;
    use TestCaseTrait {
        TestCaseTrait::afterRefreshingDatabase insteadof LazilyRefreshDatabase;
    }
}
```

## Request
To access removed Request methods, use the `RequestTrait` in your parent Request class:

```php
namespace App\Ship\Parents\Requests;

use Apiato\Core\Requests\Request as AbstractRequest;
use Apiato\LegacyBridge\v12\RequestTrait;

abstract class Request extends AbstractRequest
{
    use RequestTrait;
}
```

## Repository
To maintain the previous behavior of the `find`, `create`, and `update` methods, use the `RepositoryTrait`.

```php
namespace App\Ship\Parents\Repositories;

use Apiato\Core\Repositories\Repository as AbstractRepository;
use Apiato\LegacyBridge\v12\RepositoryTrait;

abstract class Repository extends AbstractRepository
{
    use RepositoryTrait;
}
```
