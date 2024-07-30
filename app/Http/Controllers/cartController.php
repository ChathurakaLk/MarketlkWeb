<?php

namespace App\Http\Controllers;

use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Exception;




class cartController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alsoLike = product::alsoLike()->get();
        $items = Cart::content();
        return view('cart', compact('items', 'alsoLike'));


    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to the cart.');
        }
        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($duplicate->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your Cart!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)
            ->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $cartItem = Cart::get($request->rowid);

            if (!$cartItem) {
                throw new InvalidRowIDException();
            }

            Cart::update($request->rowid, $request->quantity);

            return response()->json(['success' => true]);
        } catch (InvalidRowIDException $e) {
            return response()->json(['success' => false, 'message' => 'Invalid row ID'], 500);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update quantity'], 500);
        }

    }


    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Request $request, string $rowId)
    {
        Cart::remove($rowId); //we need to pass $rowid as parameter
        return back()->with('success_message', 'Item removed successfully!');
    }


    public function empty()
    {
        Cart::destroy();
    }
}
