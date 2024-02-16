<?php

namespace Acer\MvcoopVer2\Controllers\Admin;

use Acer\MvcoopVer2\Commons\Controller;
use Acer\MvcoopVer2\Models\Categori;

class categoriController extends Controller
{
    private Categori $categori;

    private string $folder = 'categories.';

    public function __construct()
    {
        $this->categori = new categori;
    }
    public function index()
    {
        $data['categories'] = $this->categori->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    
    //thêm mới
    public function create()
    {
        if (!empty($_POST)) {
            $this->categori->insert($_POST['name']);
            header('Location: /admin/categories');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }
    // Xem chi tiết theo ID
    public function show($id)
    {
        $data['categori'] = $this->categori->getByID($id);

        if (empty($data['categori'])) {
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
        $data['categori'] = $this->categori->getByID($id);

        if (empty($data['categori'])) {
            die(404);
        }
        if (!empty($_POST)) {
            $name = $_POST['name'];

            $this->categori->update($id, $name);

            $_SESSION['success'] = 'Thao tác thành công!';
            header("Location: /admin/categories/$id/update");
            exit();
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // Delete theo ID
    public function delete($id)
    {
        $this->categori->deleteByID($id);
        header('Location: /admin/categories');
            exit();
    }
}
