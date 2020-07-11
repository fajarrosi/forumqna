<form method="post">
  @csrf
  <div class="upvote vote_jawaban" data-uid="{{Auth::id()}}" data-jawaban="{{$jwb->id}}" data-pertanyaan="{{$jwb->pertanyaan->id}}" data-reputasi = "{{Auth::user()->reputasi}}">
      <a class="upvote vote_a {{$jwb->user_id == Auth::id() ? 'vote-disabled' : ''}} {{ $jwb->votes && $jwb->votes->contains('user_id', Auth::id()) ? ($jwb->votes->where('user_id', Auth::id())->first()->jumlah_vote == 1 ? 'upvote-on' : null) : null}} "  data-vote="1"></a>
      <span class="count">
      	{{ $jwb->votes->sum('jumlah_vote')}}
      </span>
      <a class="downvote vote_a {{$jwb->user_id == Auth::id() ? 'vote-disabled' : ''}} {{ $jwb->votes && $jwb->votes->contains('user_id', Auth::id()) ? ($jwb->votes->where('user_id', Auth::id())->first()->jumlah_vote == -1 ? 'downvote-on' : null) : null}}" data-vote="-1"></a>
  </div>

</form> 
<div id="solved" class="invisible">
 	<svg aria-hidden="true" class="svg-icon iconCheckmarkLg" width="36" height="36" viewBox="0 0 36 36"><path d="M6 14l8 8L30 6v8L14 30l-8-8v-8z"></path></svg>
 </div>
@include('modal')