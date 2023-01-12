<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Model\offer;
use App\Model\Order;
use App\Model\order_item;
use App\Model\user;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function showAllOrders(){
        $userName = $this->app->getAuth()->getLoggedUserName();
        $user = user::getOneByName('name',$userName);
        $orders = order::getAll();
        foreach ($orders as $order){
            $order_items = order_item::getAllByName('order_id',$order->getOrderId());
            foreach ($order_items as $order_item){
                $offer = offer::getOne($order_item->getOfferId());
                $order_item->setNameOfItem($offer->getTitle());
                $order->setOrderItem($order_item);
            }
            $user->setOrders($order);
        }

        return $this->html($user,viewName: 'allOrders');
    }
}