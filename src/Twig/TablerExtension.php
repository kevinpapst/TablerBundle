<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TablerExtension extends AbstractExtension
{
    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('tabler_container', [RuntimeExtension::class, 'containerClass']),
            new TwigFilter('tabler_body', [RuntimeExtension::class, 'bodyClass']),
            new TwigFilter('tabler_theme', [RuntimeExtension::class, 'theme']),
            new TwigFilter('tabler_route', [RuntimeExtension::class, 'getRouteByAlias']),
            new TwigFilter('tabler_icon', [RuntimeExtension::class, 'icon']),
        ];
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('tabler_menu', [RuntimeExtension::class, 'getMenu']),
            new TwigFunction('tabler_notifications', [RuntimeExtension::class, 'getNotifications']),
            new TwigFunction('tabler_user', [RuntimeExtension::class, 'getUserDetails']),
            new TwigFunction('tabler_icon', [RuntimeExtension::class, 'createIcon'], ['is_safe' => ['html']]),
            new TwigFunction('tabler_unique_id', [RuntimeExtension::class, 'uniqueId']),
        ];
    }
}
