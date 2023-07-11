<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculator;
use Illuminate\Support\Facades\DB;

class calculatorController extends Controller
{
    /**
     * Form method will show the form page from view
     */
    public function form()
    {
        return view('calculator.form');
    }
    /**
     * Result method will perform the operations
     * evaluate the result and then send the data to view
     */
    public function result()
    {
        // capture all data from the request
        $a = request()->get('a');
        $b = request()->get('b');
        $opr = request()->get('opr');
        $result = null;
        // process the requested operation (business logic)
        if ($opr == 'add')
            $result = $a + $b;
        else if ($opr == 'sub')
            $result = $a - $b;
        else if ($opr == 'mul')
            $result = $a * $b; // save this data in database table
         $calc = new Calculator(); // create model object
         $calc->a = $a;
         $calc->b = $b;
         $calc->opr = $opr;
         $calc->result = $result;
         $calc->save();
          //save the data
          return view('calculator.result')
          ->with('result', $result)
          ->with('a', $a)
          ->with('b', $b)
          ->with('opr', $opr);
    }
    public function logs()
    {
             $calc = new calculator();
              // to get all records with some conditions on where 
             $data=$calc->all();
                   return view('calculator.logs')->with('data',$data);
    }    
    public function queries()
    {
               // this will return all the records
              $calc = new calculator();
                //filter = all => list all data
             $filter = request()->get('filter');   
             $value = request()->get('value');  
          
                     if($filter == 'all'){
                        $data=$calc->all();
                         echo "All records " .$data->count(). "<br>";
           
                         foreach($data as $d){
                             echo "id - ". $d->id . " => ";
                             echo "a - ". $d->a . " => ";
                             echo "b - ". $d->b . " => ";
                             echo "opr - ". $d->opr . " => ";
                             echo "created_at - ". $d->created_at . "<br>";
                         }
             }
              //filter = first => display first record
                // this will return first record
              if($filter == 'first'){
                 echo "First record <br> "; 
              $d = $calc->first();
              echo "id - ". $d->id . "<br>";
              echo "a - ". $d->a . "<br>";
              echo "b - ". $d->b . "<br>";
              echo "opr - ". $d->opr . "<br>";
              echo "created_at - ". $d->created_at . "<br>";
             }
             //filter = last => display last record
                // this will return last record
             if($filter == 'last'){
                echo "Last record <br> "; 
             $d = $calc->orderby ('id','desc')->first();
             echo "id - ". $d->id . "<br>";
             echo "a - ". $d->a . "<br>";
             echo "b - ". $d->b . "<br>";
             echo "opr - ". $d->opr . "<br>";
             echo "created_at - ". $d->created_at . "<br>";
            } 
             //filter = top, value=3 => display top 3 records
                //this will return top 3 records
            if($filter == 'top3'){
                $data=$calc->limit(3)->get();
                 echo "Top 3 records " .$data->count(). "<br>";
   
                 foreach($data as $d){
                     echo "id - ". $d->id . " => ";
                     echo "a - ". $d->a . " => ";
                     echo "b - ". $d->b . " => ";
                     echo "opr - ". $d->opr . " => ";
                     echo "created_at - ". $d->created_at . "<br>";
                 }
                }
            // filter = reverse => display values in reverse order
                //this will return reverse order records
             if($filter == 'reverse'){
                     $data=$calc->orderby('id','desc')->get();
            echo "Reverse order records " .$data->count(). "<br>";
            foreach($data as $d){
             echo "id - ". $d->id . " => ";
             echo "a - ". $d->a . " => ";
             echo "b - ". $d->b . " => ";
             echo "opr - ". $d->opr . " => ";
             echo "created_at - ". $d->created_at . "<br>";
            }
            }
            // addition the 'a' value 
            if($filter == 'add'){
            $data=$calc->sum('a');
             dd($data);
                 echo "Reverse order records " .$data->count(). "<br>";
             foreach($data as $d){
            echo "id - ". $d->id . " => ";
            echo "a - ". $d->a . " => ";
            echo "b - ". $d->b . " => ";
            echo "opr - ". $d->opr . " => ";
            echo "created_at - ". $d->created_at . "<br>";
            }
            }
            if($filter == 'collect'){
             $data = $calc->get()->groupby('opr');

            echo "Group order records  <br>".($data);
            }

    }      
    public function api($id)
    {
        //$alert  = request()->session()->get('alert');
        // $r=DB::table('calculators')->where('id',$id)->first();
        //$r=DB::table('calculators')->find($id);
        $r=calculator::find($id);
        // dd($r);
       return $r;
    }
    public function show($id)
    {
        $alert  = request()->session()->get('alert');
        // $r=DB::table('calculators')->where('id',$id)->first();
         //$r=DB::table('calculators')->find($id);
         $r=calculator::find($id);
        // dd($r);
       return view('calculator.show')->with('data',$r)->with('alert' , $alert);
    }
    public function update($id)
    {
        $r=calculator::find($id);
        return view('calculator.update')->with('data',$r);
    }
    public function savedata($id)
    {
        $r=calculator::find($id);
        $data =request()->all();
        $r->a=request()->get('a');
        $r->b=request()->get('b');
        $r->opr=request()->get('opr');
        if(request()->get('opr') == 'add')
        $r->result =$r->a + $r->b;
        if(request()->get('opr') == 'sub')
        $r->result =$r->a - $r->b;
        if(request()->get('opr') == 'mul')
        $r->result =$r->a * $r->b;
            $r->save();
            $alert ="you have succesfully updated (" .$r->id.")";
            return redirect()->to('calculator/show/' .$id)
            ->with('alert' , $alert);
    }
    public function destroy($id)
    {
        $r=calculator::find($id);
        if($r)
        $r->delete();
        return redirect()->to('calculator/logs/');
    }
}