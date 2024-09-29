<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();
        $subscriptionCount = Subscription::count();
        $transactionCount = Transaction::count();

        return response()->json([
            'user_count' => $userCount,
            'product_count' => $productCount,
            'order_count' => $orderCount,
            'subscription_count' => $subscriptionCount,
            'transaction_count' => $transactionCount,
        ]);
    }
}
