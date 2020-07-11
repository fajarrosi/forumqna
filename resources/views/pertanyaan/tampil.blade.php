@extends('layouts.app')
@section('content')
@if (Session::has('flash_message'))
                          <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
@endif
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Pertanyaan Saya</h4>
                     <hr>
                      
                     @if($data->isEmpty())
                        <p>Kamu belum memiliki pertanyaan</p>
                     @else
                        @foreach($data as $q)
                        <div class="row">
                          <div class="col-xs-2 col-md-1" >
                            @include('pertanyaan_vote')
                          </div>
                          <div class="col-xs-10 col-md-11">
                              <!-- judul pertanyaan -->
                              <h3 style="font-size: 18px;">
                                <a href="/pertanyaan/jawab/{{$q->id}}">{{$q->judul}}</a>
                              </h3>
                              <!-- tag -->
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
                onclick="confirm('Apakah anda yakin akan menghapus pertanyaan ini ?') ? this.parentElement.submit() : ''"> hapus pertanyaan</a> |</form>
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
                     @endif
                  </div>
              </div>
          </div>
</div>


@endsection
