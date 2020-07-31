<?php
// +----------------------------------------------------------------------
// | DingdanxiaClient.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 10:32
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia;

use Wufly\DingDanXia\Core\BaseContainer;
use Wufly\DingDanXia\Provider\OrderProvider;
use Wufly\DingDanXia\Provider\ProductProvider;

class DingDanXiaClient extends BaseContainer
{
    /**
     * DingdanxiaClient constructor.
     * @param $params
     */
    public function __construct($params = [])
    {
        parent::__construct($params);
    }

    protected $provider = [
        ProductProvider::class,
        // OrderProvider::class
    ];
}
