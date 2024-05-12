<?php

namespace Module\Core;

use Module\Core\Globals\Post;
use Module\Core\CommonMessage;

class Ajax
{
    use CommonMessage;

    private array $request;

    function __construct()
    {
        $this->setRequest();
    }

    public function getRequest(): mixed
    {
        return $this->request;
    }

    public function sendResponse(string $message, bool $error = true, array $data = []): void
    {
        header('Content-Type: application/json');
        http_response_code($error ? 400 : 200);
        $response = $this->formatMessage($message, $error, $data);
        json_encode($response);
        echo json_encode($response);
        die();
    }

    private function setRequest(): void
    {
        $request = Post::getJson();
        try {
            $request = json_decode($request, true);
            // get error
            $err = json_last_error();
            if ($err !== JSON_ERROR_NONE) {
                $this->sendResponse('Request parse error');
            }
        } catch (\Exception $e) {
            $this->sendResponse('Request parse error');
        }

        $this->request = $request;
    }
}
