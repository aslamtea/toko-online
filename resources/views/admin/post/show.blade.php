@extends('admin.tempat.header')

@section('judul')
    Detail Post
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-12">
        <div class="card bg-gradient-light">
            <div class="card-header">
                <h1 class="text-center">Detail Post</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="text-center">gambar Post</h6>
                            </div>
                            <img src="{{asset('img/portfolio/'.$post->gambar)}}" alt="" class="img-thumbnail">
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Penulis Post</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$post->user->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Judul</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$post->judul}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Slug Url</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$post->slug}}</h6>
                            </div>
                        </div>
                        <div class="card shadow bg-light mt-3">
                            <div class="card-header">
                                <h6 class="text-center">Kategori Post</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{{$post->categori->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                                <div class="card shadow bg-light mt-3">
                                    <div class="card-header">
                                        <h6 class="text-center">Tag Post</h6>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-bold text-center">
                                         @foreach ($post->p_tag as $p)
                                            <aside>
                                                    <p>{{$p->name}},</p>
                                            </aside>
                                          @endforeach</h6>
                                    </div>
                                </div>
                        <div class="card shadow bg-light mt-3 mb-3">
                            <div class="card-header">
                                <h6 class="text-center">Artikel Post</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="text-bold text-center">{!!$post->isi!!}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection

