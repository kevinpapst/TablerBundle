<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Twig\Runtime;

use Symfony\UX\Icons\IconRendererInterface;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * @deprecated Use Symfony UX instead
 */
class IconRuntime implements RuntimeExtensionInterface
{
    /**
     * @param array<string, string> $icons
     */
    public function __construct(
        private readonly IconRendererInterface $iconRenderer,
        private readonly array $icons,
    ) {
    }

    /**
     * @deprecated Use Symfony UX instead
     */
    public function renderIcon(string $name, bool $withIconClass = false, ?string $default = null): string
    {
        $safeName = str_replace('-', '_', $name);
        if (isset($this->icons[$safeName])) {
            // Tabler icon shortcut
            $fontawesomeFullName = $this->icons[$safeName];
        } elseif (str_contains($name, ' ')) {
            // Fontawesome with space
            $fontawesomeFullName = $name;
        } elseif (str_contains($name, ':')) {
            // Ux icon
            return $this->iconRenderer->renderIcon($name, [
                'class' => $withIconClass ? 'icon' : '',
            ]);
        } else {
            return $this->htmlClassAttributeValue($name, $withIconClass, $default);
        }

        [$typeNameAbbreviation, $iconFullName] = explode(' ', $fontawesomeFullName);
        $iconName = preg_replace('/^fa-/', '', $iconFullName);
        $sets = match ($typeNameAbbreviation) {
            'far' => 'fa-regular',
            'fab' => 'fa-brands',
            default => 'fa-solid',
        };

        return $this->iconRenderer->renderIcon("$sets:$iconName", [
            'class' => $withIconClass ? 'icon' : '',
        ]);
    }

    /**
     * @deprecated Use Symfony UX instead
     */
    public function htmlClassAttributeValue(string $name, bool $withIconClass = false, ?string $default = null): string
    {
        return ($withIconClass ? 'icon ' : '') . ($this->icons[str_replace('-', '_', $name)] ?? ($default ?? $name));
    }
}
