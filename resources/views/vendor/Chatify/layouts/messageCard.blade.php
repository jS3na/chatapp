<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time'>
        ".($isSender ? "<span class='fas fa-$seenIcon' seen'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn" data-id="{{ $id }}"></i>
        </div>
    @endif
    {{-- Card --}}
    <div class="message-card-content">

        @if (@$attachment->type != 'audio' && @$attachment->type != 'image' && @$attachment->type != 'video' || $message)
        <script>
            console.log("TIPO DEBUG: <?php echo $attachment->type; ?>");
        </script>
            <div class="message">
                {!! ($message == null && $attachment != null && @$attachment->type != 'file') ? $attachment->title : nl2br($message) !!}
                {!! $timeAndSeen !!}
                {{-- If attachment is a file --}}
                @if(@$attachment->type == 'file')
                <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download">
                    <span class="fas fa-file"></span> {{$attachment->title}}</a>
                @endif
            </div>
        @endif
        @if(@$attachment->type == 'image')
        <script>
            console.log("TIPO DEBUG: <?php echo $attachment->type; ?>");
        </script>
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <div class="image-file chat-image" style="background-image: url('{{ Chatify::getAttachmentUrl($attachment->file) }}')">
                <div>{{ $attachment->title }}</div>
            </div>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
        @if(@$attachment->type == 'video')
        <script>
            console.log("TIPO DEBUG: <?php echo $attachment->type; ?>");
        </script>
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <video controls class="image-file chat-image">
                <source src="{{ Chatify::getAttachmentUrl($attachment->file) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
        @if(@$attachment->type == 'audio')
        <script>
            console.log("TIPO DEBUG: <?php echo $attachment->type; ?>");
        </script>
        <div class="" style="text-align: {{$isSender ? 'end' : 'start'}}">
            <audio controls class="chat-image">
                <source src="{{ Chatify::getAttachmentUrl($attachment->file) }}" type="audio/mp3">
                Your browser does not support the video tag.
            </audio>
            <div style="margin-bottom:5px">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif

    </div>
</div>
