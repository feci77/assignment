<?php


namespace App\Services;


use App\Models\User;

class ShopifyService
{
    /** @var string $baseUrl */
    public $baseUrl;

    /** @var array $headers */
    public $headers;

    public function __construct($token = null)
    {
        $this->headers = [
            'X-Shopify-Access-Token' => $token
        ];
        $this->baseUrl = '/admin/';
    }

    /**
     * @return array|mixed
     */
    public function getAllProducts()
    {
        $result = $this->call($this->baseUrl.'products.json',[],"GET");
        if ($result['status'] >= 200 &&  $result['status'] < 300 ) {
            //return the products
            return $result['body']->container['products'];
        }else{
            return [];
        }
    }

    /**
     * Get Product by providing shpoify id. Record or []
     * @param $id
     * @return array|mixed
     */
    public function getProduct($id)
    {

        $result = $this->call($this->baseUrl.'products/'.$id.'.json',[],"GET");
        if ($result['status'] >= 200 &&  $result['status'] < 300 ) {
            //return the products
            return $result['body']->container['product'];
        }else{
            return [];
        }
    }

    /**
     * //currently this would work only for one user, for more then one users we can add the login to app, and get
     * logged in user here and its credentials for further process.
     * @param $url
     * @param array $body
     * @param string $method
     * @return array|\GuzzleHttp\Promise\Promise|\stdClass
     */
    public function call($url, $body = [] , $method = "GET")
    {
        $shop = User::first();
        return $shop->api()->rest($method, $url, $body);
    }
}
