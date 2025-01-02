<?php
/*controllers adalah salah satu fitur dalam laravel dimana untuk mnegontrol halaman web, harus memakai huruf kapital pada huruf pertama*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $produk = Product::all();
        return view ('product', ['products' => $produk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Product::create([
        //     'product_name' => $request->product_name,
        //     'stock' => $request->stock,
        //     'price' => $request->price
        // ]);

        //validasi

        $messages=[
            'product_name.required' => 'Product Harus diisi',
            'stock.required' => 'Stock Harus diisi',
            'price.required' => 'Harga Harus diisi'
        ];

        $request->validate([
            'product_name' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ], $messages
    );
    Product::create($request->all());
    return redirect('/product')->with('pesan', 'Data Anda Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view ('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $request->validate([
            'product_name' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);
        $data->update($request->all());
        return redirect('/product')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/product')->with('pesan', 'Data Berhasil Dihapus');
    }
}
