<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strm;



class stringController extends Controller
{
        public function form()
        {
            
           return view('man.form');
           
        }
        public function result(Request $request)
        {
            $str=request()->get('str');
            $opr=request()->get('opr');
            $result=null;
        echo "<h1>Surya</h1>"; 
            if($opr=='str')
            $result=strrev($str);
            elseif($opr=='noofw')
            $result=str_word_count($str);
            elseif($opr=='noofl')
            $result=strlen($str);
       

          

            $s = new strm(); // create model object
            $s->str = $str;
            $s->opr = $opr;
            $s->result = $result;
            $s->save();
         
            return view('man.result')
            ->with('result',$result)
            ->with('str',$str)
            ->with('opr',$opr);            
        }
        public function logs()
        {
            $s = new strm();
            $data = $s->all(); 
            return view('man.logs')->with('data', $data);
        //    return view('$data.logs',compact('$data'));
        }
    
}
