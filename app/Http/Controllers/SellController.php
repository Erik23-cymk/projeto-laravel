<?php

namespace App\Http\Controllers;

use App\Sell;
use Illuminate\Http\Request;
use App\Client;
use App\Product;
use App\ProductItem;
use App\Http\Requests\SellRequest;
use Illuminate\Support\Facades\Validator;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sell = Sell::all();
        return view('sell/index', compact('sell'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('sell/create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellRequest $request)
    {
        $sell = Sell::create([
            'client_id' => $request->client_id
        ]);

        return redirect('sells');
    }

    public function products(Sell $sell)
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sell/products', compact('sell', 'clients', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function product_store(Request $request, Sell $sell)
    {
        $validator = $this->validation($request);
        $product = $this->getProduct($request->product_id);
        if ($sell->finish_date == null && !$validator->fails()) {
            ProductItem::create([
                'sell_id' => $sell->id,
                'product_id' => $request->product_id,
                'amount' => $product->amount * $request->quantity,
                'quantity' => $request->quantity
            ]);

            $product->decrement('quantity', $request->quantity);
        } else {
            $request->session()->flash('quantity', 'Quantidade em estoque não permitida ou está finalizada');
        }

        return redirect()->route('sell_products', $sell);
    }

    public function product_destroy(Sell $sell, ProductItem $productItem)
    {
        if($sell->finish_date == null)
        {
            $product = $this->getProduct($productItem->product_id);
            $product->increment('quantity', $productItem->quantity);
            $productItem->delete();
        }
        return redirect()->route('sell_products', $sell);
    }

    private function validation(Request $request) {
        $quantity = $this->getProduct($request->product_id)->quantity;
        return Validator::make($request->all(), [
            'quantity' => 'required|integer|lte:' . $quantity
        ]);
    }

    private function getProduct($id) {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        $clients = Client::all();
        return view('sell/edit', compact('sell', 'clients'));
    }

    public function finish(Sell $sell)
    {
        $sell->finish_date = date("Y-m-d");
        $sell->save();
        return redirect('sells');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sell $sell)
    {
        $sell->client_id = $request->client_id;
        $sell->save();
        return redirect('sells');
    }
}
