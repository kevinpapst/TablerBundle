<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Enum;

/**
 * Tabler Colors.
 *
 * @see https://tabler.io/docs/base/colors
 */
enum ColorEnum: string
{
    case Blue = 'blue';
    case BlueLight = 'blue-lt';

    case Azure = 'azure';
    case AzureLight = 'azure-lt';

    case Indigo = 'indigo';
    case IndigoLight = 'indigo-lt';

    case Purple = 'purple';
    case PurpleLight = 'purple-lt';

    case Pink = 'pink';
    case PinkLight = 'pink-lt';

    case Red = 'red';
    case RedLight = 'red-lt';

    case Orange = 'orange';
    case OrangeLight = 'orange-lt';

    case Yellow = 'yellow';
    case YellowLight = 'yellow-lt';

    case Lime = 'lime';
    case LimeLight = 'lime-lt';

    case Green = 'green';
    case GreenLight = 'green-lt';

    case Teal = 'teal';
    case TealLight = 'teal-lt';

    case Cyan = 'cyan';
    case CyanLight = 'cyan-lt';

    // Bootstrap
    case Primary = 'primary';
    case PrimaryLight = 'primary-lt';
    case Secondary = 'secondary';
    case SecondaryLight = 'secondary-lt';
    case Success = 'success';
    case SuccessLight = 'success-lt';
    case Warning = 'warning';
    case WarningLight = 'warning-lt';
    case Danger = 'danger';
    case DangerLight = 'danger-lt';
    case Info = 'info';
    case InfoLight = 'info-lt';

    // Gray palette
    case Gray50 = 'gray-50';
    case Gray100 = 'gray-100';
    case Gray200 = 'gray-200';
    case Gray300 = 'gray-300';
    case Gray400 = 'gray-400';
    case Gray500 = 'gray-500';
    case Gray600 = 'gray-600';
    case Gray700 = 'gray-700';
    case Gray800 = 'gray-800';
    case Gray900 = 'gray-900';

    // Social colors
    case Facebook = 'facebook';
    case Twitter = 'twitter';
    case X = 'x';
    case Linkedin = 'linkedin';
    case Google = 'google';
    case Youtube = 'youtube';
    case Vimeo = 'vimeo';
    case Dribbble = 'dribbble';
    case Github = 'github';
    case Instagram = 'instagram';
    case Pinterest = 'pinterest';
    case Vk = 'vk';
    case Rss = 'rss';
    case Flickr = 'flickr';
    case Bitbucket = 'bitbucket';
    case Tabler = 'tabler';

    /**
     * @return self[]
     */
    public static function bases(): array
    {
        return [
            self::Blue,
            self::Azure,
            self::Indigo,
            self::Purple,
            self::Pink,
            self::Red,
            self::Orange,
            self::Yellow,
            self::Lime,
            self::Green,
            self::Teal,
            self::Cyan,
        ];
    }

    /**
     * @return self[]
     */
    public static function lights(): array
    {
        return [
            self::BlueLight,
            self::AzureLight,
            self::IndigoLight,
            self::PurpleLight,
            self::PinkLight,
            self::RedLight,
            self::OrangeLight,
            self::YellowLight,
            self::LimeLight,
            self::GreenLight,
            self::TealLight,
            self::CyanLight,
        ];
    }

    /**
     * @return self[]
     */
    public static function grays(): array
    {
        return [
            self::Gray50,
            self::Gray100,
            self::Gray200,
            self::Gray300,
            self::Gray400,
            self::Gray500,
            self::Gray600,
            self::Gray700,
            self::Gray800,
            self::Gray900,
        ];
    }

    /**
     * @return self[]
     */
    public static function socials(): array
    {
        return [
            self::Facebook,
            self::Twitter,
            self::X,
            self::Linkedin,
            self::Google,
            self::Youtube,
            self::Vimeo,
            self::Dribbble,
            self::Github,
            self::Instagram,
            self::Pinterest,
            self::Vk,
            self::Rss,
            self::Flickr,
            self::Bitbucket,
            self::Tabler,
        ];
    }
}
