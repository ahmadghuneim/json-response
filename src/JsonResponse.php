<?php

namespace App;

class JsonResponse
{
    private $result;

    public function __construct(private string $status, private string $message = "", private array $data = [])
    {
        $this->result = [
            "status" => $this->status
        ];
        echo $this->response();
    }

    public function response(): string
    {
        $statusCode = match ($this->status) {
            "unauthorized" => 401,
            "exception" => 500,
            default => 200,
        };

        header("Content-Type", "application/json");
        header(sprintf("HTTP/1.1 %s %s", $statusCode, $this->status), true, $statusCode);

        if (!empty($this->message)) {
            $this->result["message"] = $this->message;
        }
        if (count($this->data) > 0) {
            $this->result["data"] = $this->data;
        }

        return json_encode($this->result);
    }

}
