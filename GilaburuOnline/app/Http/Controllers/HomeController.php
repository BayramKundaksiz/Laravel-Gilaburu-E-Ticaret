<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Yorumlar;
use App\Models\Reply;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::paginate(10);
        $comment = Yorumlar::orderby('id','desc')->get();
        $reply = Reply::all();
        return view('home.userpage', compact('product','comment','reply'));    
    }

    public function redirect()          
    {
        $usertype = Auth::user()->usertype;
        
        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $product = Product::paginate(10);
            $comment = Yorumlar::orderby('id','desc')->get();
            $reply = Reply::all();
            return view('home.userpage', compact('product','comment','reply'));   
        }
    }

    public function urun_detaylari($id)
    {
        
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product = product::find($id);
            
            $cart = new cart;

            $cart->name = $user->name;

            $cart->email = $user->email;

            $cart->phone = $user->phone;

            $cart->adress = $user->address;

            $cart->user_id=$user->id;

            $cart->product_title = $product->title;

            if($product->discount_price!=null)

            {

                $cart->price = $product->discount_price * $request->quantity;

            }

            else

            {
                $cart->price=$product->price * $request->quantity;
            }

            

            $cart->image = $product->image;

            $cart->Product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

        }

        else
        {
            return redirect('login'); 
        }
    }

    public function sepetim()
    {

        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart =cart::where('user_id','=',$id)->get();
            
            return view('home.sepetim', compact('cart'));
        }

        else
        {
            return redirect('login');
        }
        
    }

    public function urun_sil($id)   
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back(); 
    }

    public function hakkimizda()
    {
        return view('home.hakkimizda');    
    }

    public function iletisim()
    {
        return view('home.iletisim');    
    }

    public function yorumlar()
    {
        $product = Product::paginate(10);
        $comment = Yorumlar::orderby('id','desc')->get();
        $reply = Reply::all();
        return view('home.yorumlar', compact('product','comment','reply'));  
    }

    public function urunler()
    {
        $product = Product::paginate(10);
        return view('home.urunler', compact('product'));    
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new yorumlar;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back(); 
        }

        else
        {
            return redirect('login');
        }
    }
    
    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new Reply;

            $reply->name=Auth::user()->name;

            $reply->user_id=Auth::user()->id;

            $reply->comment_id=$request->commentId;

            $reply->reply=$request->reply;

            $reply->save();

            return redirect()->back();

        }

        else
        {

            return redirect('login');

        }
    }

    public function nedenBiz()
    {
        return view('home.nedenbiz');
    }

    public function kapida_ode()
    {
        $user=Auth::user();

        $userid = $user->id;

        $data=cart::where('user_id', '=', $userid)->get();

        foreach($data as $data){

            $order = new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->adress=$data->adress;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->payment_status='Alışverişe Devam Et';
            $order->delivery_status='Devam Ediyor...';

            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);

            $cart->delete();

        }

        return redirect()->back();
    }

    public function stripe($totalprice) {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Bizden alışveriş yaptığınız için teşekkürler...",
        ]);
   
        Session::flash('success', 'Ödeme başarılı');
           
        return back();
    }
    
}
