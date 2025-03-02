<?php

namespace App\Http\Controllers;

use Gemini;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{

    public function homepage()
    {
        return view("panel.homepage");
    }

    /*
    * Method to display AI chatbot
    **/
    public function chatbot()
    {
        return view("panel.chatbot");
    }

    /*
    * Method for AI chatbot
    **/
    public function chatMessage(Request $request)
    {
        try {
            // get the input message
            $message = $request->input('message');

            $api_key = getenv("GEMINI_API_KEY");
            $client = Gemini::client($api_key);
            $result = $client->geminiPro()->generateContent($message);
            $final_msg = ['msg' => $result->text()];

            return json_encode(['msg' => $result->text()]);
        } catch (Exception $e) {
            return json_encode(['msg' => $e]);
        }
    }
}
