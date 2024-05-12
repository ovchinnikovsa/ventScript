<?php

namespace Module\Core;

trait CommonMessage
{
    protected function formatMessage(string $message, bool $error = true, array $data = []): array
    {
        return [
            'error' => $error,
            'message' => $message,
            'data' => $data,
        ];
    }

}
