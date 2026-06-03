@extends('app')

@section('content')
<div class="container py-4">
    <h2 class="mb-2">AI Veterinary Assistant</h2>
    <p class="text-muted">
        Ask questions about your animals and get instant AI guidance.
    </p>

    {{-- Error Message --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Chat History --}}
            <div class="chat-box mb-4 p-3">
                @forelse($chats as $chat)

                {{-- User Message --}}
                <div class="d-flex justify-content-end mb-3">
                    <div class="chat-bubble user-bubble">
                        {{ $chat->message }}
                    </div>
                </div>

                <div class="chat-bubble ai-bubble">
                    <div class="ai-header">
                        <span>🩺 AI Assistant</span>
                        <button class="copy-btn" onclick="copyText(this)">Copy</button>
                    </div>

                    <div class="ai-content">
                        {!! nl2br(
                        preg_replace(
                        '/\*\*(.*?)\*\*/',
                        '<strong>$1</strong>',
                        e($chat->response)
                        )
                        ) !!}

                        {{-- Professional CTA --}}
                        <div class="ai-cta">
                            <strong>Need urgent veterinary assistance?</strong><br>
                            If your pet’s condition requires immediate attention, please visit our doctor page and
                            consult a qualified veterinary doctor.<br>
                            <a href="{{ url('/team') }}" class="cta-link">
                                Our doctors are just one click away →
                            </a>
                        </div>
                    </div>


                </div>


                @empty
                <p class="text-center text-muted">
                    No conversation yet. Start by asking a question.
                </p>
                @endforelse
            </div>

            {{-- Input Form --}}
            <form action="{{ route('chat.send') }}" method="POST" id="chatForm">
                @csrf

                <div class="chat-input-wrapper">
                    <textarea name="message" class="chat-input" rows="1" placeholder="Type your message..."
                        required></textarea>

                    <button id="sendBtn" class="send-btn" type="submit">
                        <span class="send-text">Send</span>
                        <span class="send-icon">➤</span>
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>

{{-- Styles --}}
<style>
    .chat-box {
        background: #f8f9fa;
        border-radius: 14px;
        max-height: 480px;
        overflow-y: auto;
        padding: 16px;
    }

    /* Common bubble */
    .chat-bubble {
        max-width: 70%;
        padding: 14px 16px;
        font-size: 14px;
        line-height: 1.6;
        word-wrap: break-word;
    }

    /* User */
    .user-bubble {
        background: #0d6efd;
        color: #fff;
        border-radius: 18px 18px 4px 18px;
    }

    /* AI */
    .ai-bubble {
        background: #ffffff;
        color: #212529;
        border-radius: 18px 18px 18px 4px;
        border: 1px solid #dee2e6;
    }

    /* AI Header */
    .ai-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        font-weight: 600;
        color: #6c757d;
        margin-bottom: 6px;
    }

    /* Copy Button */
    .copy-btn {
        background: transparent;
        border: none;
        font-size: 12px;
        color: #0d6efd;
        cursor: pointer;
    }

    .copy-btn:hover {
        text-decoration: underline;
    }

    /* AI Content */
    .ai-content {
        font-size: 14px;
    }

    /* Better list spacing */
    .ai-content ul {
        padding-left: 18px;
    }

    .ai-content li {
        margin-bottom: 6px;
    }

    /* Input wrapper */
    .chat-input-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #ffffff;
        border-radius: 999px;
        padding: 8px 10px;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .ai-cta {
        margin-top: 14px;
        padding-top: 12px;
        border-top: 1px dashed #dee2e6;
        font-size: 13px;
        color: #495057;
    }

    .ai-cta strong {
        color: #212529;
    }

    .cta-link {
        display: inline-block;
        margin-top: 6px;
        color: #0d6efd;
        font-weight: 500;
        text-decoration: none;
    }

    .cta-link:hover {
        text-decoration: underline;
    }


    /* Textarea */
    .chat-input {
        flex: 1;
        border: none;
        outline: none;
        resize: none;
        padding: 10px 14px;
        font-size: 14px;
        border-radius: 999px;
    }

    /* Remove default focus */
    .chat-input:focus {
        outline: none;
    }

    /* Send button */
    .send-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        border: none;
        background: linear-gradient(135deg, #0d6efd, #3b82f6);
        color: #fff;
        padding: 10px 18px;
        border-radius: 999px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    /* Hover animation */
    .send-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(13, 110, 253, 0.35);
    }

    /* Click animation */
    .send-btn:active {
        transform: scale(0.96);
    }

    /* Arrow animation */
    .send-icon {
        transition: transform 0.3s ease;
    }

    .send-btn:hover .send-icon {
        transform: translateX(3px);
    }

    /* Disabled (sending state) */
    .send-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>


{{-- Prevent multiple submits --}}
<script>
    document.getElementById('chatForm').addEventListener('submit', function () {
    const btn = document.getElementById('sendBtn');
    btn.disabled = true;
    btn.innerHTML = '<span>Sending...</span>';
});
function copyText(button) {
    const content = button.closest('.ai-bubble').querySelector('.ai-content').innerText;

    navigator.clipboard.writeText(content).then(() => {
        button.innerText = 'Copied!';
        setTimeout(() => button.innerText = 'Copy', 1500);
    });
}
</script>
@endsection
