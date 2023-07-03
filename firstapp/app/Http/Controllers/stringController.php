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
    

public function queries()
 {
    $s = new strm();
    $filter = request()->get('filter');   
    $value = request()->get('value');  
 

    if($filter == 'all'){
        $data = $s->all();
        echo"All records  " .$data->count()."<br>";
        
foreach($data as $d){
                echo "id - ".$d->id. " ~ ";
                echo "string - ".$d->str. " ~ ";
                echo "opr - ".$d->opr. " ~ ";
                echo "created_at - ".$d->created_at. "<br>"; 
                       }
                    }
                        if($filter == 'first'){
                            echo "First records";
            $d = $s->first(); 
            echo "id - ".$d->id. "<br>";
            echo "string - ".$d->str. "<br>";
            echo "opr - ".$d->opr. "<br>";
            echo "created_at - ".$d->created_at. "<br>"; 
                        }
                        if($filter == 'last'){
                            echo "Last records <br> ";
            $d = $s->orderby('id','desc')->first(); 
            echo "id - ".$d->id. "<br>";
            echo "string - ".$d->str. "<br>";
            echo "opr - ".$d->opr. "<br>";
            echo "created_at - ".$d->created_at. "<br>"; 
                        }

                        if($filter == 'top3'){
                            $data = $s->limit(3)->get();
                            echo"TOP 3 records  " .$data->count()."<br>";
                    foreach($data as $d){
                     echo "id - ".$d->id. " ~ ";
                 echo "string - ".$d->str. " ~ ";
               echo "opr - ".$d->opr. " ~ ";
             echo "created_at - ".$d->created_at. "<br>"; 
    }
  }               

  if($filter == 'reverse'){
    $data = $s->orderby ('id', 'desc')->get();
    echo"Reverse order records  " .$data->count()."<br>";
    
foreach($data as $d){
            echo "id - ".$d->id. " ~ ";
            echo "string - ".$d->str. " ~ ";
            echo "opr - ".$d->opr. " ~ ";
            echo "created_at - ".$d->created_at. "<br>"; 
                   }
                }
}
}