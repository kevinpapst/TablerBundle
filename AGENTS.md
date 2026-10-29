# AGENTS.md

Guidance for AI coding agents working on this repository.

## Project overview

`kevinpapst/tabler-bundle` is a Symfony bundle that integrates the [Tabler.io](https://tabler.io) admin template
(Bootstrap 5) into Symfony applications. Most of its value lives in Twig templates: layouts, includes,
embeds and macros that projects extend or import via the `@Tabler/` namespace.

- PHP `^8.1`, Symfony `^6.0 || ^7.0 || ^8.0`, Twig `^3.0`
- Namespace: `KevinPapst\TablerBundle\` (PSR-4 → `src/`), tests in `KevinPapst\TablerBundle\Tests\` (→ `tests/`)
- The bundle is a library: keep it simple and pragmatic. Features that add a lot of complexity or don't fit
  the bundle's philosophy are usually rejected — prefer small, focused changes.
- Code, docs, commit messages and discussions are in English.

## Repository layout

| Path                          | Content                                                                                                       |
|-------------------------------|---------------------------------------------------------------------------------------------------------------|
| `src/DependencyInjection/`    | `Configuration.php` (config tree), `TablerExtension.php`, `Compiler/TwigPass.php`                             |
| `src/Twig/`                   | `TablerExtension` (registers filters/functions) and `RuntimeExtension` (their implementation, `twig.runtime`) |
| `src/Helper/`                 | `ContextHelper` (runtime theme options, getters/setters), `Constants`                                         |
| `src/Event/`, `src/Model/`    | Events (menu, notifications, user details, theme) and their models/interfaces                                 |
| `src/Enum/`                   | `ColorEnum`                                                                                                   |
| `config/services.yml`         | Service definitions                                                                                           |
| `config/packages/tabler.yaml` | Default config that users copy into their project — keep in sync with `Configuration.php`                     |
| `templates/`                  | Layouts (`layout_vertical`, `layout_horizontal`, `security`, `security_cover`, `fullpage`, `error`, `wizard`) |
| `templates/components/`       | Twig macros (button, badge, dropdown, avatar, progress_bar, …)                                                |
| `templates/embeds/`           | Embeddable templates (card, modal, offcanvas, card_nav, …)                                                    |
| `templates/includes/`         | Partials (navbar, menu, footer, html_head, `utils.html.twig` helper macros)                                   |
| `templates/layout/`           | Form themes                                                                                                   |
| `translations/`               | XLIFF files, domain `TablerBundle`                                                                            |
| `assets/`                     | SCSS/JS sources for the Tabler build (Webpack Encore)                                                         |
| `public/`                     | **Built** assets (CSS, JS, fonts) — committed, but generated                                                  |
| `docs/`                       | User documentation, entry point `docs/index.md`                                                               |
| `UPGRADING.md`                | Changelog of deprecations and breaking changes                                                                |

## Commands

```bash
composer install
composer codestyle-fix   # php-cs-fixer, apply fixes
composer codestyle       # php-cs-fixer, dry run (as in CI)
composer phpstan         # PHPStan level 9 for src/ and tests/
composer tests           # PHPUnit
```

CI (`.github/workflows/linting.yaml`) runs codestyle, PHPStan and tests on PHP 8.1 – 8.5.
Run all three before considering a change done.

## Coding conventions

### PHP

- Every PHP file starts with the license header enforced by `.php-cs-fixer.php`:
  ```php
  /*
   * This file is part of the Tabler bundle, created by Kevin Papst (www.kevinpapst.de).
   *
   * For the full copyright and license information, please view the LICENSE
   * file that was distributed with this source code.
   */
  ```
- Let php-cs-fixer decide formatting; don't hand-format against it.
- PHPStan runs at level 9 with strict, deprecation and Symfony rules — add precise types and PHPDoc generics
  (e.g. `@return TwigFunction[]`) instead of adding ignore rules.
- Code must stay compatible with PHP 8.1 and all supported Symfony major versions (6, 7, 8). Don't use
  language or framework features that aren't available across that range.
- New Twig filters/functions: register them in `src/Twig/TablerExtension.php` and implement them in
  `src/Twig/RuntimeExtension.php`; prefix names with `tabler_`.
- New config options: add them to `Configuration.php`, `config/packages/tabler.yaml` and, if they are
  runtime options, as getter/setter to `ContextHelper`.

### Twig templates

- File names are **snake_case** (`layout_horizontal.html.twig`). The kebab-case files are deprecated aliases
  that only exist for BC — never add new kebab-case templates, and keep the deprecated ones working.
- Templates are referenced through the `@Tabler/` namespace.
- Macros take a single `options` hash. Read each option into a local `_`-prefixed variable with a default:
  ```twig
  {% set _color = options.color ?? 'green' %}
  {% set _extraClass = options.extraClass ?? '' %}
  {% set _attr = options.attr ?? {} %}
  ```
  Support `extraClass` and `attr` (rendered via `utils.attr_to_html()` from `@Tabler/includes/utils.html.twig`)
  where it makes sense. Option names are camelCase.
- Use `href` (not `url`) for link targets in new code; `url` is kept for BC.
- Templates must not depend directly on the request or session objects; use the Twig functions/`ContextHelper`.
- Templates must still render when the translator is disabled.
- Wrap overridable parts in `{% block %}`s so projects can customise them without copying the template.
- Follow Tabler's markup and CSS classes (see https://preview.tabler.io / `@tabler/core`) rather than inventing
  custom HTML structures.

### Backwards compatibility

This bundle is used by many projects (e.g. Kimai). Avoid breaking changes:

- Deprecate instead of removing: keep old options/templates working, use `{% deprecated '...' %}` in Twig
  or a fallback that maps the old option onto the new one.
- Document every deprecation and breaking change in `UPGRADING.md` under the upcoming version.

### Translations

- Strings use the `TablerBundle` domain: `{{ 'Sign out'|trans({}, 'TablerBundle') }}`.
- When adding a new string, add the `trans-unit` to **`TablerBundle.en.xlf` and `TablerBundle.de.xlf`**.
- All other languages are managed via [Weblate](https://hosted.weblate.org/projects/kimai/theme/) — do not
  edit those files by hand.

### Frontend assets

- Sources are in `assets/` and built with Webpack Encore (`webpack.config.js`, `yarn build`) into `public/`.
- Only change files in `assets/`. **Do not rebuild or commit `public/`** — the maintainer rebuilds the assets.

## Git

- Do not commit and do not create branches unless explicitly asked to. Leave changes in the working tree
  for the maintainer to review.

## Supply-chain files

`composer.json`, `package.json`, all `*.lock` files and everything under `.github/` are protected by a CI check
and may only be changed by trusted maintainers. Do not modify them unless explicitly asked to.

## Tests

- PHPUnit tests live in `tests/`, mirroring the `src/` structure.
- Add tests for PHP changes. Template behaviour can be tested by rendering through a Twig `Environment` with the
  bundle's extensions (see `tests/Twig/SecurityLoginTest.php` and `tests/Twig/LayoutHorizontalTest.php`).

## Manual / visual testing

UI and template changes should also be checked visually in the demo application
[TablerBundle-Demo](https://github.com/kevinpapst/TablerBundle-Demo) (locally at `../TablerBundle-Demo`).
It requires `kevinpapst/tabler-bundle: dev-main` and showcases most components. Note that the demo installs
the bundle into its own `vendor/` — local changes in this repository are not picked up automatically.

## Documentation

- When adding or changing a feature (macro option, embed, config option, event), update the matching file
  in `docs/` and link new pages from `docs/index.md`.
- Keep `README.md` focused on installation and overview.
