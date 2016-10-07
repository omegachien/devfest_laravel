@extends('layout')

@section('content')
  <div class="row">

    <div class="col-md-3">
      <h1>{{ $flyer->street }}</h1>
      <h2>{{ $flyer->price }}</h2>

      <hr>

      <div class="description">
        {!! nl2br($flyer->description) !!}
      </div>
    </div>

    {{--<div class="col-md-9">--}}
      {{--@foreach($flyer->photos as $photo)--}}
        {{--<img src="{{ url($photo->path) }}" alt="">--}}
      {{--@endforeach--}}
    {{--</div>--}}

    <div class="col-md-8 gallery">
      @foreach($flyer->photos->chunk(3) as $set)
        <div class="row" style="padding-top:20px;">
          @foreach($set as $photo)
            <div class="col-md-4 gallery_item">
              <img src="{{ url($photo->thumbnail_path) }}" alt="">
            </div>
          @endforeach
        </div>
      @endforeach
    </div>

  </div>

  <hr>

  <h2>Add your photos</h2>

  <form id="addPhotosForm"
        class="dropzone"
        action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
        method="POST">
    {{ csrf_field() }}
  </form>

@stop

@section('scripts.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
  <script>
      Dropzone.options.addPhotosForm = {
        paramName: 'photo',
        maxFileSize: 5,
        acceptedFiles: '.jpg, .jpeg, .png, .bmp'
      }

  </script>
@stop