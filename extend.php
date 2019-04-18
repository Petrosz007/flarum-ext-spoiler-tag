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
        ->css(__DIR__.'/assets/style.css'),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[spoiler]{TEXT1}[/spoiler]',
                '<div class="spoiler">
                    <input type="radio" name="radacc" class="accordion-chk" />
                    <h3 class="spoiler-header">
                        SPOILER
                    <span class="spoiler-icon"></span>
                    </h3>
                    <div class="spoiler-content">
                        <p>
                        {TEXT1}
                        </p>
                    </div>
                </div>'
            );
        })
];
