<?php

require_once  __DIR__ . '/../Helpers/function.php';
require_once __DIR__ . '/../Enum/ActionEnum.php';

class Capsule
{
    protected static string $base_url =  "https://api.spacexdata.com/v3";

    /**
     * @throws Exception
     */
    public static function getCapsules()
    {
        $result = transporter(ActionEnum::GET->name, self::$base_url . "/capsules");
        if ($result['error']) {
            throw new Exception("Something went wrong");
        }
        $response = json_decode($result['response'], true);

        if (isset($response['error']) ||  $result['code'] != 200) {
            throw new Exception($response['error']);
        }
        return $response;
    }

    /**
     * @throws Exception
     */
    public static function getOneCapsule($serial)
    {
        $result = transporter(ActionEnum::GET->name, self::$base_url . "/capsules/$serial");

        if ($result['error']) {
            throw new Exception("Error, not found");
        }
        $response = json_decode($result['response'], true);

        if (isset($response['error']) ||  $result['code'] != 200) {
            throw new Exception($response['error']);
        }
        return $response;
    }
}
