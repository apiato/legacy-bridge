<?php

namespace App\Ship\LegacyBridge\Testing;

use Laravel\Passport\ClientRepository;
use Laravel\Passport\PersonalAccessClient;

trait TestCaseTrait
{
    use AssertionHelperTrait;
    use AuthHelperTrait;
    use RequestHelperTrait;

    /**
     * The base URL to use while testing the application.
     */
    protected string $baseUrl;

    protected function afterRefreshingDatabase(): void
    {
        $this->setupPassportOAuth2();
    }

    /**
     * Override default URL subDomain in case you want to change it for some tests.
     *
     * @param null $url
     *
     * @return string|void
     */
    public function overrideSubDomain($url = null)
    {
        // `subDomain` is a property defined in your class.
        if (!property_exists($this, 'subDomain')) {
            return;
        }

        $url = ($url) ?: $this->baseUrl;

        $info = parse_url($url);

        $array = explode('.', $info['host']);

        $withoutDomain = (array_key_exists(
            count($array) - 2,
            $array,
        ) ? $array[count($array) - 2] : '') . '.' . $array[count($array) - 1];

        $newSubDomain = $info['scheme'] . '://' . $this->subDomain . '.' . $withoutDomain;

        return $this->baseUrl = $newSubDomain;
    }

    /**
     * Equivalent to passport:install but enough to run the tests.
     */
    public function setupPassportOAuth2(): void
    {
        $client = (new ClientRepository())->createPersonalAccessClient(
            null,
            'Testing Personal Access Client',
            'http://localhost',
        );

        $accessClient = new PersonalAccessClient();
        $accessClient->client_id = $client->id;
        $accessClient->save();
    }
}
