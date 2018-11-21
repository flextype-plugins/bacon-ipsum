<?php

/**
 *
 * Flextype Bacon Ipsum Plugin
 *
 * @author Romanenko Sergey / Awilum <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;
use Flextype\Component\Registry\Registry;
use Flextype\Component\Event\Event;

// Event: onShortcodesInitialized
Event::addListener('onShortcodesInitialized', function () {

    // Shortcode: [bacon]
    Content::shortcode()->addHandler('bacon', function(ShortcodeInterface $s) {
        return bacon($s->getParameter('type') ?? 'all-meat',
                     $s->getParameter('p') ?? 1,
                     $s->getParameter('sentences') ?? 0,
                     $s->getParameter('start_with_lorem') ?? 0,
                     $s->getParameter('format') ?? 'text');
    });
});

/**
 * Return bacon ipsum text
 *
 * @param  string $type all-meat for meat only or meat-and-filler for meat mixed with miscellaneous ‘lorem ipsum’ filler.
 * @param  int    $p optional number of paragraphs, defaults to 5.
 * @param  int    $sentences number of sentences (this overrides paragraphs)
 * @param  int    $start_with_lorem optional pass 1 to start the first paragraph with ‘Bacon ipsum dolor sit amet’.
 * @param  string $format ‘text’ (default), ‘json’, or ‘html’
 * @return string
 */
function bacon(string $type = 'all-meat', int $p = 1, int $sentences = 0, int $start_with_lorem = 0, string $format = 'text') : string
{
    if (Registry::get('plugins.bacon-ipsum.type') && in_array(Registry::get('plugins.bacon-ipsum.type'), ['all-meat', 'meat-and-filler'])) {
        $type = '?type='.Registry::get('plugins.bacon-ipsum.type');
    } else {
        $type = '?type='.$type;
    }

    if (Registry::get('plugins.bacon-ipsum.p')) {
        $p = '&paras='.Registry::get('plugins.bacon-ipsum.p');
    } else {
        $p = '&paras='.$p;
    }

    if (Registry::get('plugins.bacon-ipsum.sentences')) {
        $sentences = '&sentences='.Registry::get('plugins.bacon-ipsum.sentences');
    } else {
        $sentences = '&sentences='.$sentences;
    }

    if (Registry::get('plugins.bacon-ipsum.start_with_lorem') && in_array($start_with_lorem, ['0', '1'])) {
        $start_with_lorem = '&start-with-lorem='.Registry::get('plugins.bacon-ipsum.start_with_lorem');
    } else {
        $start_with_lorem = '&start-with-lorem='.$start_with_lorem;
    }

    if (Registry::get('plugins.bacon-ipsum.format') && in_array($format, ['json', 'text', 'html'])) {
        $format = '&format='.Registry::get('plugins.bacon-ipsum.format');
    } else {
        $format = '&format='.$format;
    }

    return file_get_contents("http://baconipsum.com/api/{$type}{$p}{$sentences}{$start_with_lorem}{$format}");
}
