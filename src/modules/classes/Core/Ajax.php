<?php

namespace Module\Core;

use Exception;
use Module\Core\Globals\Post;
use Module\Core\CommonMessage;

class Ajax extends CommonMessage
{
    private mixed $request;

    function __construct()
    {
        $this->setRequest();
    }

    public function setRequest(): void
    {
        $request = Post::getJson();
        var_dump($request);
        die();
        try {
            $request = json_decode($request, true);
        } catch (Exception $e) {
            $this->sendResponse('Request parse error');
        }
        $this->checkRequest($request);

        $this->request = $request;
    }

    public function getRequest(): mixed
    {
        return $this->request;
    }

    protected static function checkRequest(array $request): void
    {
    }

    public static function sendResponse(string $message, bool $error = true, array $data = []): void
    {
        $response = parent::formatMessage($message, $error, $data);
        json_encode($response);
        die($response);
    }
}
