<?php

namespace Acer\MvcoopVer2\Controllers\Admin;

use Acer\MvcoopVer2\Commons\Controller;
use Acer\MvcoopVer2\Models\User;

class UserController extends Controller
{
    private user $user;

    private string $folder = 'users.';

    const PATH_UPLOAD = '/uploads/users/';
    public function __construct()
    {
        $this->user = new User;
    }

    //danh sách
    public function index()
    {
        $data['users'] = $this->user->getAll();

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }

    // thêm mới 
    public function create()
    {
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $avatar = $_FILES['avatar'] ?? null;
            $avatarPath = null;
            
            if (!empty($avatar)) {

                $avatarPath = self::PATH_UPLOAD . time() .  $avatar['name'];

                if(!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)){
                    $avatarPath = null;
                }
        }
       
            $this->user->insert( $name , $email , $password , $avatarPath );
            header('Location: /admin/users');
            exit();
        }

        return $this->renderViewAdmin($this->folder . __FUNCTION__);
    }

    // Xem chi tiết theo ID
    public function show($id)
    {
        $data['user'] = $this->user->getByID($id);

        if (empty($data['user'])) {
            die(404);
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,
            $data
        );
    }
    // Cập nhật theo ID
    public function update($id) {
        $user = $this->user->getByID($id);

        if (empty($user)) {
            e404($user);
        }

        if (!empty($_POST)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $avatar = $_FILES['avatar'] ?? null;

            $avatarPath = $user['avatar'];
            
            if (!empty($avatar)) {

                $avatarPath = self::PATH_UPLOAD . time() . $avatar['name'];

                if(!move_uploaded_file($avatar['tmp_name'], PATH_ROOT . $avatarPath)){
                    $avatarPath = $user['avatar'];
                }
            }

            $this->user->update($id, $name, $email, $password,$avatarPath);

            $_SESSION['success'] = 'Thao tác thành công!';

            header("Location: /admin/users/$id/update");
            exit();
        }

        return $this->renderViewAdmin(
            $this->folder . __FUNCTION__,['user' => $user]);
    }

    // Delete theo ID
    public function delete($id) {
        $user = $this->user->getByID($id);
       
        if (empty($user)) {
            e404($user);
        }
        $this->user->deleteByID($id);
        if (!empty($user['avatar']) && file_exists(PATH_ROOT . $user['avatar'])){
            unlink(PATH_ROOT . $user['avatar']);
        }
        header('Location: /admin/users');
            exit();
            
}
}
