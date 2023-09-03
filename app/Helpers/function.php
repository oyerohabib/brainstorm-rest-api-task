<?php

require_once __DIR__ . '/../Enum/ApiResponseEnum.php';

if (!function_exists('success')) {

    function success(string $message = '', array $data = [], int $code = 200): string|false
    {
        header('Content-Type: application/json');
        http_response_code($code);
        return json_encode([
            'code' => $code,
            'status' => ApiResponseEnum::SUCCESS->name,
            'message' => $message,
            'result' => [
                'data' => $data,
            ],
        ]);
    }
}

if (!function_exists('failed')) {
    function failed(string $message = '',  $data = [], int $code = 400): string|false
    {
        header('Content-Type: application/json');
        http_response_code($code);
        return json_encode([
            'code' => $code,
            'status' => ApiResponseEnum::FAILED->name,
            'message' => $message,
            'result' => [
                'data' => $data,
            ],
        ]);
    }
}
if (!function_exists('transporter')) {
    function transporter(string $action, string $url, array $fields = null): array
    {

        $curl = curl_init();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => $action,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
            ]
        ];
        $options[CURLOPT_POSTFIELDS] = json_encode($fields) ?? null;

        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        return [
            'response' => $response,
            'error' => $err,
            'code' => $code
        ];
    }


    if (!function_exists('handleRequest')) {
        function handleRequest($url, $action, $handler): void
        {
            print_r($url);
            $requestUri = strtok($_SERVER['REQUEST_URI'], '?');
            if ($_SERVER["REQUEST_METHOD"] == $action && $requestUri == $url) {
                call_user_func($handler);
            }
        }
    }
}
