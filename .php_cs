<?php

$header = <<<EOF
(c) Rob Bast <rob.bast@gmail.com>

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->files()
    ->name('*.php')
    ->in(__DIR__)
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers(array(
        '-concat_without_spaces',
        '-phpdoc_params',
        '-phpdoc_separation',
        '-phpdoc_to_comment',
        '-phpdoc_var_without_name',
        '-pre_increment',
        '-return',
        'concat_with_spaces',
        'newline_after_open_tag',
        'header_comment',
        'ordered_use',
        'phpdoc_order',
        'short_array_syntax',
        'strict',
        'strict_param',
    ))
    ->finder($finder)
;
