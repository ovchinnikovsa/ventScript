<?php
namespace Module\Core;

use Module\Core\DTO\CommonMessageDTO;

trait CommonMessage
{
    protected CommonMessageDTO $commonMessage;

    protected function setMessage(string $message, bool $error = true, array $data = []): void
    {
        $this->commonMessage = new CommonMessageDTO($message, $error, $data);
    }

    protected function setMessageFromDto(CommonMessageDTO $commonMessage): void
    {
        $this->commonMessage = $commonMessage;
    }

    public function getMessage(): CommonMessageDTO
    {
        return $this->commonMessage;
    }
}
