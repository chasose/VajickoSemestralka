<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Model\offer;
use App\Model\Order;
use App\Model\order_item;
use App\Model\user;

class UsersController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html(viewName: 'registration');
//        return $this->redirect(Configuration::REGISTRATION_URL);
    }

    public function showAccoutInfo(){
        $formData = $this->app->getRequest()->getPost();
        $user = $this->app->getAuth()->getLoggedUserName();
        $dataUser = user::getOneByName('name',$user);

        if (isset($formData['submit'])) {
            $this->saveUserIntoDatabase($dataUser->getName(),$dataUser->getEmail(),$dataUser->getPassword(),
                $formData['firstName'],$formData['secondName'],$formData['telNumber'],$formData['address']);
            $dataUser = user::getOneByName('name',$user);
        }

        return $this->html($dataUser, viewName: 'userAccountInfo');

    }

    public function registration(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $regist = null;
        if (isset($formData['submit'])) {
            $regist = $this->app->getAuth()->register($formData['name'],$formData['email'], $formData['password']);
            if ($regist) {
                $hashPassword = password_hash( $formData['password'],PASSWORD_DEFAULT);
                $this->saveUserIntoDatabase($formData['name'],$formData['email'],$hashPassword,$formData['firstName'],
                    $formData['secondName'],$formData['telNumber'],$formData['address']);
                return $this->redirect('?c=auth&a=login');
            }
        }

        $data = ($regist === false ? ['message' => 'Email alebo meno je uz pouzite, skus ine!'] : []);
        return $this->html($data);
    }

    public function saveUserIntoDatabase(string $name, string $email, string $hashedPassword,string $firstName,
                                         string $secondName,string $telNumber, string $address){
        if (user::getOneByName('name',$name)){
            $user = user::getOneByName('name',$name);
        } else{
            $user = new User();
        }

        $user->setName($name);
        $user->setPassword($hashedPassword);
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setSecondName($secondName);
        $user->setTelNumber($telNumber);
        $user->setAddress($address);
        $user->save('id',0);
    }

    public function checkCredentials():Response {
        $var = $_POST['name'];
        $column = $_POST['column'];
        $user = User::getOneByName($column,$var);
            if ($user) {
                return $this->json(1);
            }else{
                return $this->json(2) ;
            }

    }

    public function showFormForPwd(){
        return $this->html(viewName: 'changePwd');
    }

    public function changePwd(){
        $formData = $this->app->getRequest()->getValue('current-password');
        $user = $this->app->getAuth()->getLoggedUserName();
        $dataUser = user::getOneByName('name',$user);
        if (isset($formData)){
            if ($formData != $_POST['new-password']){
                if (password_verify($formData, $dataUser->getPassword())){
                    if ($_POST['new-password'] === $_POST['confirm-password']){
                        $hashPassword = password_hash( $_POST['new-password'],PASSWORD_DEFAULT);
                        $dataUser->setPassword($hashPassword);
                        $dataUser->save('id',0);
                        return $this->html($dataUser, viewName: 'userAccountInfo');
                    } else{
                        $data = ['message' => 'Nepotrvdil si spravne nove heslo!'];
                        return $this->html($data);
                    }
                } else {
                    $data = ['message' => 'Nespravne zadane stare heslo'];
                    return $this->html($data);
                }
            }else{
                $data = ['message' => 'Nemozes zadat rovnake heslo!'];
                return $this->html($data);
            }

        } else {
            return $this->html(viewName: 'userAccountInfo');
        }
    }

    public function showUserOrders(){
        $userName = $this->app->getAuth()->getLoggedUserName();
        $user = user::getOneByName('name',$userName);
        $orders = order::getAllByName('user_id',$userName);
        foreach ($orders as $order){
            $order_items = order_item::getAllByName('order_id',$order->getOrderId());
            foreach ($order_items as $order_item){
                $offer = offer::getOne($order_item->getOfferId());
                $order_item->setNameOfItem($offer->getTitle());
                $order->setOrderItem($order_item);
            }
            $user->setOrders($order);
        }

        return $this->html($user,viewName: 'userOrders');
    }

}