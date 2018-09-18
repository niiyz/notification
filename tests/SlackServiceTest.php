<?php

use PHPUnit\Framework\TestCase;
use Niiyz\Notification\SlackNotificationService;

class StackServiceTest extends TestCase
{
    public function testMakePayload()
    {
        $service = new SlackNotificationService(new GuzzleHttp\Client([]));

        $payload = $service->makePayload('テスト', 'ca', 'aaa', 'icon1');

        $this->assertJson('{"channel":"ca","username":"aaa","text":"\u30c6\u30b9\u30c8","icon_emoji":"icon1"}', $payload);
    }
}