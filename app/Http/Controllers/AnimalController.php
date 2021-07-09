<?php


namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimalController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $animal=new Animal();
        $animal->species = $request->get('species');
        $animal->color = $request->get('color');
        $animal->leg = $request->get('leg');
        $animal->save();
        return response()->json([
            "code" => 200,
            "data"=>$animal,
            "message" => "Success",
        ], Response::HTTP_OK);
    }
    public function index()
    {
        $animals=Animal::all();
        return response()->json([
            "code" => 200,
            "data"=>$animals,
            "message" => "Success",
        ], Response::HTTP_OK);

    }
    public function findById($id)
    {
        $animal = Animal::find($id);
        if($animal==null){
            return response()->json([
                "code" => 200,
                "data"=>null,
                "message" => "not found",
            ], Response::HTTP_OK);
        }
        //  return view('animaledit',compact('animal','id'));
        return response()->json([
            "code" => 200,
            "data"=>$animal,
            "message" => "Success",
        ], Response::HTTP_OK);
    }
    public function update(Request $request, $id)
    {
        $animal= ANimal::find($id);
        if($animal==null){
            return response()->json([
                "code" => 200,
                "data"=>null,
                "message" => "not found",
            ], Response::HTTP_OK);
        }
        $animal->species = $request->get('species');
        $animal->color = $request->get('color');
        $animal->leg = $request->get('leg');
        $animal->save();
        return response()->json([
            "code" => 200,
            "data"=>$animal,
            "message" => "Success",
        ], Response::HTTP_OK);
        //return redirect('animal')->with('success', 'Animal has been successfully update');
    }
    public function destroy($id)
    {
        $animal = Animal::find($id);
        if($animal==null){
            return response()->json([
                "code" => 200,
                "data"=>null,
                "message" => "not found",
            ], Response::HTTP_OK);
        }
        $animal->delete();
        return response()->json([
            "code" => 200,
            "data"=>$animal,
            "message" => "Success",
        ], Response::HTTP_OK);

        // return redirect('animal')->with('success','Animal has been  deleted');
    }

}
