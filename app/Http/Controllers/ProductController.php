<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::paginate(10),
            'title' => 'Products'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'Add Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ]);

        $baseSlug = Str::slug($validatedData['nama']);
        $validatedData['slug'] = $this->generateUniqueCreateSlug($baseSlug);

        Product::create($validatedData);

        toastr()->success('Produk baru telah ditambahkan', ['closeButton' => true]);
        return redirect('/admin/product');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'title' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ];

        $validatedData = $request->validate($rules);

        if ($validatedData['nama'] != $product->nama) {
            $baseSlug = Str::slug($validatedData['nama']);
            $validatedData['slug'] = $this->generateUniqueUpdateSlug($baseSlug, $product);
        }

        $product->update($validatedData);

        toastr()->success('Produk telah diperbarui', ['closeButton' => true]);
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        toastr()->warning('Produk telah dihapus', ['closeButton' => true]);
        return redirect('/admin/product');
    }

    private function generateUniqueCreateSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    private function generateUniqueUpdateSlug($slug, $product)
    {
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
