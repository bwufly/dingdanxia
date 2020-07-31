<?php
// +----------------------------------------------------------------------
// | BaseClient.php
// +----------------------------------------------------------------------
// | Description:
// +----------------------------------------------------------------------
// | Time: 2020/7/31 10:35
// +----------------------------------------------------------------------
// | Author: wufly <wfxykzd@163.com>
// +----------------------------------------------------------------------

namespace Wufly\DingDanXia\Core;

class BaseClient
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var string
     */
    protected $base_url = 'http://api.tbk.dingdanxia.com/';

    /**
     * @var string
     */
    protected $url_info;

    /**
     * @var
     */
    protected $post_data;

    /**
     * @var
     */
    protected $res_url;

    /**
     * BaseClient constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * @function get请求
     * @return mixed
     * @throws Exception
     */
    public function get()
    {
        // 拼接参数
        $this->setParam('get');
        $file = $this->curlRequest($this->res_url, '', 'get');
        return json_decode($file, true);
    }

    private function setParam($method)
    {
        $method = strtolower($method);
        if (empty($this->url_info)) {
            throw new Exception('url因子为空，如无配置，请配置');
        }

        $params = $this->app->params;
        if ($params) {
            foreach ($params as &$param) {
                $param = is_string($param) ? $param : json_encode($param, JSON_UNESCAPED_UNICODE);
            }
        }
        //配置参数，请用apiInfo对应的api参数进行替换

        $code_arr = array_merge([
            'apikey' => $this->app->apikey
        ], $params);
        $this->post_data = $code_arr;
        if ($method === 'get') {
            $dingdanxiaParams = array();
            foreach ($code_arr as $key => $val) {
                $dingdanxiaParams[] = $key . '=' . $val;
            }
            $this->res_url = $this->base_url . $this->url_info . '?' . implode('&', $dingdanxiaParams);
        } else {
            $this->res_url = $this->base_url . $this->url_info;
        }
    }

    /**
     * @function post请求
     * @return mixed
     * @throws Exception
     */
    public function post()
    {
        $this->setParam('post');
        $result = $this->curlRequest($this->res_url, $this->post_data, 'post');
        return json_decode($result, true);
    }

    /**
     * curl 请求
     * @param $base_url
     * @param $query_data
     * @param string $method
     * @param bool $ssl
     * @param int $exe_timeout
     * @param int $conn_timeout
     * @param int $dns_timeout
     * @return bool|string
     */
    public function curlRequest(
        $base_url,
        $query_data,
        $method = 'get',
        $ssl = true,
        $exe_timeout = 10,
        $conn_timeout = 10,
        $dns_timeout = 3600
    ) {
        $method = strtolower($method);
        $ch = curl_init();
        if ($method === 'get') {
            //method get
            if ((!empty($query_data))
                && (is_array($query_data))
            ) {
                $connect_symbol = (strpos($base_url, '?')) ? '&' : '?';
                foreach ($query_data as $key => $val) {
                    if (is_array($val)) {
                        $val = serialize($val);
                    }
                    $base_url .= $connect_symbol . $key . '=' . rawurlencode($val);
                    $connect_symbol = '&';
                }
            }
        } else {
            if ((!empty($query_data))
                && (is_array($query_data))
            ) {
                foreach ($query_data as $key => $val) {
                    if (is_array($val)) {
                        $query_data[$key] = serialize($val);
                    }
                }
            }
            //method post
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query_data);
        }
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $conn_timeout);
        curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, $dns_timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $exe_timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // 关闭ssl验证
        if ($ssl) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        $output = curl_exec($ch);
        if ($output === false) {
            $output = '';
        }
        curl_close($ch);
        return $output;
    }

    public function setApi($apiInfo)
    {
        $this->url_info = $apiInfo;
    }
}
