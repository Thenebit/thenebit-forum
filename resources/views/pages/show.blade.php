@extends('components.forum')

@section('content')
<section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="{{ asset('blogStorage/' . $data->image) }}" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title">{{ $data->title }}</h1>
              <ul>
                <li>
                  <span class="bi bi-person"></span>
                  <a href="#">{{ $data->author }}</a>
                </li>
                <li>
                  <span class="bi bi-tag"></span>
                  <a href="#">{{ $data->postType }}</a>
                </li>
                <li>
                  <span class="bi bi-chat-left-text"></span>
                  <a href="#">{{ $data->comments->count() }}</a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <p>
              {{ $data->description }}
              </p>
            </div>
          </div>
  
          <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments</h4>
            </div>
            <ul class="list-comments">

              @foreach ($data->comments as $comment)
                  <li>
                      <div class="comment-avatar">
                          <img src="{{ asset('assets/img/ava.png') }}" alt="">
                      </div>
                      <div class="comment-details">
                          <span>{{ $comment->created_at->format('d M Y') }}</span>
                          <p>{{ $comment->comments }}</p>
                      </div>
                  </li>
              @endforeach

            </ul>
          </div>

          <div class="form-comments">
            <div class="title-box-2">
              <h3 class="title-left">
                Leave a Reply
              </h3>
            </div>

            <script>
              @if(session('success'))
                  alert('{{ session('success') }}');
              @endif               
            </script>

            <form class="form-mf" action="{{ url('comments') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $data->id }}">
                  <div class="row">
                      <div class="col-md-12 mb-3">
                          <div class="form-group">
                              <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="comments" cols="45" rows="8" required></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                      </div>
                  </div>
              </form>
          </div>
        </div>      
        </div>
      </div>
    </div>
  </section>
@endsection