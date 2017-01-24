<?php
/**
 * EscapedFilter.php
 * @author Revin Roman
 * @link https://rmrevin.com
 */

namespace rmrevin\yii\pug\tests\unit\filters;

use Jade\Compiler;
use Jade\Nodes\Filter;
use Pug\Filter\AbstractFilter;

/**
 * Class EscapedFilter
 * @package rmrevin\yii\pug\tests\unit\filters
 */
class EscapedFilter extends AbstractFilter
{

    public function __invoke(Filter $node, Compiler $compiler)
    {
        $output = [];

        foreach ($node->block->nodes as $line) {
            $output[] = $compiler->interpolate($line->value);
        }

        return htmlentities(implode("\n", $output));
    }
}
