<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

use KevinPapst\TablerBundle\Helper\Constants;

class NotificationModel implements NotificationInterface
{
    private $id;
    private $message;
    private $type;
    private $url;

    public function __construct(string $id, string $message, string $type = Constants::TYPE_INFO)
    {
        $this->id = $id;
        $this->message = $message;
        $this->type = $type;
    }

    public function getIdentifier(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}
