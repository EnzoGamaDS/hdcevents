<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
    //PARA BUSCAR PELO NOME
        $search = request('search');
        if ($search) {
            //busca - lembre-se do duplo array
            $events = Event::where([['title','like','%'.$search.'%']])->get();
            
        }else{
        //PARA BUSCAR TODOS
        $events = Event::all();
        }
        
        return view('welcome',['events'=>$events, 'search'=>$search]);
    }
    public function create(){
        return view('events.create');
    }
    public function contact(){
        return view('contact');
    }
    public function products(){
     $busca = request('search');
        return view('products', ['busca' => $busca]);
    }
    public  function product($id = 1) {
        return view('product', ['id' => $id]); 
    }
    public function store(Request $request){
        $event =  new Event;

        //esse código será para enviar os dados pro banco
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->itens = $request->itens;
        

        //image upload 
        if ($request ->hasFile('image') && $request->file('image')->isValid() ) {
            $requestImage = $request->image;
            
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now"). "." . $extension);

            $requestImage->move(public_path('img/events'), $imageName);

            $event->image = $imageName;
            
        }

        //Passa o usuario logado
        $user = auth()->user();
        $event->user_id = $user->id;   
        
        $event->save();

        return redirect('/')->with('msg','O evento foi criado com sucsso !');
    }
    public function show($id){
        $event = Event::findOrFail($id);
        
        return view('events.show', ['event'=> $event]);
    }
}
