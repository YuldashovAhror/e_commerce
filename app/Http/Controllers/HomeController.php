<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }else{
            $datas = Product::all();

            $user = auth()->user();

            $count = cart::where('phone',$user->phone)->count();

            return view('user.home', compact('datas','count'));
        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $datas = Product::all();
            return view('user.home', compact('datas'));
        }

        
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if($search=='')
        {
            $datas = Product::all();
            $user = auth()->user();
            
            $count = cart::where('phone',$user->phone)->count();
            return view('user.home',[
                'count' =>$count,
                'datas' => $datas
            ]);
        }
        
        $user = auth()->user();
        $datas = Product::where('title','like','%'.$search.'%')->get();
        $count = cart::where('phone',$user->phone)->count();
        
        return view('user.home',[
            'count' =>$count,
            'datas' => $datas
        ]);
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = auth()->user();

            $cart = new Cart;

            $product = Product::find($id);

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back()->with('message','Product Updated Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart()
    {
        $user = auth()->user();

        $cart=cart::where('phone',$user->phone)->get();

        $count = cart::where('phone',$user->phone)->count();
        return view('user.showcart',[
            'count' =>$count,
            'cart' =>$cart
        ]);
    }

    public function deletecart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back()->with('message','Product Removed Successfully');

    }

    public function confirmorder(Request $request)
    {
        $user=auth()->user();

        $name = $user->name;
        $phone = $user->phone;
        $address = $user->address;
        // dd($request->all());
        foreach($request->productname as $key=>$productname)
        {

            $order = new Order;

            $order->product_name = $request->productname[$key];
            $order->price = $request->price[$key];
            $order->quantity = $request->quantity[$key];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;

            $order->status = 'not delivered';

            $order->save();

        }

        DB::table('carts')->where('phone',$phone)->delete();

        return redirect()->back()->with('message','Product Ordered Successfully');
    }

}
