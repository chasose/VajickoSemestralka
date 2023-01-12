<?php

namespace App\Model;

class Order extends \App\Core\Model
{
    protected $order_id;
    protected $user_id;
    protected $created;
    protected $adress;
    protected $telNumber;
    protected $orderItem = [];

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress): void
    {
        $this->adress = $adress;
    }



    /**
     * @return mixed
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * @param mixed $telNumber
     */
    public function setTelNumber($telNumber): void
    {
        $this->telNumber = $telNumber;
    }

    /**
     * @return mixed
     */
    public function getOrderItem() : mixed
    {
        return $this->orderItem;
    }

    /**
     * @param order_item $orderItem
     */
    public function setOrderItem(order_item $orderItem): void
    {
        $this->orderItem[] = $orderItem;
    }
}