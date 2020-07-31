<?php
// +----------------------------------------------------------------------
// | BaseEntityParams.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:58
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Entity;

use Wufly\DingDanXia\Interfaces\Params;

abstract class BaseEntityParams extends BaseModel implements Params
{
    public function build()
    {
        // 过滤null
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }
}
