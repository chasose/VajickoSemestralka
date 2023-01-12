<?php

namespace App\Controllers;

use App\Core\AControllerBase;

use App\Core\Responses\Response;
use App\Model\offer;
use App\Model\Order;
use App\Model\order_item;
use App\Model\user;


class OrdersController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html(viewName: 'order');
    }

    public function orderContinue(){
        return $this->html(viewName: 'addInfo');
    }
    public function orderDetail(){
        if ($this->app->getAuth()->isLogged()){
            $user = $this->app->getAuth()->getLoggedUserName();
            $dataUser = user::getOneByName('name',$user);
            if ($dataUser){
                return $this->html($dataUser, viewName: 'orderDetail');
            }
        }
        return $this->html(viewName: 'addInfo');
    }

    public function createOrder(){
        $formData = $_POST['formData'];
        $data = $_POST['data'];
        $searcharray = [];
        parse_str($formData, $searcharray);
        $current_datetime = date('Y-m-d H:i:s');
        $order = $this->sendToDatabase($this->app->getAuth()->getLoggedUserId(),$current_datetime,$searcharray['address'],$searcharray['tel-number']);
        foreach ($data as $item){
            $this->createOrderItem($order->getOrderId(),$item['id'],$item['quantity'],$item['price']*$item['quantity']);
        }

    }

    public function sendToDatabase($user,$time,$adress,$telNumber):Order {
        $order = new Order();
        $order->setUserId($user);
        $order->setCreated($time);
        $order->setAdress($adress);
        $order->setTelNumber($telNumber);
        $order->save('order_id',0);
        return $order;
    }

    public function createOrderItem($orderId,$offerId,$quantity,$price){
        $order_item = new order_item();
        $order_item->setOrderId($orderId);
        $order_item->setOfferId($offerId);
        $order_item->setQuantity($quantity);
        $order_item->setPrice($price);
        $order_item->save('order_id',1);
    }

    public function clearStorage(){
        return $this->html(viewName: 'messageAfterOrder');
    }
}