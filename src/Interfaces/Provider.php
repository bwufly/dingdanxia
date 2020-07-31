<?php
// +----------------------------------------------------------------------
// | Provider.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:46
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Interfaces;

use Wufly\DingDanXia\Core\Container;

interface Provider
{
    /**
     * @function
     * @param Container $container
     * @return mixed
     */
    public function serviceProvider(Container $container);

}
