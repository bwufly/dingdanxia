<?php
// +----------------------------------------------------------------------
// | ProductProvider.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:44
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Provider;

use Wufly\DingDanXia\Core\Container;
use Wufly\DingDanXia\Functions\Product\Product;
use Wufly\DingDanXia\Interfaces\Provider;

class ProductProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['product'] = function ($container) {
            return new Product($container);
        };
    }
}
