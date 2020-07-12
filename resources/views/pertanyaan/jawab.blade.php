@extends('layouts.master')
@section('content')
@guest
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Jawab Pertanyaan</h4>
                     <hr>
                     <p>Kamu harus register dan login untuk dapat menjawab pertanyaan <a href="/register">Register disini</a></p>
                  </div>
              </div>
          </div>
      </div>
@else
@if (Session::has('flash_message'))
  <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
@endif
      <div class="col-12 col-lg-9">
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">

                <div class="card-body">
                                       <div class="row">

                      <div class="col-xs-2 col-md-1" >
                          <form method="post">
                              @csrf
                              <div class="upvote vote_pertanyaan" data-uid="{{Auth::id()}}" data-question="{{$data->id}}"  data-reputasi= "{{Auth::user()->reputasi}}">
                                  <a class="upvote vote_q {{$data->user_id == Auth::id() ? 'vote-disabled' : ''}} {{ $data->votes && $data->votes->contains('user_id', Auth::id()) ? ($data->votes->where('user_id', Auth::id())->first()->jumlah_vote == 1 ? 'upvote-on' : null) : null}} "  data-vote="1"></a>
                                  <span class="count">{{$data->votes->sum('jumlah_vote')}}</span>
                                  <a class="downvote vote_q {{$data->user_id == Auth::id() ? 'vote-disabled' : ''}}  {{ $data->votes && $data->votes->contains('user_id', Auth::id()) ? ($data->votes->where('user_id', Auth::id())->first()->jumlah_vote <= 0 ? 'downvote-on' : null) : null}}" data-vote="-1"></a>
                              </div>                             
                          </form> 
                      </div>
                      <div class="col-xs-10 col-md-11" >
                        <h3 style="font-size: 18px;">
                          {{$data->judul}}
                        </h3>
                         
                        @if(!$data->tag->isEmpty())
                                @foreach($data->tag as $tag)
                                  <a href="#">
                                    <button class="btn btn-primary btn-sm">{{$tag->name}}</button>
                                  </a>
                                @endforeach
                              @else
                                <span><small><strong>tidak ada tag</strong></small></span>
                        @endif
                        <br>
                              <span>
                                <small><strong>
                                        Submitted {{date('F dS Y', strtotime($data->created_at))}} by <a href="#" >{{$data->user->name}}</a>
                                        @if ($data->user_id == Auth::id())
                                            
                                            <form action="/pertanyaan/{{$data->id}}" method="post" id="pertanyaan"> | <a href="/pertanyaan/edit/{{$data->id}}" >edit pertanyaan</a> |@csrf @method('delete') 
                                              <a href = "#"
                onclick="confirm('Apakah anda yakin akan menghapus pertanyaan ini ?') ? this.closest('form').submit() : ''" id="s"> hapus pertanyaan</a> |
                                            </form>
                                        @endif
                                    </strong></small>
                              </span>
                      </div>
                      
                      <div class="col-md-12">
                        <hr>
                        {!!$data->isi!!}
                      </div>
                    </div>
                </div>
          </div>
          <br>
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">

                <div class="card-body">
                   <h4>Jawaban</h4>
                     <hr>
                     @if(!$data->jawaban->isEmpty())
                      @foreach($data->jawaban as $jwb)
                      <div class="row">
                        <div class="col-xs-2 col-md-1">
                          @include('jawaban_vote')                          
                        </div>
                        <div class="col-xs-10 col-md-11">

                          <h4 style="margin: 0;display: inline;word-wrap:break-word;">{!! $jwb->isi !!}</h4>

                          @if ($jwb->created_at != $jwb->updated_at)
                               @if(Auth::user()->id == $jwb->user_id)
                                  <p style="text-align: right;margin-bottom: 0;">
                                    <strong>
                                      <small>
                                         
                                        <form method="post" action="/jawaban/{{$data->id}}/{{$jwb->id}}" id="jwbn1">
                                          <a href="/jawaban/edit/{{$data->id}}/{{$jwb->id}}">edit jawaban</a> |
                                          @csrf
                                          @method('delete')
                                           <a href="#" onclick="confirm('Apakah anda yakin akan menghapus jawaban ini ?') ? this.closest('form').submit() : ''" id="w">hapus jawaban</a> | 
                                        </form>
                                        
                                        <a href="#">{{$jwb->user->name}}</a> | edited {{ $jwb->updated_at->diffForHumans() }}
                                      </small>
                                    </strong>
                                  </p>
                              @else
                              <p style="text-align: right;margin-bottom: 0;">
                                <strong>
                                  <small>
                                    <a href="#">{{$jwb->user->name}}</a> | edited {{ $jwb->updated_at->diffForHumans() }}
                                  </small>
                                </strong>
                              </p>
                              @endif
                             
                          @else
                              @if(Auth::user()->id == $jwb->user_id)
                                  <p style="text-align: right;margin-bottom: 0;">
                                    <strong>
                                      <small>
                                        
                                        <form method="post" action="/jawaban/{{$data->id}}/{{$jwb->id}}" id="jwbn2">
                                          <a href="/jawaban/edit/{{$data->id}}/{{$jwb->id}}">edit jawaban</a> | 
                                          @csrf
                                          @method('delete')
                                           <a href="#" onclick="confirm('Apakah anda yakin akan menghapus jawaban ini ?') ? this.closest('form').submit() : ''"> hapus jawaban</a> | 
                                        </form>
                                        
                                        <a href="#">{{$jwb->user->name}}</a> | {{ $jwb->updated_at->diffForHumans() }}
                                      </small>
                                    </strong>
                                  </p>
                              @else
                             <p style="text-align: right;margin-bottom: 0;">
                              <strong>
                                <small>
                                  <a href="#">{{$jwb->user->name}}</a> | {{ $jwb->updated_at->diffForHumans() }}
                                </small>
                              </strong>
                            </p>
                             @endif
                          @endif
                        </div>
                      </div>
                      <hr style="margin-top: 0;">
                                 
                      @endforeach
                     @else
                     <p>Belum Jawaban</p>
                     @endif
                </div>
          </div>
          <br>
          @if($data->user_id != Auth::user()->id)
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">

                <div class="card-body">
                    <h4>Jawaban Kamu</h4>
                     <hr>
                     <form method="post" enctype="multipart/form-data" action="{{route('jawaban.simpan')}}">
                      @csrf
                      <div class="form-group">
                        <label>Judul jawaban</label>
                        <input class="form-control" type="text" name="judul" placeholder="judul jawaban">
                        <input type="hidden" name="pertanyaan_id" value="{{$data->id}}">
                      </div>
                      <div class="form-group">
                        <label>Isi jawaban</label>
                        <textarea name="isi" id="isi"class="form-control" rows="10" cols="50"></textarea >
                      </div>

                      <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                      </div>
                     </form>
                </div>
          </div>
          @endif
</div>





@endguest

@include('modal')

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>
<script>
  $(function(){
    CKEDITOR.replace('isi');
  });
</script>

@endpush


