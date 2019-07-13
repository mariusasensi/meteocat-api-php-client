<?php

namespace Meteocat\Http;

use Exception;
use GuzzleHttp;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\RequestException;
use Meteocat\Model\Query\Query;

/**
 * Class Client
 *
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 * @package Meteocat\Http
 */
abstract class Client
{

    /**
     * @var string The Meteocat API token string.
     * @link https://apidocs.meteocat.gencat.cat/documentacio/seguretat/
     */
    protected $token;

    /**
     * @var GuzzleHttp\ClientInterface A Guzzle HTTP client.
     */
    protected $httpClient;

    /**
     * ApiClient constructor.
     *
     * @param GuzzleHttp\ClientInterface|null $httpClient
     */
    protected function __construct(GuzzleHttp\ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new GuzzleHttp\Client();
    }

    /**
     * @param string $token
     *
     * @return Client
     */
    protected function setToken(string $token) : Client
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @param Query $query
     *
     * @return string
     */
    protected function executeQuery(Query $query): string
    {
        $result = null;

        try {
            $result = $this->httpClient->get( $query->getUrl(), [
                'header' => [
                    'Accept'    => 'application/json',
                    'X-api-key' => $this->token,
                ]
            ]);
        } catch (BadResponseException $e) {
            // TODO: Handle exception
        } catch (RequestException $e) {
            // TODO: Handle exception
        } catch (Exception $e) {
            // TODO: Handle exception
        }

        return $result;
    }
}
