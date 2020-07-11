<form method="post">
  @csrf
  <div class="upvote vote_pertanyaan" data-uid="{{Auth::id()}}" data-question="{{$q->id}}" data-reputasi= "{{Auth::user()->reputasi}}">
      <a class="upvote vote_q {{$q->user_id == Auth::id() ? 'vote-disabled' : ''}} {{ $q->votes && $q->votes->contains('user_id', Auth::id()) ? ($q->votes->where('user_id', Auth::id())->first()->jumlah_vote == 1 ? 'upvote-on' : null) : null}} "  data-vote="1"></a>
      <span class="count">{{$q->votes->sum('jumlah_vote') }}</span>
      <a class="downvote vote_q {{$q->user_id == Auth::id() ? 'vote-disabled' : ''}} {{ $q->votes && $q->votes->contains('user_id', Auth::id()) ? ($q->votes->where('user_id', Auth::id())->first()->jumlah_vote <= 0 ? 'downvote-on' : null) : null}}" data-vote="-1"></a>
  </div> 
</form> 
@include('modal')