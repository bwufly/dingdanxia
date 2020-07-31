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

class ProductLinkParams extends BaseEntityParams
{
    public $id;
    public $text; // 要生成口令的标题，默认使用商品标题
    public $shorturl = true; // 是否生成短连接
}
