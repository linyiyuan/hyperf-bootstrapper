<?php
namespace App\Foundation\Facades;

use Illuminate\Support\Facades\Facade;
use anlutro\cURL\cURLException;
use anlutro\cURL\Request;

/**
 * cURL facade class.
 */
class cURL extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'anlutro\cURL\cURL';
    }

    /**
     * send cURL request
     *
     * @param string $url  request url
     * @param string $method HTTP method
     * @param array $data request data
     * @param array $headers request headers
     * @param array $options curl options
     * @param bool $isReturnArray isReturnArray
     * @param int $encoding encoding
     * @return mixed array | false
     * @throws \Exception
     */
    public static function sendRequest($url, $method = 'GET', $data = [], $headers = [], $options = [],
                                       $encoding = Request::ENCODING_QUERY, $isReturnArray = true)
    {
        $baseOptions = [
            CURLOPT_TIMEOUT_MS => 3000000,
            CURLOPT_CONNECTTIMEOUT_MS => 60000,
            CURLOPT_FORBID_REUSE => false,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ];
        $options = $baseOptions + $options;
        try {
            $request = cURL::newRequest($method, $url)
                ->setHeaders($headers)
                ->setOptions($options);
            if ($data) {
                $request->setData($data);
                $request->setEncoding($encoding);
            }

            if($isReturnArray) {
                $response  = json_decode($request->send()->body, true);
            }else{
                $response = $request->send()->body;
            }
        } catch (cURLException $exc) {
            throw new \Exception($exc->getMessage(), 400);
        }

        return $response;
    }

    /**
     * Send json request
     *
     * @param $url
     * @param string $method
     * @param array $data
     * @param array $headers
     * @param array $options
     * @param bool $isReturnArray
     * @return mixed array | null
     * @throws \Exception
     */
    public static function sendJsonRequest($url, $method = 'GET', $data = [], $headers = [], $options = [], $isReturnArray = true)
    {
        return self::sendRequest($url, $method, $data, $headers, $options, Request::ENCODING_JSON, $isReturnArray);
    }


}