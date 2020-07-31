<?php
// +----------------------------------------------------------------------
// | Container.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 10:36
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Core;

class Container implements \ArrayAccess
{
    /**
     * @var array
     */
    private $instances = array();

    /**
     * @var array
     */
    private $values = array();

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        if (isset($this->instances[$offset])) {
            return $this->instances[$offset];
        }
        $raw = $this->values[$offset];
        $val = $this->values[$offset] = $raw($this);
        $this->instances[$offset] = $val;
        return $val;
    }

    public function offsetSet($offset, $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function serviceRegister($provider)
    {
        $provider->serviceProvider($this);
        return $this;
    }
}
