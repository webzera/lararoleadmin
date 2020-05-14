<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // echo "john";
        return view('admin.home');
    }
    public function markenterdatelist()
    {
        $enterdate=Resultenterdate::orderBy('created_at', 'desc')->get();
        return view('admin.markenterdate.index')->with('enterdate', $enterdate);
    }
    public function enterdate(Request $request)
    {
        $this->validate($request, [
      'term'=> 'required',
      'from_date'=> 'required',
      'end_date' => 'required',
      ]);
        $id=1; // permanent
        $enterdate = Resultenterdate::findOrFail($id);
        $enterdate->term=$request->term;
        $enterdate->from_date=$request->from_date;
        $enterdate->end_date=$request->end_date;
        $enterdate->save();

        flash('Mark enter date Updated');
        return redirect('/admin/markenterdate/index')->with('success', 'Mark Enter Date Updated');
    }

    public function acayeartermlist()
    {
        $enteryearterm=Acayearterm::first();
        return view('admin.acayearterm.index')->with('enteryearterm', $enteryearterm);
    }
    public function enteracayearterm(Request $request)
    {
        $this->validate($request, [
          'term'=> 'required',
          'aca_year'=> 'required',
        ]);
        $id=1; // permanent
        $acayearterm = Acayearterm::findOrFail($id);
        $acayearterm->term=$request->term;
        $acayearterm->aca_year=$request->aca_year;
        $acayearterm->save();

        flash('Academic Year and Term Updated');
        return redirect('/admin/acayearterm/index')->with('success', 'Academic Year and Term Updated');
    }
    public function smssendall(Request $request)
    {
        // dd($request->stdcheck);
        $message=$request->input('message');
        $mobile=$request->input('stdcheck');

        $mobileno= implode('',$mobile);
        $arr= str_split($mobileno, '12');
        $mobiles= implode(',', $arr);
        // dd($mobiles);

        $encodemsg=urlencode($message);
        $authkey='265262AcpLOnIF5c77cdca';
        $senderId='JohnES';
        $route=4;
        $country='91';

        $data= array(
            'authkey' => $authkey,
            'mobiles' => $mobiles,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
            // 'country' => $country,
        );

        $provideurl='http://api.msg91.com/api/sendhttp.php';
        $curl = curl_init();      

        curl_setopt_array($curl, array(
        CURLOPT_URL => $provideurl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",

        CURLOPT_POSTFIELDS => $data,

        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        // CURLOPT_HTTPHEADER => array(
        //     "authkey: 265262AcpLOnIF5c77cdca",
        //     "content-type: application/json"
        // ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        return redirect('admin')->with('success','Messages send successfully select mobile numbers');
        }
    }
    public function sendsinglesms(Request $request)
    {
        echo $request->input('mobilno');
        dd($request->input('message'));
        $message=$request->input('message');
        $mobiles=$request->input('mobilno');

        $encodemsg=urlencode($message);
        $authkey='265262AcpLOnIF5c77cdca';
        $senderId='Ruddra';
        $route=4;
        $country='91';

        $data= array(
            'authkey' => $authkey,
            'mobiles' => $mobiles,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
            // 'country' => $country,
        );

        $provideurl='http://api.msg91.com/api/sendhttp.php';
        $curl = curl_init();      

        curl_setopt_array($curl, array(
        CURLOPT_URL => $provideurl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",

        CURLOPT_POSTFIELDS => $data,

        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        // CURLOPT_HTTPHEADER => array(
        //     "authkey: 265262AcpLOnIF5c77cdca",
        //     "content-type: application/json"
        // ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        return redirect('admin')->with('success','Messages send successfully select mobile numbers');
        }
    }
    
}
