@extends('layouts.app')
@section('content')
 @if (Session::has('flash_message'))
                          <div class="alert alert-success">{!!Session::get('flash_message')!!}</div>
@endif
 <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                     <h4>Jawaban Saya</h4>
                     <hr>
                     
                     @if($data->isEmpty())
                        <p>Kamu belum menjawaban pertanyaan apapun</p>
                     @else
                        @foreach($data as $jwb)
                        <div class="row">
                          <div class="col-xs-2 col-md-1" >
                            @include('jawaban_vote')
                          </div>
                          <div class="col-xs-10 col-md-11">
                              <!-- judul pertanyaan -->

                              <h3 style="font-size: 18px;">
                                <a href="/pertanyaan/jawab/{{$jwb->pertanyaan->id}}">{{$jwb->pertanyaan->judul}}</a>
                              </h3>

                              <h6 style="margin: 0;display: inline;word-wrap:break-word;">{!! $jwb->isi !!}</h6>                             
                             
                          </div>
                          <div class="col-md-12">
                            

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
</div>


@endsection

