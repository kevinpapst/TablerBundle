<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Helper;

/**
 * @extends \ArrayObject<string, mixed>
 */
class ContextHelper extends \ArrayObject
{
    public function getLogoUrl(): ?string
    {
        $logo = $this->getOption('logo_url');
        if (\is_string($logo)) {
            return $logo;
        }

        return null;
    }

    public function setLogoUrl(?string $logo): void
    {
        $this->setOption('logo_url', $logo);
    }

    public function isCondensedNavbar(): bool
    {
        return (bool) $this->getOption('navbar_condensed');
    }

    public function setIsCondensedNavbar(bool $condensed): void
    {
        $this->setOption('navbar_condensed', $condensed);
    }

    public function isCondensedUserMenu(): bool
    {
        return (bool) $this->getOption('user_menu_condensed');
    }

    public function setIsCondensedUserMenu(bool $condensed): void
    {
        $this->setOption('user_menu_condensed', $condensed);
    }

    public function isNavbarOverlapping(): bool
    {
        return (bool) $this->getOption('navbar_overlap');
    }

    public function setIsNavbarOverlapping(bool $overlapping): void
    {
        $this->setOption('navbar_overlap', $overlapping);
    }

    public function isRightToLeft(): bool
    {
        return (bool) $this->getOption('rtl_mode');
    }

    public function setIsRightToLeft(bool $rtl): void
    {
        $this->setOption('rtl_mode', $rtl);
    }

    public function isDarkMode(): bool
    {
        return (bool) $this->getOption('dark_mode');
    }

    public function setIsDarkMode(bool $isDarkMode): void
    {
        $this->setOption('dark_mode', $isDarkMode);
    }

    public function getAssetVersion(): string
    {
        $version = $this->getOption('asset_version');
        if (\is_string($version)) {
            return $version;
        }

        return '1.0';
    }

    public function setAssetVersion(string $assetVersion): void
    {
        $this->setOption('asset_version', $assetVersion);
    }

    public function isHeaderDark(): bool
    {
        return (bool) $this->getOption('header_dark');
    }

    public function setIsHeaderDark(bool $isHeaderDark): void
    {
        $this->setOption('header_dark', $isHeaderDark);
    }

    public function isNavbarDark(): bool
    {
        return (bool) $this->getOption('navbar_dark');
    }

    public function setIsNavbarDark(bool $isNavbarDark): void
    {
        $this->setOption('navbar_dark', $isNavbarDark);
    }

    public function isBoxedLayout(): bool
    {
        return (bool) $this->getOption('boxed_layout');
    }

    public function setIsBoxedLayout(bool $boxed): void
    {
        $this->setOption('boxed_layout', $boxed);
    }

    public function getSecurityCoverUrl(): string
    {
        $cover = $this->getOption('security_cover_url');
        if (\is_string($cover)) {
            return $cover;
        }

        return '';
    }

    public function setSecurityCoverUrl(string $url): void
    {
        $this->setOption('security_cover_url', $url);
    }

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array
    {
        return $this->getArrayCopy();
    }

    public function setOption(string $name, mixed $value): void
    {
        $this->offsetSet($name, $value);
    }

    public function hasOption(string $name): bool
    {
        return $this->offsetExists($name);
    }

    public function getOption(string $name, mixed $default = null): mixed
    {
        return $this->offsetExists($name) ? $this->offsetGet($name) : $default;
    }
}
