@extends('layouts.master')

@section('content')
@guest

       <div class="col-12 col-lg-9">
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
            <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Top pertanyaan</h4>
            </div>
                <div class="card-body">
                   
                   <hr>
                   @foreach($top as $t)
                   <div class="col-md-12">
                    <!-- judul pertanyaan -->
                      <h3 style="font-size: 18px;">
                        <a href="/pertanyaan/jawab/{{$t->id}}">{{$t->judul}}</a>
                      </h3>

                      <!-- Tag -->
                              @if(!$t->tag->isEmpty())
                                @foreach($t->tag as $tag)
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
                                        Submitted {{date('F dS Y', strtotime($t->created_at))}} by <a href="#" >{{$t->user->name}}</a>
                                       
                                        @if ($t->user_id == Auth::id())
                                            
                                            <form action="/pertanyaan/{{$t->id}}" method="post"> | <a href="/pertanyaan/edit/{{$t->id}}">edit pertanyaan</a> |@csrf @method('delete') <a href = "#"
                onclick="confirm('Apakah anda yakin akan menghapus {{$t->judul}} ini ?') ? this.parentElement.submit() : ''"> hapus pertanyaan</a> |</form>
                                        @endif
                                    </strong></small>
                              </span>
                   <hr>
                   </div>
                   @endforeach
                   <br>
                </div>
          </div>

          <br>

            <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
              <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Pertanyaan Terbaru</h4>
            </div>
                <div class="card-body">
                                     
                        <hr>
                    @foreach($data as $q)
                     <div class="row">
                       <div class="col-xs-12 col-md-12">
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
                      <br>
                      {{ $data->links() }}
                </div>
          </div>
      </div>
@else


        @if (Session::has('flash_message'))
            <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
        @endif

      <div class="col-12 col-lg-9">
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
            <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Top pertanyaan</h4>
            </div>
                <div class="card-body">
                   
                   <hr>
                   @foreach($top as $t)
                   <div class="col-md-12">
                    <!-- judul pertanyaan -->
                      <h3 style="font-size: 18px;">
                        <a href="/pertanyaan/jawab/{{$t->id}}">{{$t->judul}}</a>
                      </h3>

                      <!-- Tag -->
                              @if(!$t->tag->isEmpty())
                                @foreach($t->tag as $tag)
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
                                        Submitted {{date('F dS Y', strtotime($t->created_at))}} by <a href="#" >{{$t->user->name}}</a>
                                       
                                        @if ($t->user_id == Auth::id())
                                            
                                            <form action="/pertanyaan/{{$t->id}}" method="post"> | <a href="/pertanyaan/edit/{{$t->id}}">edit pertanyaan</a> |@csrf @method('delete') <a href = "#"
                onclick="confirm('Apakah anda yakin akan menghapus {{$t->judul}} ini ?') ? this.parentElement.submit() : ''"> hapus pertanyaan</a> |</form>
                                        @endif
                                    </strong></small>
                              </span>
                   <hr>
                   </div>
                   @endforeach
                   <br>
                </div>
          </div>

          <br>

            <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
              <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Pertanyaan Terbaru</h4>
            </div>
                <div class="card-body">
                                     
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
                      <br>
                      {{ $data->links() }}
                </div>
          </div>
      </div>
@endguest
@endsection


