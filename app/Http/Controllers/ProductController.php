<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

use App\Models\Image;
use App\Models\Product;
use App\Models\Specification;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $specifications = Specification::with('characteristics')->get();
        $categories = Category::all();
        return view(
            'products.index',
            compact('products', 'specifications', 'categories')
        );
    }

    public function show(Product $product)
    {
        return view('catalog.show', ['product' => $product]);
    }

//
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->except(['characteristics', '_token']));
        $product->characteristics()->attach($request->input('characteristics'));
        return to_route('admin.product.index');
    }

    public function update(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->update($request->only(['name_product', 'price_product', 'category_id', 'count']));

        $product->characteristics()->sync($request->characteristics);
        return to_route('admin.product.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }


    public function storeImage(PhotoRequest $request)
    {
        $path = FileService::uploadFile($request->file('image'));

        Image::create([
            'image' => $path,
            'product_id' => $request->get('product_id')
        ]);

        return redirect()->route('admin.category.index')
            ->with('success', "Данные успешно удалены...");
    }

    public function getProductsByCategory(Request $request)
    {

        $products = Product::allReal();
        if (isset($request->category)) {
            $products = $products->where('category_id', $request->category);
        }
        if (isset($request->order)) {
            $products = $products->orderBy($request->order, $request->course);
        }
        return back()->withInput(
            array_merge($request->all(), ['products' => $products->get()])
        );
    }

}
