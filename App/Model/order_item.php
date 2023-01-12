<?php

namespace App\Model;

class order_item extends \App\Core\Model
{
    protected $order_id;
    protected $offer_id;
    protected $quantity;
    protected $price;
    protected $nameOfItem;

    /**
     * @return mixed
     */
    public function getNameOfItem()
    {
        return $this->nameOfItem;
    }

    /**
     * @param mixed $nameOfItem
     */
    public function setNameOfItem($nameOfItem): void
    {
        $this->nameOfItem = $nameOfItem;
    }
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
    public function getOfferId()
    {
        return $this->offer_id;
    }

    /**
     * @param mixed $offer_id
     */
    public function setOfferId($offer_id): void
    {
        $this->offer_id = $offer_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

}