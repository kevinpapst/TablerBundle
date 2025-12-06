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
        return (bool) $this->getOption('navbar_condensed', true);
    }

    public function setIsCondensedNavbar(bool $condensed): void
    {
        $this->setOption('navbar_condensed', $condensed);
    }

    public function isCondensedUserMenu(): bool
    {
        return (bool) $this->getOption('user_menu_condensed', true);
    }

    public function setIsCondensedUserMenu(bool $condensed): void
    {
        $this->setOption('user_menu_condensed', $condensed);
    }

    public function isNavbarOverlapping(): bool
    {
        return (bool) $this->getOption('navbar_overlap', false);
    }

    public function setIsNavbarOverlapping(bool $overlapping): void
    {
        $this->setOption('navbar_overlap', $overlapping);
    }

    public function getThemeBase(): string
    {
        $base = $this->getOption('theme_base', 'slate');

        return \is_string($base) ? $base : 'slate';
    }

    public function setThemeBase(string $base): void
    {
        if (!\in_array($base, ['slate', 'gray', 'zinc', 'neutral', 'stone'], true)) {
            throw new \InvalidArgumentException('Not supported value for "theme_base" option.');
        }
        $this->setOption('theme_base', $base);
    }

    public function getThemePrimary(): string
    {
        $primary = $this->getOption('theme_primary', 'blue');

        return \is_string($primary) ? $primary : 'blue';
    }

    public function setThemePrimary(string $primary): void
    {
        if (!\in_array($primary, ['blue', 'azure', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'lime', 'green', 'teal', 'cyan'], true)) {
            throw new \InvalidArgumentException('Not supported value for "theme_primary" option.');
        }
        $this->setOption('theme_primary', $primary);
    }

    public function getThemeRadius(): string
    {
        $radius = $this->getOption('theme_radius', '0.5');

        return \is_string($radius) ? $radius : '0.5';
    }

    public function setThemeRadius(string $radius): void
    {
        if (!is_numeric($radius)) {
            throw new \InvalidArgumentException('The "theme_radius" option must be a numeric value.');
        }
        $this->setOption('theme_radius', $radius);
    }

    public function isRightToLeft(): bool
    {
        return (bool) $this->getOption('rtl_mode', false);
    }

    public function setIsRightToLeft(bool $rtl): void
    {
        $this->setOption('rtl_mode', $rtl);
    }

    public function isThemeAuto(): bool
    {
        return (bool) $this->getOption('theme_auto', false);
    }

    public function setThemeAuto(bool $themeAuto): void
    {
        $this->setOption('theme_auto', $themeAuto);
    }

    public function isDarkMode(): bool
    {
        return (bool) $this->getOption('dark_mode', false);
    }

    public function setIsDarkMode(bool $isDarkMode): void
    {
        $this->setOption('dark_mode', $isDarkMode);
    }

    public function isHeaderDark(): bool
    {
        return (bool) $this->getOption('header_dark', false);
    }

    public function setIsHeaderDark(bool $isHeaderDark): void
    {
        $this->setOption('header_dark', $isHeaderDark);
    }

    public function isNavbarDark(): bool
    {
        return (bool) $this->getOption('navbar_dark', false);
    }

    public function setIsNavbarDark(bool $isNavbarDark): void
    {
        $this->setOption('navbar_dark', $isNavbarDark);
    }

    public function isBoxedLayout(): bool
    {
        return (bool) $this->getOption('boxed_layout', false);
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
