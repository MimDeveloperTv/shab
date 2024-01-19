<?php

namespace Core\Actions;

use Core\Http\Responses\ResponseFactory;
use Core\Lucid\Action;
use Illuminate\Http\JsonResponse;

class RespondWithJsonAction extends Action
{
    protected $content;

    protected $status;

    protected $headers;

    protected $options;

    public function __construct($content, $status = 200, array $headers = [], $options = 0)
    {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
        $this->options = $options;
    }

    public function handle(ResponseFactory $factory): JsonResponse
    {
        $response = [
            'data' => $this->content,
        ];

        return $factory->json($response, $this->status, $this->headers, $this->options);
    }
}
