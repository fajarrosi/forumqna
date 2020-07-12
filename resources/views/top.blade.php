@extends('layouts.master')
@section('content')
@guest
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Pertanyaan</h4>
                     <hr>
                     <p>Kamu harus register dan login untuk dapat menanyakan <a href="/register">Register disini</a></p>
                  </div>
              </div>
          </div>
      </div>
@else
<div class="col-12 col-lg-9">
          <div class="card shadow-soft bg-white border-light animate-up-3 text-gray py-4 mb-5 mb-lg-0">
            <div class="card-header text-center pb-0">
                <div class="icon icon-shape icon-shape-primary rounded-circle mb-3"><i class="fas fa-bullhorn"></i></div>
                <h4 class="text-black">Top Pertanyaan</h4>
            </div>
                <div class="card-body">
                   <hr>
                   @foreach($top as $q)
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
                   <hr>
                     </div>
                   </div>
                   @endforeach
                   <br>
                </div>
          </div>
</div>

@endguest

@endsection
