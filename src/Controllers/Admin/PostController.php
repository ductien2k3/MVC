<?php

namespace Acer\MvcoopVer2\Controllers\Admin;

use Acer\MvcoopVer2\Commons\Controller;
use Acer\MvcoopVer2\Models\Post;
use Acer\MvcoopVer2\Models\Categori;

class PostController extends Controller
{
    private Post $post;

    private string $folder = 'posts.';

    const PATH_UPLOAD = '/uploads/posts/';

    public function __construct()
    {
        $this->post = new Post;
    }

    // danh sách
    public function index()
    {
        $data['posts'] = $this->post->getAll();
        $data['categories'] = $this->post->getAllCategories();
        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // thêm mới 
    public function create()
    {
        $data['categories'] = $this->post->getAllCategories();

        if (!empty($_POST)) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = null;

            if (!empty($image)) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = null;
                }
            }

            $this->post->insert($category_id, $title, $excerpt, $content, $imagePath);

            header('Location: /admin/posts');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__, $data);
    }

    // Xem chi tiết theo ID
    public function show($id)
    {
        $data['post'] = $this->post->getByID($id);
        $data['categories'] = $this->post->getAllCategories();
        if (empty($data['post'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Cập nhật theo ID
    public function update($id)
    {
        $data['post'] = $this->post->getByID($id);

        if (empty($data['post'])) {
            die(404);
        }

        if (!empty($_POST)) {
            $categoryID = $_POST['category_id'];
            $title = $_POST['title'];
            $excerpt = $_POST['excerpt'];
            $content = $_POST['content'];

            $image = $_FILES['image'] ?? null;
            $imagePath = $data['post']['p_image'];
            $move = false;
            if ($image) {
                $imagePath = self::PATH_UPLOAD . time() . $image['name'];

                if (!move_uploaded_file($image['tmp_name'], PATH_ROOT . $imagePath)) {
                    $imagePath = $data['post']['p_image'];
                } else {
                    $move = true;
                }
            }

            $this->post->update(
                $id,
                $categoryID,
                $title,
                $content,
                $excerpt,
                $imagePath
            );

            if (
                $move
                && $data['post']['p_image']
                && file_exists(PATH_ROOT . $data['post']['p_image'])
            ) {
                unlink(PATH_ROOT . $data['post']['p_image']);
            }

            $_SESSION['success'] = 'Thao tác thành công!';

            header("Location: /admin/posts/$id/update");
            exit();
        }

        $data['categories'] = (new Categori)->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }


 // Delete theo ID
    public function delete($id) {
        $post = $this->post->getByID($id);
       
        if (empty($post)) {
            e404($post);
        }
        $this->post->deleteByID($id);
        if (!empty($post['p_image']) && file_exists(PATH_ROOT . $post['p_image'])) {
            unlink(PATH_ROOT . $post['p_image']);
        }
        header('Location: /admin/posts');
            exit();
            
}
}
