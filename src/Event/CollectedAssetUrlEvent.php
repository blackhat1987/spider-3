<?php
/**
 * slince spider library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Spider\Event;

use Slince\Event\Event;
use Slince\Spider\Asset\AssetInterface;
use Slince\Spider\EventStore;
use Slince\Spider\Url;

class CollectedAssetUrlEvent extends Event
{
    /**
     * 事件名称
     * @var string
     */
    const NAME = EventStore::COLLECTED_ASSET_URL;

    /**
     * 当前url
     * @var Url
     */
    protected $url;

    /**
     * 所属资源
     * @var AssetInterface
     */
    protected $ownerAsset;


    public function __construct(Url $url, AssetInterface $ownerAsset, $subject, array $arguments = [])
    {
        $this->url = $url;
        $this->ownerAsset = $ownerAsset;
        parent::__construct(static::NAME, $subject, $arguments);
    }

    /**
     * 获取当前url
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * 获取资源
     * @return AssetInterface
     */
    public function getOwnerAsset()
    {
        return $this->ownerAsset;
    }
}