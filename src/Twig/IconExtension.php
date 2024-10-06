<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Twig;

use Symfony\UX\Icons\IconRenderer;
use Twig\Extension\RuntimeExtensionInterface;

final class IconExtension implements RuntimeExtensionInterface
{
    /**
     * @param array<string, string> $icons
     */
    public function __construct(
        private readonly IconRenderer $iconRenderer,
        private readonly array $icons
    ) {
    }

    public function createIcon(string $name, bool $withIconClass = false, string $default = null): string
    {
        $icon = $this->getIcon($name, $default);

        if (str_contains($icon, ':')) {
            return $this->iconRenderer->renderIcon($icon, ['class' => 'icon']);
        }

        @trigger_error('Support for webfonts is deprecated. Switch to UX icons. Using twig function tabler_icon("' . $name . '") is deprecated.', \E_USER_DEPRECATED);

        return '<i class="' . $this->icon($name, $withIconClass, $default) . '"></i>';
    }

    public function icon(string $name, bool $withIconClass = false, string $default = null): string
    {
        $icon = $this->getIcon($name, $default);

        @trigger_error('Support for webfonts is deprecated. Switch to UX icons. Using Twig filter "' . $name . '"|tabler_icon is deprecated.', \E_USER_DEPRECATED);

        return ($withIconClass ? 'icon ' : '') . $icon;
    }

    private function getIcon(string $name, string $default = null): string
    {
        return $this->icons[str_replace('-', '_', $name)] ?? ($default ?? $name);
    }
}
