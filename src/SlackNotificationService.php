<?php

namespace Notification;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Class SlackNotificationService
 * @package App\Services
 */
class SlackNotificationService
{
    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * SlackNotificationService constructor.
     * @param GuzzleClient $client
     */
    public function __construct(GuzzleClient $client)
    {
        $this->client = $client;
    }

    /**
     * payload json文字列作成
     * @param string $text
     * @param string $channel
     * @param string $username
     * @param string $icon
     * @return string
     */
    public function makePayload($text = '', $channel = 'general', $username = 'bot', $icon = '') {
        return json_encode(['channel' => $channel, 'username' => $username, 'text' => $text, 'icon_emoji' => $icon]);
    }

    /**
     * 通知する
     * @param string $url
     * @param string $payload
     */
    public function notify(string $url, string $payload)
    {
        $this->client->post($url, ['body' => $payload]);
    }
}
