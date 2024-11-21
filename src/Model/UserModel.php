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

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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
        if ($this->id !== '') {
            return $this->id;
        }

        return str_replace(' ', '-', $this->getName());
    }
}
