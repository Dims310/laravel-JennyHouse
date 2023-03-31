<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Error;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ShoppingPageController extends Controller
{
    function getCartCount(){
        $userExist = Auth::user();

        if ($userExist){
            $cart = Cart::where('user_id', $userExist->id)->sum('qty');
            return $cart;
        } else {
            $cart = Cart::whereNull('user_id')->sum('qty');
            return $cart;
        }
        
    }

    public function getShoppingPage(){
        $productsSale = DB::table('products')
            ->orderBy('many_bought', 'desc')
            ->skip(0)
            ->take(4)
            ->get();

        return view('shop', [
            'products' => $productsSale,
            'totalCart' => $this->getCartCount()
        ]);
    }

    public function getDetailProduct($id){
        $products = Product::find($id);
        return view('detail', [
            'totalCart' => $this->getCartCount(),
            'id' => $id,
            'products' => $products,
        ]);
    }

    public function getCategory($category){
        $products = Product::where('category', $category)->get();
        return view('category', [
            'category' => $category,
            'products' => $products,
            'totalCart' => $this->getCartCount()
        ]);
    }

    public function cartStore($id){
        // $id = product_id
        $user_id = Auth::user();

        $products = Product::find($id);

        if ($user_id){
            $carts_prods = Cart::where('product_id', $id)
                ->where('user_id', $user_id->id)
                ->increment('qty');

            if ($carts_prods){
                return Redirect::back()->with('message','Sukses menambahkan qty produk ke Cart!');
            } else {
                $addToCart = Cart::insert(
                    [
                        'user_id' => $user_id->id,
                        'product_id' => $id,
                        'product_title' => $products->title,
                        'qty' => 1,
                        'price' => $products->price,
                    ]);
    
                if ($addToCart){
                    return Redirect::back()->with('message','Sukses menambahkan produk ke Cart!');
                } else {
                    return Redirect::back()->with('message','Gagal menambahkan produk ke Cart!');
                }
            }
            
        } else {
           $carts_prods = Cart::where('product_id', $id)
                ->whereNull('user_id')
                ->increment('qty');

            if ($carts_prods){
                return Redirect::back()->with('message','Sukses menambahkan qty produk ke Cart!');
            } else {
                $addToCart = Cart::insert(
                    [
                        'product_id' => $id,
                        'product_title' => $products->title,
                        'qty' => 1,
                        'price' => $products->price,
                    ]);
    
                if ($addToCart){
                    return Redirect::back()->with('message','Sukses menambahkan produk ke Cart!');
                } else {
                    return Redirect::back()->with('message','Gagal menambahkan produk ke Cart!');
                }
            }
        }
    }

    public function getCheckoutPage(){
        $userExist = Auth::user();

        if ($userExist){
            $cart = Cart::select('product_title', 'qty')
                ->where('user_id', $userExist->id)
                ->get();
            $cartSubtotal = Cart::where('user_id', $userExist->id)
                ->sum('price');

            return view('checkout', [
                'name' => $userExist->name,
                'email' => $userExist->email,
                'phone_number' => $userExist->phone_number,
                'address' => $userExist->address,
                'postal_code' => $userExist->postal_code,
                'carts' => $cart,
                'subtotal' => $cartSubtotal,
                'totalCart' => $this->getCartCount()
            ]);
        } else {
            $cart = Cart::select('product_title', 'qty')->whereNull('user_id')->get();
            $cartSubtotal = Cart::whereNull('user_id')
                ->sum('price');
            return view('checkout', [
                'carts' => $cart,
                'subtotal' => $cartSubtotal,
                'totalCart' => $this->getCartCount()
            ]);
        }
        
    }

    public function checkoutStore(Request $request){
        $userExist = Auth::user();
        
        //find record first
        $phone_number_same = User::where('phone_number', $request->phone_number);

        if ($phone_number_same && $userExist){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'address' => 'required|min:5',
                'postal_code' => 'required|min:5|max:5'
            ]);
            User::where('id', $userExist->id)
                ->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code
                ]);
            
            $cart = Cart::select('product_title', 'qty')
                ->where('user_id', $userExist->id)
                ->get();
            
            if (count($cart) != 0){
                $createOrders = Order::create([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'email' => $userExist->email,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'bought' => $cart
                ]);
        
                if ($createOrders){
                    Cart::where('user_id', $userExist->id)->delete();
                    return redirect()->route('shoppingPage')->with('message','Pembelian berhasil!');
                } else {
                    return Redirect::back()->with('message','Pembelian gagal, silakan coba lagi.');
                }
            } else {
                return Redirect::back()->with('message','Pembelian gagal, tidak ada produk.');
            }

        } else if (!$phone_number_same && $userExist){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'phone_number' => 'required|unique:users',
                'address' => 'required',
                'postal_code' => 'required|min:5|max:5'
            ]);
            User::where('id', $userExist->id)
                ->update([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code
                ]);

            $cart = Cart::select('product_title', 'qty')
                ->where('user_id', $userExist->id)
                ->get();

            if (count($cart) != 0){
                $createOrders = Order::insertOrIgnore([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'email' => $userExist->email,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'bought' => $cart
                ]);
        
                if ($createOrders){
                    Cart::where('user_id', $userExist->id)->delete();
                    return redirect()->route('shoppingPage')->with('message','Pembelian berhasil!');
                } else {
                    return Redirect::back()->with('message','Pembelian gagal, silakan coba lagi.');
                }
            } else {
                return Redirect::back()->with('message','Pembelian gagal, tidak ada produk.');
            }
            
        }
        
        if (!$userExist){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'phone_number' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'postal_code' => 'required|min:5|max:5'
            ]);


            $cart = Cart::select('product_title', 'qty')
                ->whereNull('user_id')
                ->get();

            if (count($cart) != 0){
                $createOrders = Order::create([
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'email' => $request->email,
                    'address' => $request->address,
                    'postal_code' => $request->postal_code,
                    'bought' => $cart
                ]);

                if ($createOrders){
                    Cart::whereNull('user_id')->delete();
                    return redirect()->route('shoppingPage')->with('message','Pembelian berhasil!');
                } else {
                    return Redirect::back()->with('message','Pembelian gagal, silakan coba lagi.');
                }
            } else {
                return Redirect::back()->with('message','Pembelian gagal, tidak ada produk.');
            }
        } else {
            return Redirect::back()->with('message','Pembelian gagal, silakan login untuk lanjut.');
        }
    }
}
