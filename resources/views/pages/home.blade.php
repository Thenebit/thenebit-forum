@extends('components.layouts.app1')

@section('content')
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              LaraByte
            </h3>
            <p class="subtitle-a">
              Providing the latest news in tech, trends, and tricks
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      
      <div class="row">
        @foreach ($data as $data)
        <div class="col-md-4">          
            <div class="card card-blog">
              <div class="card-img">
                <a href="{{ url('show', $data->id) }}"><img src="blogStorage/{{ $data->image }}" alt="" class="img-fluid"></a>
              </div>
              <div class="card-body">
                <div class="card-category-box">
                  <div class="card-category">
                    <h6 class="category">{{ $data->postType }}</h6>
                  </div>
                </div>
                <h3 class="card-title"><a href="#">{{ $data->title}}</a></h3>
                <p class="card-description">
                  {{ Str::limit($data->description, 200) }}
                </p>
              </div>
              <div class="card-footer">
                <div class="post-author">
                  <a href="#">
                    <span class="author bi bi-person">{{ $data->author }}</span>
                  </a>
                </div>
                <div class="post-date">
                  <span class="bi bi-clock"></span>{{ $data->created_at->diffForHumans() }}
                </div>
              </div>
            </div>
        </div>
        @endforeach
          
      </div>
    </div>
  </section>
    
@endsection