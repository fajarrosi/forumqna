@extends('layouts.app')

@section('content')
    @guest
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Larastack</h4>
                     <hr>
                     <p>Aplikasi diskusi tanya jawab</p>
                  </div>
              </div>
          </div>
      </div>
    @else
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
        @endif
       <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Larastack</h4>
                     <hr>
                     <p>Aplikasi diskusi tanya jawab</p>
                  </div>
              </div>
          </div>
      </div>
      <br>

       <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Pertanyaan Terbaru</h4>
                        <hr>
                    @foreach($data as $q)
                     <div class="row">
                       <div class="col-xs-2 col-md-1">
                         @include('pertanyaan_vote')
                       </div>
                       <div class="col-xs-10 col-md-11">
                         <!-- judul pertanyaan -->
                              <h3 style="font-size: 18px;">
                                <a href="/pertanyaan/jawab/{{$q->id}}">{{$q->judul}}</a>
                              </h3>
                              <!-- Tag -->
                              @if(!$q->tag->isEmpty())
                                @foreach($q->tag as $tag)
                                  <a href="#">
                                    <button class="btn btn-primary btn-sm">{{$tag->name}}</button>
                                  </a>
                                @endforeach
                              @else
                                <span><small><strong>tidak ada tag</strong></small></span>
                              @endif

                              <!--subimitted by user  -->
                              <br>
                              <span>
                                <small><strong>
                                        Submitted {{date('F dS Y', strtotime($q->created_at))}} by <a href="#" >{{$q->user->name}}</a>
                                       
                                        @if ($q->user_id == Auth::id())
                                            
                                            <form action="/pertanyaan/{{$q->id}}" method="post"> | <a href="/pertanyaan/edit/{{$q->id}}">edit pertanyaan</a> |@csrf @method('delete') <a href = "#"
                onclick="confirm('Apakah anda yakin akan menghapus {{$q->judul}} ini ?') ? this.parentElement.submit() : ''"> hapus pertanyaan</a> |</form>
                                        @endif
                                    </strong></small>
                              </span>
                       </div>
                     </div>
                        @if($data->last() != $q)
                          <hr>
                        @endif
                      @endforeach
                      {{ $data->links() }}
                  </div>
              </div>
          </div>
      </div>
      <br>
    @endguest
@endsection
