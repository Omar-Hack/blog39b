@extends('Components.Navigations.Master')

@section('title', 'Publicaciones')

@section('home', 'Inicio')
@section('theme', 'Publicaciones')
@section('subtopic', '')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-2">
            <div class="row">
                <div class="col-12">
                    @include('Components.Navigations.LeftSide')
                </div>
                <div class="col-12">
                    @include('Components.Navigations.RightCategory')
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 col-xxl-10">
                    <div class="post_card">
                        <div class="post_card_content_center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="post_card_content_c_l">
                                        <div class="post_card_content_c_title">
                                            <i class="far fa-user"></i></i>&nbsp;
                                            {{ $post->user->name }}
                                        </div>
                                        <div class="post_card_content_o_date">
                                            <i class="far fa-clock"></i>&nbsp;
                                            {{ $post->date }}
                                        </div>
                                    </div>
                                    <img class="post_card_content_c_l_img" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                                </div>

                                <div class="col-12">
                                    <div class="post_card_content_c_l">
                                        <div class="post_card_content_c_title">
                                            {{ $post->title }}
                                        </div>
                                        <div class="post_card_content_c_text">
                                            {{ $post->description }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">
                            <div class="col-12">
                                <div class="modal">

                                    <input id="R-like{{ $post->id }}" name="modal" type="radio">
                                    <label class="modal_label" for="R-like{{ $post->id }}">
                                        @if ($post->comments->count() == '0')
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;0 Me gusta
                                        @else
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                        Me gusta
                                        @endif
                                    </label>

                                    <input id="R-share{{ $post->id }}" name="modal" type="radio">
                                    <label class="modal_label" for="R-share{{ $post->id }}">
                                        <i class="far fa-share-square fa-lg"></i>&nbsp;&nbsp;Compartir
                                    </label>
                                    <div class="modal_card">
                                        <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}/{{ $post->slug }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                            <i class="fab fa-facebook fa-lg"></i>&nbsp;&nbsp;Facebook
                                        </a>

                                        <a href="https://twitter.com/intent/tweet?&text={{ $post->title }}&url={{ request()->fullUrl() }}/{{ $post->slug }}&via={{ config('app.name') }}&hashtags=Omar-Lask" target="_blank" rel="noopener" class="blog_card_content_options">
                                            <i class="fab fa-twitter fa-lg"></i>&nbsp;&nbsp;Twitter
                                        </a>

                                        <a href="https://api.whatsapp.com/send?&text={{ $post->title }}%20{{ request()->fullUrl() }}/{{ $post->slug }}" target="_blank" rel="noopener" class="blog_card_content_options">
                                            <i class="fab fa-whatsapp fa-lg"></i>&nbsp;&nbsp;Whatsapp
                                        </a>

                                        @section('title', '' . $post->title)
                                        @section('description', '' . $post->description)
                                        @section('image', '' . $post->image)
                                    </div>


                                    <a href="{{ route('public.showpublications.show', $post->id) }}">
                                        <div class="post_card_content_o_title">
                                            &nbsp;&nbsp;<i class="far fa-arrow-alt-circle-right fa-lg"></i>&nbsp;&nbsp;Ver&nbsp;&nbsp;
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <br>
                        <div class="post_card__comments_content_options">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="modal">

                                    <input id="R-comment-C-C" name="modal" type="radio" class="ax-hidden">
                                    <label class="modal_label" for="R-comment-C-C">
                                        <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;Comentar
                                    </label>
                                    <div class="modal_card">

                                        @isset(auth()->user()->id)
                                        {!! Form::open(['route' => ['public.comment.store', ['post' => $post->id]]]) !!}

                                        <div class="row">
                                            <div class="col-2 text-a-c">
                                                <img class="blog_content_comment_img" src="{{ asset(Auth::user()->image) }}" alt="">
                                                <div class="blog_content_comment_img_date">
                                                    {{ Auth::user()->name }}
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="table_card_form_group">
                                                    @if ($errors->has('content'))
                                                    <div class="post_card_content_c_title">
                                                        <i class="fas fa-exclamation-circle"></i>
                                                        {{ $errors->first('content') }}
                                                    </div>
                                                    @endif
                                                    {{ Form::textarea('content', null, ['class' => 'blog_content_comment_input', 'placeholder' => 'Comentar ...']) }}

                                                </div>
                                                <button class="post_card_content_o_title">
                                                    &nbsp;<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;Publicar&nbsp;
                                                </button>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                        @else
                                        <a href="{{ route('public.login.index') }}" class="post_card_content_o_title" target="_blank">
                                            &nbsp;&nbsp;inicia sesión para comentar&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;&nbsp;
                                        </a>
                                        @endif
                                    </div>

                                    <input id="R-comment-C-C-C" name="modal" type="radio" class="ax-hidden">
                                    <label class="modal_label" for="R-comment-C-C-C">
                                        @if ($post->comments->count() == '0')
                                        <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp; 0 Comentar
                                        @else
                                        <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                        Comentarios
                                        @endif
                                    </label>
                                    <div class="modal_card">
                                        @include('Public.PublicationsComments.Home', ['comments' => $post->comments])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row j-mt-10 j-mb-10">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-0 col-xl-1 col-xxl-2"></div>

    </div>
</div>
@endsection
