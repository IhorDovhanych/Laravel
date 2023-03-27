<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GoodsController extends Controller
{
    public function index(Request $request):View{
        if(!$request->query->get('price')){
            $goods = Goods::all();
        }
        else{
            $goods = Goods::whereRaw('price < ?', $request->query->get('price'))->get();
        }

        return view('goods.index', ['goods' => $goods]);
    }
}
