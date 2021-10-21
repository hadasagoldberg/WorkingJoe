<?php
namespace knifePHP\core;

class API
{
    public function __construct()
    {
        $this->responseData = [];
    }

    public function success($data)
    {
        $this->response([
            'success' => true,
            'data' => $data
        ]);
        $this->stop();
    }

    public function abort($httpCode, $message)
    {
        $this->response([
            'success' => false,
            'error' => [
                'code' => $httpCode,
                'message' => $message
            ]
        ]);
        $this->stop();
    }

    private function response($data) {
        $this->responseData = $data;
    }

    private function stop() {
        $JSON = json_encode($this->responseData, JSON_PRETTY_PRINT);
        echo $JSON;
        exit;
    }
}