<?php

namespace KevinPapst\TablerBundle\Twig\Extension;

use KevinPapst\TablerBundle\Twig\Runtime\IconRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class IconExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('tabler_icon', [IconRuntime::class, 'htmlClassAttributeValue']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('tabler_icon', [IconRuntime::class, 'renderIcon'], ['is_safe' => ['html']]),
        ];
    }
}
