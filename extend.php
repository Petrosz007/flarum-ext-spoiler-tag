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
        ->css(__DIR__ . 'assets/style.css')
        ->content(function (Document $document) {
            $document->head[] = "<script>
                                    let spoilers = document.getElementsByClassName('spoiler-collapse');

                                    for(let index_ = 0; index_ < spoilers.length; index_++) {
                                        let element = spoilers[index_];
                                        element.addEventListener('click', (e) => {
                                            e.currentTarget.classList.toggle('spoiler-collapse-active');

                                            let spoiler_content = e.currentTarget.nextElementSibling;
                                            if(spoiler_content.style.maxHeight == 0) {
                                                spoiler_content.style.maxHeight = 0;
                                            } else {
                                                spoiler_content.style.maxHeight = spoiler_content.scrollHeight + 'px';
                                            }
                                        });
                                    }
                                </script>";
        }),
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->BBCodes->addCustom(
                '[spoiler]{TEXT1}[/spoiler]',
                '<div class="spoiler">
                    <button class="spoiler-collapse">SPOILER</button>
                    <div class="spoiler-content">
                        <p>
                        {TEXT1}
                        </p>
                    </div>
                </div>'
            );
        })
];
