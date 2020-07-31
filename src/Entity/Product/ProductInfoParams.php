<?php
// +----------------------------------------------------------------------
// | ProductInfoParams.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:57
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Entity\Product;

use Wufly\DingDanXia\Entity\BaseEntityParams;

class ProductInfoParams extends BaseEntityParams
{
    public $id;
    public $info = 'all';
}
