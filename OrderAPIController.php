<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAPIController extends Controller
{
    
    public function getOrders(){

        $orders=DB::table('orders as order')
        ->join('order_items  as order_item', 'order_item.order_id', '=', 'order.id') 
        ->get(['order.id',
        'order.customer_name',
        'order.shipping_address',
        'order.delivery_charge',
        'order_item.prod_id',
        'order.grand_total',
        'order_item.unit_price',
        'order_item.qty'
        ]);

        return response()->json($orders , 200);

    }

    // public function syncOrderToCircle($id){

    //     $orders=DB::table('orders as order')
    //     ->join('order_items  as order_item', 'order_item.order_id', '=', 'order.id') 
    //     ->where('order.id', $id)
    //     ->get(['order.id',
    //     'order.customer_name',
    //     'order.shipping_address',
    //     'order.delivery_charge',
    //     'order_item.prod_id',
    //     'order.grand_total',
    //     'order_item.unit_price',
    //     'order_item.qty'
    //     ]);

    //     // return response()->json($orders , 200);
    //     return response()->json(['status' => 200,'order' => $orders]);
           
    // }


}
