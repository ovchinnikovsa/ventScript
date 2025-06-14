<?php
namespace Module\Core\DTO;

final class CommonMessageDTO
{
    private string $message = 'Error! Something went wrong.';
    private bool $error     = true;
    private array $data     = [];

    public function __construct(string $message, bool $error, array $data = [])
    {
        if (! empty($message)) {
            $this->message = $message;
        }

        if (! empty($error)) {
            $this->error = $error;
        }

        if (! empty($data)) {
            $this->data = $data;
        }

    }

    public function toArray(): array
    {
        return [
            'error'   => $this->error,
            'message' => $this->message,
            'data'    => $this->data,
        ];
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getError(): bool
    {
        return $this->error;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
