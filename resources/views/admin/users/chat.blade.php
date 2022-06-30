@extends('admin.layouts.app')

@section('cards') @endsection

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card" >
                    <div class="card-header">
                        <div class="media d-flex align-items-center">
                            <div class="avatar me-3">
                                <img src="{{ url('images/'. $receptor->img) }}" alt="" srcset="">
                            
                            </div>
                            <div class="name flex-grow-1">
                                <h6 class="mb-0">{{ $receptor->name }}</h6>
                                @if (Cache::has('user-online'. $receptor->id))
                                <span class="text-xs">Online</span>
                                @else
                                <span ><h6 class="text-dark">Offline</h6></span>
                            @endif

                            </div>

                            <a class="btn icon" onclick=" $('#load').removeClass('bi-arrow-counterclockwise');$('#load').addClass('spinner-border spinner-border-sm');$('#app').load('{{ route('talk',$receptor->id) }}')">
                                <span class="bi bi-arrow-counterclockwise" id="load"></span>
                            </a>
                        </div>
                    </div>
                    <div class="chat card-body pt-4 bg-grey" style="overflow-y:scroll; height:350px">
                        <div class="chat-content">
                            @foreach ($messages as $message)
                            @if ($message->transmittor->id == Auth::user()->id)
                            <div class="chat chat-left">
                               <div class="chat-body">
                                   <div class="chat-message">{{ $message->content }}</div>
                               </div>
                            </div>
                           @endif
                            @if ($message->transmittor->id !== Auth::user()->id)
                            <div class="chat">
                                <div class="chat-body">
                                    <div class="chat-message">{{ $message->content }}</div>
                                </div>
                            </div>
                            @endif


                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="message-form d-flex flex-direction-column align-items-center">
                            {{-- <a href="http://" class="black"><i data-feather="smile"></i></a> --}}
                            <div class="d-flex flex-grow-1 ml-4">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Type your message.." id="message">
                                    <button type="submit" class="btn icon btn-primary" onclick="sendMessage({{ Auth::user()->id }},{{ $receptor->id }})">
                                        <i class="bi bi-arrow-up" id="up"></i>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
