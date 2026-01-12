<?php

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
    public function createIcon(string $name, bool $withIconClass = false, ?string $default = null): string
    {
        return '<i class="' . $this->icon($name, $withIconClass, $default) . '"></i>';
    }

    /**
     * @deprecated Use Symfony UX instead
     */
    public function createIconNew(string $name, bool $withIconClass = false, ?string $default = null): string
    {
        $safeName = str_replace('-', '_', $name);
        if (isset($this->icons[$safeName])) {
            $fontawesomeFullName = $this->icons[$safeName];
        } elseif (str_contains($name, ' ')) {
            $fontawesomeFullName = $name;
        } else {
            return $this->icon($name, $withIconClass, $default);
        }

        [$typeNameAbbreviation, $iconFullName] = explode(' ', $fontawesomeFullName);
        $sets = 'fa7-solid';
        if ($typeNameAbbreviation === 'far') {
            $sets = 'fa7-regular';
        }
        $iconName = preg_replace('/^fa-/', '', $iconFullName);

        return $this->iconRenderer->renderIcon("$sets:$iconName", [
            'class' => $withIconClass ? 'icon' : '',
        ]);
    }

    /**
     * @deprecated Use Symfony UX instead
     */
    public function icon(string $name, bool $withIconClass = false, ?string $default = null): string
    {
        return ($withIconClass ? 'icon ' : '') . ($this->icons[str_replace('-', '_', $name)] ?? ($default ?? $name));
    }
}
