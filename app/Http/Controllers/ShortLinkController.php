<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\ShortLink;
use App\Models\Tracker;
  
class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = ShortLink::latest()->get();
        $count = Tracker::hit();
   
        return view('shortenLink', compact('shortLinks'));
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);
   
       


        
        $str = str_random(6);
       

        $base_string = base64_encode($str);
        $input['link'] = $request->link;
        $input['code'] = $base_string;
        ShortLink::create($input);
  
        return redirect('generate-shorten-link')
             ->with('success', 'Shorten Link Generated Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
   
        return redirect($find->link);
    }
    
   
}
