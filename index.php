<?php
require __DIR__ . '/vendor/autoload.php';
ini_set('display_errors', 1);

/**
 * @param $data
 * @param $code
 */
function response($data, $code)
{
    http_response_code($code);

    if($data instanceof \SimpleCMSAPI\Models\Posts)
    {
        echo json_encode($data->jsonSerialize());
        die;
    }

    if(is_bool($data))
    {
        if(!$data)
        {
            http_response_code(400);

            echo json_encode(['message' => 'Bad Request']);
            die;
        }

        echo json_encode(['message' => 'Success']);
        die;
    }

    if(is_array($data) && isset($data[0]) && $data[0] instanceof \SimpleCMSAPI\Models\Posts)
    {
        $response = [];

        foreach ($data as $post)
        {
            $response[] = [
                'id'    => $post->id,
                'title' =>  $post->title,
                'body' =>  $post->body,
                'path' =>  $post->path,
                'created_at' =>  $post->created_at,
                'updated_at' =>  $post->updated_at
            ];
        }

        echo json_encode($response);
        die;
    }

    echo json_encode($data);die;
}

require_once 'src/routes.php';