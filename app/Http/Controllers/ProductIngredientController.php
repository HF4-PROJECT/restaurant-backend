<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductIngredient;
use App\Http\Requests\UpdateProductIngredient;
use App\Models\ProductIngredient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(ProductIngredient::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductIngredient $request
     * @return JsonResponse
     */
    public function store(StoreProductIngredient $request)
    {
        $validated = $request->validated();

        $productIngredient = new ProductIngredient([
            'products_id' => $validated['products_id'],
            'ingredients_id' => $validated['ingredients_id']
        ]);

        $productIngredient->save();

        return response()->json($productIngredient, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param ProductIngredient $productIngredient
     * @return JsonResponse
     */
    public function show(ProductIngredient $productIngredient)
    {
        return response()->json($productIngredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductIngredient $request
     * @param ProductIngredient $productIngredient
     * @return JsonResponse
     */
    public function update(UpdateProductIngredient $request, ProductIngredient $productIngredient)
    {
        $validated = $request->validated();

        $productIngredient->update([
            'products_id' => $validated['products_id'],
            'ingredients_id' => $validated['ingredients_id']
        ]);

        return response()->json($productIngredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductIngredient $productIngredient
     * @return Response
     */
    public function destroy(ProductIngredient $productIngredient)
    {
        $productIngredient->delete();

        return response('', 200);
    }
}