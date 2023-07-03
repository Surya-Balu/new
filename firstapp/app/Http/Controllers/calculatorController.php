<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculator;

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
            $result = $a * $b;

           

            // save this data in database table
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
             //filter = first => display first record
             //filter = last => display last record
             //filter = top, value=3 => display top 3 records
             // filter = reverse => display values in reverse order
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
             // return view('calculator.logs')->with('data',$data);

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
  }      
     }