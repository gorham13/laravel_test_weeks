<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Request;
use App\Goods;
use Illuminate\Support\Facades\Validator;


class GoodsController extends Controller
{
    public function create()
    {
        return view('Goods/create');
    }

    public function postCreate(Request $request)
    {
        $input = Request::all();
        $validator = Validator::make($input, [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|regex:/^\d*(\.\d{1,2}?$)/',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }

        if(request()->hasFile('image'))
        {
            $input['photo'] = $image = request()->file('image')->store('images');
        }

        $goods = Goods::create($input);

        return redirect('goods');
    }

    public function index(Request $request)
    {
        $category = request()->get('category', '');
        $characteristic = request()->get('characteristic', '');
        $goods = Goods::where('goods.category', 'like', '%'.$category.'%')
            ->Where('goods.characteristic', 'like', '%'.$characteristic.'%')->paginate(10);
        if ($goods)
        return view('Goods/index', compact('goods'));
    }

    public function update($id)
    {

        $goods = Goods::find($id);

        return view('Goods/update', compact('goods'));
    }

    public function postUpdate(Request $request)
    {


        $input = $request::all();
        $validator = Validator::make($input, [
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|regex:/^\d*(\.\d{1,2}?$)/',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }

        $goods = Goods::find($input['id']);

        if(request()->hasFile('image'))
        {
            $input['photo'] = request()->file('image')->store('images');

            if($goods['photo'])
                \Storage::delete( $goods['photo']);
        }

        $goods->update($input);

        return redirect('goods/');
    }

    public function delete($id)
    {
        $goods = Goods::find($id);
        if(!$goods){
            return response()->json([],404);
        }
        $goods->delete();
        return redirect('goods/');
    }

    public function autocomplete(Request $request)
    {

        $q = $request->get('q','');

        $tags = Tag::where('goods.category', 'like', $q.'%')
            ->orWhere('goods.characteristic', 'like', $q.'%')->get();


        return response()->json($tags);
    }
}
