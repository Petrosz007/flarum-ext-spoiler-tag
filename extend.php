<?php

/*
 * This file is part of Flarum.
 *
 * (c) Toby Zerner <toby.zerner@gmail.com> (Flarum)
 * (c) Two Narwhals (bbbbcode extension)
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Flarum\Extend;
use Flarum\Frontend\Document;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->css(__DIR__ . '/assets/style.css')
        ->content(function (Document $document) {
            $document->body[] = "<script>
                                    /*$('.spoiler-toggle').click(function(){
                                        $(this).toggleClass('spoiler-toggle-active');
                                        $(this).parent().next('div.spoiler-content').slideToggle('slow');
                                    });*/
                                </script>";
        }),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[spoiler]{TEXT1}[/spoiler]',
                '<div class="spoiler">
                    <button class="spoiler-toggle" onclick="$(this).toggleClass(\'spoiler-toggle-active\');$(this).next(\'div.spoiler-content\').slideToggle();">SPOILER</button>
                    <div class="spoiler-content">
                        {TEXT1}
                    </div>
                </div>'
            );
        })
];
