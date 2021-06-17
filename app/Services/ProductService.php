<?php

namespace App\Services;

use App\Http\Requests\Product\Update;
use App\Models\Product;

class ProductService
{
    public function getPaginated(int $perPage = 10)
    {
        return Product::orderBy('name')->paginate($perPage);
    }

    public function getById(int $id)
    {
        return Product::findOrFail($id);
    }

    public function update(Update $request, int $id)
    {
        $validated = $request->validated();
        $product = $this->getById($id);
        $product->update($validated);

        return $product;
    }
}
