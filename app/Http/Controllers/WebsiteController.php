<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Comment;
use App\Models\Donation;
use App\Models\Enrolled;
use App\Models\Event;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index()
    {
        $news = News::all();

        $events = Event::all();

        $projects = Project::all();


        return view('website.index', compact('news', 'events', 'projects'));
    }

    public function news($id)
    {
        $news = News::findOrFail($id);

        return view('website.news-single', compact('news'));
    }

    public function comments(Request $request, $id)
    {
        //$news = News::findOrFail($id);

        // $news->comments()->create([

        // ])

        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'news_id' => $id
        ]);

        return redirect()->route('website.news', $id);
    }

    public function events($id)
    {
        $event = Event::findOrFail($id);

        return view('website.event-single', compact('event'));
    }

    public function enrolled(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10'
        ]);

        Enrolled::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'event_id' => $id
        ]);

        return redirect()->back()->with('success', 'تم تسجيلك بنجاح');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'subject' => 'required|string|max:50',
            'message' => 'required|max:200'
        ]);

        // Send Mail

        Mail::to('admin@nawa.com')->send( new ContactUsMail( $request->except('_token') ) );


        return redirect()->back()->with('success', 'تم ارسال الرسالة');

    }

    public function projects($id)
    {
        $project = Project::findOrFail($id);

        return view('website.project-single', compact('project'));
    }


    public function donation(Request $request, $id)
    {
        $project = Project::find($id);
        $amount = $request->amount;

        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=" . $amount .
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode( $responseData, true );
        $checkoutId = $response['id'];

        return view('website.donation', compact('checkoutId', 'project', 'amount'));
    }

    public function donation_result($id)
    {
        $resourcePath = request()->resourcePath;
        $transaction_id = request()->id;

        $url = "https://eu-test.oppwa.com".$resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);

        $response = json_decode($responseData, true);

        $accepted = ['000.000.000', '000.100.100', '000.100.110', '000.100.111', '000.100.112'];

        if( in_array($response['result']['code'], $accepted) ){

            $data = Donation::create([
                'project_id' => $id,
                'amount' => $response['amount'],
                'transaction_id' => $transaction_id
            ]);

            if($data) {
                return redirect()->route('website.projects', $id)->with('msg', 'Your donation was added successfully')->with('type', 'success');
            }

        }else {
            return redirect()->route('website.projects', $id)->with('msg', 'Your donation was not added yet')->with('type', 'danger');
        }
    }

}
