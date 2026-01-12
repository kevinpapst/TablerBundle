<?php

namespace KevinPapst\TablerBundle\Twig\Runtime;

use Symfony\UX\Icons\IconRendererInterface;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * @deprecated Use Symfony UX instead
 */
class IconRuntime implements RuntimeExtensionInterface
{
    private readonly array $fa5brands;

    /**
     * @param array<string, string> $icons
     */
    public function __construct(
        private readonly IconRendererInterface $iconRenderer,
        private readonly array $icons,
    ) {
        $this->fa5brands = json_decode(
            file_get_contents(__DIR__ . '/../../Ressources/FontAwesome5/brand-icon-names.json'),
            true
        );
    }

    /**
     * @deprecated Use Symfony UX instead
     */
    public function createIcon(string $name, bool $withIconClass = false, ?string $default = null): string
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
            return $this->icon($name, $withIconClass, $default);
        }

        [$typeNameAbbreviation, $iconFullName] = explode(' ', $fontawesomeFullName);
        $iconName = preg_replace('/^fa-/', '', $iconFullName);
        if ($typeNameAbbreviation === 'fas') {
            $sets = 'fa-solid';
        } elseif ($typeNameAbbreviation === 'far') {
            $sets = 'fa-regular';
        } elseif ($this->isFa5brands($iconName)) {
            $sets = 'fa-brands';
        } else {
            $sets = 'fa-solid';
        }

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

    private function isFa5brands(string $name): bool
    {
        return in_array($name, $this->fa5brands);
    }
}
