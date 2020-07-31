<?php
/**
 * Created by PhpStorm.
 * User: wufly
 * Date: 2020/7/31 13:45
 */

namespace Wufly\DingDanXia\Functions\Product;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;
use Wufly\DingDanXia\DingDanXiaClient;
use Wufly\DingDanXia\Entity\Product\ProductInfoParams;
use Wufly\DingDanXia\Entity\Product\ProductLinkParams;

class ProductTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        //设置测试环境变量
        (new Dotenv(true))->load(__DIR__ . DIRECTORY_SEPARATOR . '../../../.env');
    }

    public function testProductInfo()
    {
        $obj = new DingDanXiaClient();
        $obj->setApikey(getenv('Apikey'));
        $res = $obj->product->productInfo(new ProductInfoParams(['id' => 522949387391]))->post();
        print_r($res);
        die;
    }

    public function testToLinkById()
    {
        $obj = new DingDanXiaClient();
        $obj->setApikey(getenv('Apikey'));
        $res = $obj->product->toLinkById(new ProductLinkParams(['id' => 522949387391]))->post();
        print_r($res);
        die;
    }
}
