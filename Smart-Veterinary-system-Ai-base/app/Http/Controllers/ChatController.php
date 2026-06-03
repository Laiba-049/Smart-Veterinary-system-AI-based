<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;


class ChatController extends Controller
{
    /**
     * Show chat page
     */
    public function index()
    {
        $chats = Chat::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('chat', compact('chats'));
    }

    /**
     * Send message to Groq AI
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->message;
        $aiResponse  = null;

        try {
            /** @var Response $response */
            $response = Http::timeout(30)->withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.1-8b-instant',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful veterinary assistant. Give clear, safe advice.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $userMessage
                    ]
                ],
                'temperature' => 0.7,
                'max_tokens'  => 300,
            ]);




            $data = $response->json();

            $aiResponse = $data['choices'][0]['message']['content'] ?? null;

            if (!$aiResponse) {
                throw new \Exception('Invalid AI response');
            }
        } catch (\Exception $e) {
            $aiResponse = $this->fallbackVeterinaryReply();
        }

        Chat::create([
            'user_id'  => Auth::id(),
            'message'  => $userMessage,
            'response' => $aiResponse,
        ]);

        return redirect()->back();
    }

    /**
     * Fallback response
     */
    private function fallbackVeterinaryReply(): string
    {
        return "⚠️ AI service is temporarily unavailable.

Here is some general veterinary guidance:

• Ensure clean drinking water
• Monitor appetite and activity
• Keep the animal in a clean, calm environment
• If symptoms persist, consult a licensed veterinarian

Please try again shortly.";
    }
}
