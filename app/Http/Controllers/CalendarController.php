<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\EventsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    //
    public function index(){
        return view('calendar.index');
    }

    public function form($id=null){

        if($id != null){
            $r=DB::table('events')->where('id',$id)->first();
        }

        return view('calendar.form')->with(['r'=>$r??null]);

    }

    public function update(EventsRequest $r)
    {


        if (Request::input('end')) {
            $end = Request::input('end');
        } else {
            $end = Carbon::parse(Request::input('start'));
            $end->addHours(1);
            $end = str_replace(" ", "T", $end);
        }

        $id = DB::table('events')->updateOrInsert(


            ['id'=>Request::input('id') ?? 0],
            [
            'description' => Request::input('description'),
            'title' => Request::input('title'),
            'start' => Request::input('start'),
            'end' => $end,
            'idusuario' => Auth::user()->id,
            'color' => Request::input('color'),
            'ativo' => Request::input('ativo') ? 'S' : 'N'

        ]);

       // return redirect()->action('CalendarController@index')->with(['id' => $id, 'desc' => Request::input('descricao')]);
        return redirect()->action([CalendarController::class, 'index'])->with(['id' => $id, 'desc' => Request::input('description')]);
    }

    public static function getEvents(){
        $json = DB::table("events")->where('ativo','S')->get();
       return response()->json($json);
    }
}
