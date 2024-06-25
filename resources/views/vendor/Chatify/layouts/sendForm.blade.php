<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label>
            <span class="fas fa-plus-circle"></span>
            <input type="file" class="upload-attachment" name="file" 
                   accept=".{{ implode(', .', config('chatify.attachments.allowed_images')) }}, 
                           .{{ implode(', .', config('chatify.attachments.allowed_files')) }}, 
                           .{{ implode(', .', config('chatify.attachments.allowed_videos')) }},
			   .{{ implode(', .', config('chatify.attachments.allowed_audios')) }}">
        </label>
        <button class="emoji-button">
            <span class="fas fa-smile"></span>
        </button>
        <textarea name="message" class="m-send app-scroll" placeholder="Digite uma mensagem.."></textarea>
        <button type="button" id="mic">
            <span class="fas fa-microphone"></span>
        </button>
        <button type="submit" class="send-button">
            <span class="fas fa-paper-plane"></span>
        </button>
    </form>
</div>

<script>
    console.log(config('chatify.attachments.allowed_images'));
</script>

