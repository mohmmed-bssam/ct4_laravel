<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Show</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .comments-list li:not(:last-child) {
            border-bottom: 1px solid #d7d7d7;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="text-center">
            <h2>{{ $course->title }}</h2>
            <img class="w-75 mx-auto" src="{{ asset($course->image) }}" alt="">
            <div class="mt-5">{{ $course->content }}</div>
            @foreach ($course->tags as $tag)
            <a href="" class="btn btn-sm btn-light">{{ $tag->title }}</a>

            @endforeach
        </div>
        <hr>
        <h3>Comments({{ $course->comments_count }})</h3>
        @if ($course->comments_count)
            <ul class="list-unstyled mt-4 comments-list">
                @foreach ($course->comments()->with(['replies'])->whereNull('reply_to')->get() as $comment)
                    <li>
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="mb-0">{{ $comment->user->name }}</h5>
                                <small class="text-secondary">{{ $comment->created_at->diffForHumans() }}</small>

                            </div>
                            <button class="btn btn-info btn-sm" onclick="replyto({{ $comment->id }})">Reply</button>
                        </div>
                        <p class="mt-2">
                                {{ $comment->comment }}
                        </p>
                        @if ($comment->replies->count())
                            <ul>
                                @foreach ($comment->replies as $reply)
                                    <li>
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="mb-0">{{ $reply->user->name }}</h5>
                                                <small class="text-secondary">{{ $reply->created_at->diffForHumans() }}</small>

                                            </div>
                                            <button class="btn btn-info btn-sm" onclick="replyto({{ $reply->id }})">Reply</button>
                                        </div>
                                        <p class="mt-2">
                                            {{ $reply->comment }}
                                        </p>
                                    </li>
                                @endforeach

                            </ul>
                        @else
                        @endif
                    </li>
                @endforeach


            </ul>
        @endif

        <hr>
        <h3>Leave Comment</h3>
        <form action="{{ route('courses.comments') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="user_id" value="{{ rand(1, 6) }}">
            <input type="hidden" name="reply_to" value="">
            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="4"></textarea>
                @error('comment')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-dark px-4">Comment</button>
        </form>

<script>
    function replyto(id){
        document.querySelector('[name="reply_to"]').value=id;
        document.querySelector('[name="comment"]').focus();
    }
</script>
</body>


</html>
