<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Twig\Extension;

use KevinPapst\TablerBundle\Twig\Runtime\IconRuntime;
use Twig\DeprecatedCallableInfo;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class IconExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            /* @phpstan-ignore-next-line */
            new TwigFilter('tabler_icon', [IconRuntime::class, 'htmlClassAttributeValue'], [
                'deprecation_info' => new DeprecatedCallableInfo('kevinpapst/tabler-bundle', '3.0'),
            ]),
        ];
    }

    public function getFunctions(): array
    {
        return [
            /* @phpstan-ignore-next-line */
            new TwigFunction('tabler_icon', [IconRuntime::class, 'renderIcon'], [
                'is_safe' => ['html'],
                'deprecation_info' => new DeprecatedCallableInfo('kevinpapst/tabler-bundle', '3.0'),
            ]),
        ];
    }
}
