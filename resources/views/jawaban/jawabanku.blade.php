@extends('layouts.master')
@section('content')
 @if (Session::has('flash_message'))
                          <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
@endif
      <div class="col-12 col-lg-9">
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
            <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Jawabanku</h4>
            </div>
                <div class="card-body">
                     <hr>
                     @if($data->isEmpty())
                        <p>Kamu belum menjawaban pertanyaan apapun</p>
                     @else
                        @foreach($data as $jwb)
                        <div class="row">
                          <div class="col-xs-2 col-md-1" >
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
                          <div id="solved" class="{{ $jwb->votes && $jwb->votes->contains('user_id', $jwb->pertanyaan->user_id) ? ($jwb->votes->where('user_id', $jwb->pertanyaan->user_id)->first()->jumlah_vote == 1 ? 'visible' : 'invisible') : 'invisible'}}">
                            <svg aria-hidden="true" class="svg-icon iconCheckmarkLg" width="36" height="36" viewBox="0 0 36 36"><path d="M6 14l8 8L30 6v8L14 30l-8-8v-8z"></path></svg>
                           </div>
                          @include('modal')
                          </div>
                          <div class="col-xs-10 col-md-11">
                              <!-- judul pertanyaan -->

                              <h3 style="font-size: 18px;">
                                <a href="/pertanyaan/jawab/{{$jwb->pertanyaan->id}}">{{$jwb->pertanyaan->judul}}</a>
                              </h3>

                              <h6 style="margin: 0;display: inline;word-wrap:break-word;">{!! $jwb->isi !!}</h6>   

                              <p style="text-align: right;margin-bottom: 0;">
                                    <strong>
                                      <small>
                                        <form method="post" action="/jawaban/{{$jwb->pertanyaan->id}}/{{$jwb->id}}" id="jwbn2">
                                          <a href="/jawaban/edit/{{$jwb->pertanyaan->id}}/{{$jwb->id}}">edit jawaban</a> | 
                                          @csrf
                                          @method('delete')
                                           <a href="#" onclick="confirm('Apakah anda yakin akan menghapus jawaban ini ?') ? this.closest('form').submit() : ''"> hapus jawaban</a> | 
                                        </form>
                                        
                                        <a href="#">{{$jwb->user->name}}</a> | {{ $jwb->updated_at->diffForHumans() }}
                                      </small>
                                    </strong>
                            </p>                          
                             
                          </div>
                          
                        </div>
                        @if($data->last() != $jwb)
                            <hr style="margin-top: 0;">
                        @endif
                        @endforeach
                        {{ $data->links() }}
                     @endif
                </div>
          </div>
      </div>

@endsection
@push('css')
<style type="text/css">
  svg{
    fill:#18bc00; 
  }
</style>
@endpush
