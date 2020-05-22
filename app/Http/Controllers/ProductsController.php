<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\Update;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /** @var ProductService */
    private $productService;

    /**
     * ProductsController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->productService->getPaginated(25));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Update $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Update $request, $id)
    {
        return response()->json($this->productService->update($request, $id));
    }
}
