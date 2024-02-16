<?php

namespace Acer\MvcoopVer2\Controllers\Client;

use Acer\MvcoopVer2\Commons\Controller;
use Acer\MvcoopVer2\Models\Post;
class PostController extends Controller
{
    private Post $post;

    public function __construct() {
        $this->post = new Post;
    }

    public function show($id) {
        $post = $this->post->getByID($id);

        return $this->renderViewClient(
            'post-show',
            [
                'post' => $post,
            ]
        );
    }
}