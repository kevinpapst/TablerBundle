<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Model;

final class UserModel implements UserInterface
{
    private ?string $title = null;
    private ?string $avatar = null;

    public function __construct(private string $id, private string $name)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @deprecated use getUserIdentifier instead
     */
    public function getIdentifier(): string
    {
        return $this->getUserIdentifier();
    }

    public function getUserIdentifier(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        return str_replace(' ', '-', $this->getName());
    }
}
