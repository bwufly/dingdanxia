<?php
// +----------------------------------------------------------------------
// | Product.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:50
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Functions\Product;

use Wufly\DingDanXia\Core\BaseClient;
use Wufly\DingDanXia\Entity\Product\ProductInfoParams;
use Wufly\DingDanXia\Entity\Product\ProductLinkParams;

class Product extends BaseClient
{
    public function productInfo(ProductInfoParams $params)
    {
        $this->app->params = $params->build();
        $this->url_info = 'shop/good_info';
        return $this;
    }

    public function toLinkById(ProductLinkParams $params)
    {
        $this->app->params = $params->build();
        $this->url_info = 'tbk/id_privilege';
        return $this;
    }
}
