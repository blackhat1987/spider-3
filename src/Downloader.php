<?php
/**
 * slince spider library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Spider;

use GuzzleHttp\Client;
use Slince\Spider\Asset\AssetInterface;
use Slince\Spider\Exception\RuntimeException;

class Downloader
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Uri $uri
     * @throws RuntimeException
     * @return AssetInterface
     */
    public function download(Uri $uri)
    {
        try {
            $response = $this->getHttpClient()->get($uri);
            $uri->setParameter('response', $response);
            if ($response->getStatusCode() == '200') {
                return AssetFactory::createFromPsr7Response($response, $uri);
            }
            throw new RuntimeException(sprintf("Download failed, response code [%s]", $response->getStatusCode()));
        } catch (\Exception $exception) {
            throw new RuntimeException(sprintf("Download failed, message [%s]", $exception->getMessage()));
        }
    }

    /**
     * 创建请求客户端
     * @return Client
     */
    protected function getHttpClient()
    {
        if (is_null($this->client)) {
            $this->client = new Client();
        }
        return $this->client;
    }

    /**
     * 设置请求客户端
     * @param Client $client
     */
    public function setHttpClient(Client $client)
    {
        $this->client = $client;
    }
}
