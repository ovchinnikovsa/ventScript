<?php

namespace Module\Core;

class CommonMessage
{
    protected static function formatMessage(string $message, bool $error = true, array $data = []): array
    {
        return [
            'error' => $error,
            'message' => $message,
            'data' => $data,
        ];
    }
}
