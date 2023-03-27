<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GoodsController extends Controller
{
    public function index():View{
        $goods = Goods::all();
        return view('goods.index', ['goods' => $goods]);
    }
    public function store(int $price):View{
        $goods = DB::table('goods')->whereRaw('price > ?', $price)->get();
        return view('goods.index', ['goods' => $goods]);
    }
}
