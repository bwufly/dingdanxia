<?php
// +----------------------------------------------------------------------
// | BaseModel.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:55
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Entity;

abstract class BaseModel
{
    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }
            $this->{$key} = $value;
        }
    }
}
