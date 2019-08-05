<h1>HR first job post</h1>
<p>HR with name: {{ $job->user->name }} shared his first job post at {{ date('d/m/Y H:i', strtotime($job->created_at)) }} and he/she entered email: {{ $job->email }}</p>
<h2>Title of the following post is:</h2>
<br>
<p>{{ $job->title }}</p>
<h3>Description of the following post is:</h3>
<br>
<p>{!! $job->description !!}</p>
<p>You can approve it on following link:
    <a href="{{ route('email-job-status', [1, $job->id]) }}">Approve</a>
    
</p>
<p>
    Also, you can decline it on following link:
    <a href="{{ route('email-job-status', [0, $job->id]) }}">Decline</a>
</p>