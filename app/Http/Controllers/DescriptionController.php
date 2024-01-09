<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DescriptionController extends Controller
{
    //
    public function showForm(){
        return view(description.form);
    }

    public function generate(Request $request){
        //get input
        $category = $request->input('category');
        $brand = $request->input('brand');
        $model = $request->input('model');
        $condition = $request->input('condition');
        $offerType = $request->input('offerType');
        $price = $request->input('price');
        $location = $request->input('location');

        $prompt = "Generate a vehicle description for a $condition $brand $model in $location. It is listed for $offerType at $price.";

        $description = $this->generateOpenAIDescription($prompt);
        
        return view('layouts.result', ['description' => $description]);
    }
    private function generateOpenAIDescription($prompt)
    {
        
        $openaiApiKey = env('OPENAI_API_KEY');
        $model = 'gpt-3.5-turbo-0613';

        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer $openaiApiKey",
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => $model,
            'messages' => [
                ["role" => "system", "content" => "You are a helpful assistant designed to output JSON."],
                ["role" => "user", "content" => $prompt],
            ],
            'response_format' => ["type" => "json_object"],
        ]);

        // Check if the response is successful
        if ($response->successful()) {
            $result = $response->json();

            if (isset($result['choices']) && is_array($result['choices']) && count($result['choices']) > 0) {
                
                return $result['choices'][0]['message']['content'];
            } else {
               
                return 'Error: Unexpected API response format';
            }
        } else {
           
            return 'Error: Failed to fetch response from OpenAI API';
        }
    }
}
