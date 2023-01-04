<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $creditNumber = $this->paymentService->getCreditCard();
        return response()->json([
            [
                'id' => '00000000-0000-4000-8000-000000000000',
                'name' => 'Nguyen Huu Tuan',
                'email' => 'tuannh@kozo-japan.com',
                'credit_number' => $creditNumber
            ]
        ]);
    }

    public function show($id)
    {
        $creditNumber = $this->paymentService->getCreditCard();
        return response()->json([
            'id' => '00000000-0000-4000-8000-000000000000',
            'name' => 'Nguyen Huu Tuan',
            'email' => 'tuannh@kozo-japan.com',
            'credit_number' => $creditNumber
        ]);
    }
}
