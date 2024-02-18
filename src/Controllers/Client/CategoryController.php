<?php


namespace Acer\MvcoopVer2\Controllers\Client;

use Acer\MvcoopVer2\Commons\Controller;
use Acer\MvcoopVer2\Models\Post;


class CategoryController extends Controller
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function showPosts($id)
    {
        $postByCategory = $this->post->getPostByCategoryID($id);
        $postTrending = $this->post->getTrending();
        $postPopular = $this->post->getAll();

        return $this->renderViewClient(
            'categori',
            [
                'postByCategory' => $postByCategory,
                'postTrending' => $postTrending,
                'postPopular' => $postPopular
            ]
        );
    }
    
}