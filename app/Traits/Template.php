<?php
/**
 * Created by PhpStorm.
 * User: minseok
 * Date: 2018. 2. 12.
 * Time: AM 11:38
 */

namespace App\Traits;


trait Template
{
    public function getTemplate($type_cd, $order, $event)
    {
        $order_items = $order->orderItem;
        $items = [];
        foreach ($order_items as $order_item) {
            $items[] = $order_item->item->name;
        }

        $notification = \App\Models\Notification::where('type_cd', $type_cd)->where('event', $event)->first();
        $content = str_replace(
            [
                '{RESERVATION_DATE}',
                '{GARAGE}',
                '{PRICE}',
                '{CHAKEY}',
                '{ORDERER_NAME}',
                '{ORDER_ITEMS}',
                '{ADDRESS}',
                '{GARAGE_TEL}'
            ],
            [
                $order->diagnosis ? $order->diagnosis->reservation_at->format('Y-m-d H') : '',
                $order->diagnosis ? $order->diagnosis->garage->name : '',
                $order->purchase->amount,
                $order->chakey,
                $order->orderer_name,
                implode(",", $items),
                $order->diagnosis ? $order->diagnosis->garage->user_extra->address : '',
                $order->diagnosis ? $order->diagnosis->garage->mobile : ''
            ],
            $notification->template);

        return $content;
    }

    public function test(){
        return '1';
    }

}