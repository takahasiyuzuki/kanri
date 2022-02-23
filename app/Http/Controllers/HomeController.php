<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Products = Product::all();
        return view('mypage', ['Products' => $Products]);
    }
    
    public function crate(Request $request)
    {
        // dd($request);
        $atai = $request->all();

        \DB::beginTransaction();
        try {
            // 商品を登録
            Product::crate($atai);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('mypage'));
    }
}
