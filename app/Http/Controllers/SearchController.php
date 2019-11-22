<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function fetch(Request $request)
    {
       if($request->get('query'))
       {
          $query = $request->get('query');
          $data = DB::table('users')
          ->where('username', 'LIKE', "%{$query}%")
          ->get();
          $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
          foreach($data as $row)
          {
             $output .= '
             <li><a href="profile/">'.$row->username.'</a></li>
             ';
         }
         $output .= '</ul>';
         echo $output;
     }
 }
}

