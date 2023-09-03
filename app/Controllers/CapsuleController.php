<?php

require_once __DIR__ . "/../Services/Capsule.php";

class CapsuleController
{
    public function getCapsules(): void
    {
        try {
            $result =  Capsule::getCapsules();
            echo success("success", $result);
        } catch (Exception $exception) {
            echo failed($exception->getMessage(), $exception);
        }
    }

    public function getOneCapsule($serial): void
    {
        try {
            $result =  Capsule::getOneCapsule($serial);
            echo success("success", $result);
        } catch (Exception $exception) {
            echo failed($exception->getMessage(), $exception);
        }
    }
}
