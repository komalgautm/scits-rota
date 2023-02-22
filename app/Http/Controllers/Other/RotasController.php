<?php 
namespace App\Http\Controllers\Other;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class RotasController extends Controller
{
    public function my_page()
    {
        echo "hello";
        exit;
        return view('other.welcome');
    }
}




?>