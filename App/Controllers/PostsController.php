<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Model\Post;

class PostsController extends AControllerBase
{

    public function index(): Response
    {
        $posts = Post::getAll();
        return $this->html($posts);
    }

    public function delete()
    {

        $id = $this->request()->getValue('id');
        if ($id){
            $postToDelete = Post::getOne($id);
        } else {
            return $this->redirect("?c=posts");
        }

        if ($postToDelete) {
            $postToDelete->delete('id');
            try {
                unlink($postToDelete->getImg());

            }catch (\Exception $e){
                print "File not found";
            }

        }
        return $this->redirect("?c=posts");
    }

    public function store()
    {
        $id = $this->request()->getValue('id');
        if (isset($_FILES['img'])){
            if ($id) {
                $post = Post::getOne($id);
                try {
                    unlink($post->getImg());

                }catch (\Exception $e){
                    print 'Unable to unlink file';
                }

            } else {
                $post = new Post();
            }

            $upload_folder = "public/images/";
            $newName = time()."_".$_FILES['img']['name'];
            if (move_uploaded_file($_FILES["img"]["tmp_name"],$upload_folder .$newName)){
                $post->setImg($upload_folder .$newName);
                $post->save('id',0);
            }
        }


        return $this->redirect("?c=posts");
    }
    public function create()
    {
        return $this->html(new Post(),viewName: 'create.form');
    }

    public function edit()
    {
        $id = $this->request()->getValue('id');
        if ($id){
            $postToEdit = Post::getOne($id);
        }
        return $this->html($postToEdit,viewName: 'create.form');
    }
}