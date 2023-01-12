<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Model\offer;

class OffersController extends AControllerBase
{

    public function index(): Response
    {
        $offers = offer::getAll();
        return $this->html($offers);
    }


    public function createOffer(){
        return $this->html(new offer(),viewName: 'createOffer.menu');
    }

    public function editOffer(){
        $id = $this->request()->getValue('id');
        if ($id){
            $offerToEdit = offer::getOne($id);
        }
        return $this->html($offerToEdit,viewName: 'createOffer.menu');
    }

    public function deleteOffer(){
        $id = $this->request()->getValue('id');
        if ($id){
            $offer = offer::getOne($id);
            try {
                unlink($offer->getImage());

            }catch (\Exception $e){
                print 'Unable to unlink file';
            }
            $offer->setVisible(0);
            $offer->save('id',0);
        }
        return $this->redirect("?c=offers");
    }

    public function storeOffer(){
        $id = $this->request()->getValue('id');
        $offer = Offer::getOne($id);
        if ($id) {
            $length = strlen($_FILES['image']['name']);
            if ($length  > 0){
                try {
                    unlink($offer->getImage());

                }catch (\Exception $e){
                    print 'Unable to unlink file';
                }
            }


        } else {

            $offer = new offer();
        }


        $upload_folder = "public/images/";
        $newName = time()."_".$_FILES['image']['name'];
        if (move_uploaded_file($_FILES["image"]["tmp_name"],$upload_folder .$newName)){
            $offer->setImage($upload_folder .$newName);
        }
        $offer->setTitle($_POST['title']);
        $offer->setDescription($_POST['description']);
        $offer->setPrice($_POST['price']);
        $offer->setVisible(1);
        $offer->save('id',0);

        return $this->redirect("?c=offers");
    }


}