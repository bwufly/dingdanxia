<?php
// +----------------------------------------------------------------------
// | BaseContainer.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 11:30
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Core;

class BaseContainer extends Container
{
    /**
     * @var array
     */
    public $params;

    /**
     * @var string
     */
    public $apikey;

    /**
     * @var array
     */
    protected $provider = [];

    public function __construct($params)
    {
        if ($params) {
            foreach ($params as &$param) {
                if (is_array($param) || is_object($param)) {
                    $param = json_encode($param, JSON_UNESCAPED_UNICODE);
                }
            }
        }
        $this->params = $params;

        $provider_callback = function ($provider) {
            $obj = new $provider;
            $this->serviceRegister($obj);
        };
        array_walk($this->provider, $provider_callback);
    }


    public function setApikey($apikey)
    {
        $this->apikey = $apikey;
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }
}
