<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Twitter;
use File;


class TwitterController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function twitterUserTimeLine()
    {
        $followers = Twitter::getFollowers()->users;
        $retweeter = Twitter::getRts('1042455636884246528', ['count'=>20]);
        // var_dump( $retweeter );die;
        $data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);
    	return view('twitter',compact(['data', 'followers', 'retweeter']));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
    	$this->validate($request, [
        		'tweet' => 'required'
        	]);


    	$newTwitte = ['status' => $request->tweet];

    	
    	if(!empty($request->images)){
    		foreach ($request->images as $key => $value) {
    			$uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);
    			if(!empty($uploaded_media)){
                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;
                }
    		}
    	}


    	$twitter = Twitter::postTweet($newTwitte);

    	
    	return back();
    }
}
