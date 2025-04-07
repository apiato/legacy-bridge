<p align="center">
   <a href="https://github.com/Mohammad-Alavi/apiato-rector/actions/workflows/tests.yaml">
      <img src="https://img.shields.io/github/actions/workflow/status/Mohammad-Alavi/apiato-rector/tests.yaml?label=tests" alt="tests status">
   </a>
   <a href="https://codecov.io/gh/Mohammad-Alavi/apiato-rector">
      <img src="https://img.shields.io/codecov/c/github/Mohammad-Alavi/apiato-rector?token=c6e0b5g9GH" alt="code coverage"/>
   </a>
   <br>
   <a href="https://packagist.org/packages/Mohammad-Alavi/apiato-rector">
      <img src="https://img.shields.io/packagist/dt/Mohammad-Alavi/apiato-rector" alt="total downloads">
   </a>
   <a href="https://github.com/Mohammad-Alavi/apiato-rector">
      <img src="https://img.shields.io/github/license/Mohammad-Alavi/apiato-rector" alt="license">
   </a>
   <a href="https://discord.gg/ryPcV4KM5k">
      <img src="https://img.shields.io/discord/800815227839053834?logo=discord&label=chat" alt="chat">
   </a>
</p>

---

#### Testing

To access removed testing methods, use the `TestCaseTrait` in your parent TestCase class:

```php
namespace App\Ship\Parents\Tests;

use Apiato\Core\Testing\TestCase as AbstractTestCase;
use App\Ship\Compatibility\Testing\TestCaseTrait; TODO change this after package is released
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

abstract class TestCase extends AbstractTestCase
{
    use LazilyRefreshDatabase;
    use TestCaseTrait {
        TestCaseTrait::afterRefreshingDatabase insteadof LazilyRefreshDatabase;
    }
}
```

#### Request

To access removed Request methods, use the `RequestTrait` in your parent Request class:

```php
namespace App\Ship\Parents\Requests;

use Apiato\Core\Requests\Request as AbstractRequest;
use App\Ship\Compatibility\RequestTrait; TODO change this after package is released

abstract class Request extends AbstractRequest
{
    use RequestTrait;
}
```

### Rector Rules

Apiato provides custom [Rector](https://getrector.com) rules to help automate some aspects of the upgrade process.

TODO: extract this doc to the rector rules repo and link the repo here. Also update the referenced class namespaces.

For more details, see the Rector documentation and instructions in the [Apiato Rector rules repository](https://openforests.atlassian.net/wiki/spaces/EL/pages/3181445160/Upgrade+Guide#Rector-Rules).

#### Setup

```bash
composer require --dev mohammad-alavi/apiato-rector dev-latest
```

Also ensure you have Rector itself installed:

```bash
composer require --dev rector/rector
```

#### Rules

#### `TransformMethodToResponseFacadeRector`
Converts `$this->transform(...)` calls to `Response::create(...)`.

```php
use MohammadAlavi\ApiatoRector\Rules\TransformMethodToResponseFacadeRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/config',
    ])
    ->withImportNames(true, false, false, true)
    ->withRules([
        TransformMethodToResponseFacadeRector::class,
    ]);
```

#### `RefactorHttpExceptionRector`
Helps refactor exception classes to the new HTTP exception signature.

```php
use MohammadAlavi\ApiatoRector\Rules\RefactorHttpExceptionRector;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/config',
    ])
    ->withImportNames(true, false, false, true)
    ->withConfiguredRule(RefactorHttpExceptionRector::class, [
        'parent_class' => \App\Ship\Parents\Exceptions\HttpException::class,
    ]);
```
