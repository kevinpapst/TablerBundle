<?php

/*
 * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KevinPapst\TablerBundle\Tests\Twig;

use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\Forms;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\RuntimeLoader\FactoryRuntimeLoader;

class FormThemeImageCheckTest extends TestCase
{
    /**
     * @return iterable<string, array{string}>
     */
    public static function getThemes(): iterable
    {
        yield 'vertical' => ['@Tabler/layout/form_theme.html.twig'];
        yield 'horizontal' => ['@Tabler/layout/form_theme_horizontal.html.twig'];
    }

    /**
     * @dataProvider getThemes
     */
    public function testSingleChoiceIsRenderedAsImageRadios(string $theme): void
    {
        $xpath = $this->renderForm($theme, ['data' => 'paris']);

        $inputs = $xpath->query('//label[@class="form-imagecheck mb-2"]/input[@class="form-imagecheck-input"]');
        self::assertNotFalse($inputs);
        self::assertCount(2, $inputs);
        self::assertSame('radio', $this->attribute($inputs, 0, 'type'));
        self::assertSame('form[restaurant]', $this->attribute($inputs, 0, 'name'));
        self::assertSame('paris', $this->attribute($inputs, 0, 'value'));
        self::assertSame('checked', $this->attribute($inputs, 0, 'checked'));
        self::assertNull($this->attribute($inputs, 1, 'checked'));

        $images = $xpath->query('//span[@class="form-imagecheck-figure"]/img[@class="form-imagecheck-image"]');
        self::assertNotFalse($images);
        self::assertCount(2, $images);
        self::assertSame('/logos/paris.png', $this->attribute($images, 0, 'src'));
        self::assertSame('Paris', $this->attribute($images, 0, 'alt'));

        self::assertCount(2, $xpath->query('//div[@class="row g-2"]/div[@class="col-6 col-sm-4"]') ?: []);
    }

    public function testMultipleChoiceIsRenderedAsImageCheckboxes(): void
    {
        $xpath = $this->renderForm('@Tabler/layout/form_theme.html.twig', ['multiple' => true, 'data' => ['lyon']]);

        $inputs = $xpath->query('//input[@class="form-imagecheck-input"]');
        self::assertNotFalse($inputs);
        self::assertCount(2, $inputs);
        self::assertSame('checkbox', $this->attribute($inputs, 0, 'type'));
        self::assertSame('form[restaurant][]', $this->attribute($inputs, 0, 'name'));
        self::assertNull($this->attribute($inputs, 0, 'checked'));
        self::assertSame('checked', $this->attribute($inputs, 1, 'checked'));
    }

    public function testChoiceWithoutImageShowsItsLabelAsCaption(): void
    {
        $xpath = $this->renderForm('@Tabler/layout/form_theme.html.twig', [
            'choice_attr' => static fn (string $choice): array => 'paris' === $choice ? ['data-image' => '/logos/paris.png'] : [],
        ]);

        $captions = $xpath->query('//span[@class="form-imagecheck-figure"]/span[@class="form-imagecheck-caption"]');
        self::assertNotFalse($captions);
        self::assertCount(1, $captions);
        $caption = $captions->item(0);
        self::assertInstanceOf(\DOMElement::class, $caption);
        self::assertSame('Lyon', $caption->textContent);
    }

    public function testColumnClassCanBeChanged(): void
    {
        $xpath = $this->renderForm('@Tabler/layout/form_theme.html.twig', [], "{{ form_widget(form.restaurant, {imagecheck_column_class: 'col-auto'}) }}");

        self::assertCount(2, $xpath->query('//div[@class="row g-2"]/div[@class="col-auto"]') ?: []);
    }

    public function testExpandedChoiceWithoutTheBlockPrefixIsUnchanged(): void
    {
        $xpath = $this->renderForm('@Tabler/layout/form_theme.html.twig', ['block_prefix' => null]);

        self::assertCount(0, $xpath->query('//input[@class="form-imagecheck-input"]') ?: []);
        self::assertCount(2, $xpath->query('//div[contains(@class, "form-check")]/input[@name="form[restaurant]"]') ?: []);
    }

    /**
     * @param array<string, mixed> $options
     */
    private function renderForm(string $theme, array $options, string $template = '{{ form_widget(form.restaurant) }}'): \DOMXPath
    {
        $formTemplates = (new \ReflectionClass(FormExtension::class))->getFileName();
        self::assertIsString($formTemplates);

        $loader = new FilesystemLoader([\dirname($formTemplates, 2) . '/Resources/views/Form']);
        $loader->addPath(__DIR__ . '/../../templates', 'Tabler');

        $twig = new Environment($loader, ['strict_variables' => true]);
        $twig->addExtension(new TranslationExtension());
        $twig->addExtension(new FormExtension());
        $twig->addRuntimeLoader(new FactoryRuntimeLoader([
            FormRenderer::class => static fn () => new FormRenderer(new TwigRendererEngine([$theme], $twig)),
        ]));

        $form = Forms::createFormFactory()
            ->createBuilder()
            ->add('restaurant', ChoiceType::class, array_merge([
                'choices' => ['Paris' => 'paris', 'Lyon' => 'lyon'],
                'expanded' => true,
                'block_prefix' => 'tabler_imagecheck',
                'choice_attr' => static fn (string $choice): array => ['data-image' => '/logos/' . $choice . '.png'],
            ], $options))
            ->getForm();

        $html = $twig->createTemplate($template)->render(['form' => $form->createView()]);

        $document = new \DOMDocument();
        $document->loadHTML('<!DOCTYPE html><html><body>' . $html . '</body></html>', \LIBXML_NOERROR);

        return new \DOMXPath($document);
    }

    /**
     * @param \DOMNodeList<\DOMNameSpaceNode|\DOMNode> $nodes
     */
    private function attribute(\DOMNodeList $nodes, int $index, string $name): ?string
    {
        $node = $nodes->item($index);
        self::assertInstanceOf(\DOMElement::class, $node);

        return $node->hasAttribute($name) ? $node->getAttribute($name) : null;
    }
}
