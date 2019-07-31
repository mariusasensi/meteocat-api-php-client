<?php

declare(strict_types=1);

namespace Meteocat\Http;

use Meteocat\Model\Entity\Response;
use Meteocat\Model\Exception\InvalidResponseType;
use Meteocat\Model\Exception\InvalidServerResponse;
use Meteocat\Model\Exception\InvalidCredentials;
use Meteocat\Model\Exception\QuotaExceeded;
use Meteocat\Model\Exception\StoreResponseAlreadyExist;
use Meteocat\Model\Exception\StoreResponseDirectoryNotFound;
use Meteocat\Model\Factory\Builder;
use Meteocat\Model\Query\Query;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

/**
 * Class Client
 *
 * @package Meteocat\Http
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Client
{
    /**
     * @var ClientInterface A Guzzle HTTP client.
     */
    protected $httpClient;

    /**
     * @link https://apidocs.meteocat.gencat.cat/documentacio/seguretat/
     * @var string The Meteocat API token string.
     */
    private $token;

    /**
     * @var bool
     */
    private $debug = false;

    /**
     * @var bool
     */
    private $saveResponse = false;

    /**
     * @var string|null
     */
    private $saveDir = null;

    /**
     * ApiClient constructor.
     *
     * @param ClientInterface|null $httpClient Client.
     */
    protected function __construct(ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new HttpClient();
    }

    /**
     * @param string $token Meteocat API token.
     *
     * @return Client
     */
    protected function setToken(string $token) : Client
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return Client
     */
    public function enableDebugMode() : Client
    {
        $this->debug = true;

        return $this;
    }

    /**
     * @return Client
     */
    public function disableDebugMode() : Client
    {
        $this->debug = false;

        return $this;
    }

    /***
     * @param string $path
     *
     * @return Client
     */
    public function saveResponse(string $path) : Client
    {
        $this->saveDir      = $path;
        $this->saveResponse = true;

        return $this;
    }

    /**
     * Makes the requests.
     *
     * @param Query $query Request to do.
     *
     * @return Response
     */
    public function executeQuery(Query $query)
    {
        $response = null;

        try {
            $response = $this->getHttpClient()->get($query->getUrl(), [
                'headers' => [
                    'accept'    => 'application/json',
                    'x-api-key' => $this->token,
                ],
                'verify'  => !$this->debug,
            ]);
        } catch (ClientException $e) {
            if ($e->getCode() === 401 || $e->getCode() === 403) {
                throw new InvalidCredentials();
            } elseif ($e->getCode() === 429) {
                throw new QuotaExceeded();
            } else {
                throw $e;
            }
        } catch (ServerException $e) {
            throw InvalidServerResponse::create($query->getUrl(), $e->getCode());
        }

        $body = (string)$response->getBody();
        if (empty($body)) {
            throw InvalidServerResponse::emptyResponse((string)$query->getUrl());
        }

        $this->storeResponse($query->getName(), $body);

        return $this->parseResponse($query->getResponseClass(), $body);
    }

    /**
     * Returns the result of the petition in an entity.
     *
     * @param string $entity   Entity to be generated.
     * @param string $response Response of the request in json format.
     *
     * @return Response
     * @throws InvalidResponseType
     */
    private function parseResponse(string $entity, string $response) : Response
    {
        return Builder::create($entity, $response);
    }

    /**
     * Save the raw response in a specific directory as JSON file.
     *
     * @param string $fileName Only the file name.
     * @param string $response Raw response as string.
     *
     * @return bool
     * @throws StoreResponseDirectoryNotFound
     */
    private function storeResponse(string $fileName, string $response) : bool
    {
        if ($this->saveResponse) {

            try {
                return Builder::save($this->saveDir, $fileName, $response);
            } catch (StoreResponseAlreadyExist $exception) {
                // Ignore this.
            }
        }

        return false;
    }

    /**
     * Returns the HTTP adapter.
     *
     * @return HttpClient
     */
    protected function getHttpClient() : HttpClient
    {
        return $this->httpClient;
    }
}
