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
             $data=$calc->where('created_at','>','2023-07-01 11:49:00')->get();
             return view('calculator.logs')->with('data',$data);
           }
            
         

    }
