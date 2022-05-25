@extends('Components.Navigations.Master')

@section('title', '' . $post->title)

@section('home', 'Inicio')
@section('theme', 'Publicaciones')
@section('subtopic', '' . $post->title)
@section('description', '' . $post->description)
@section('image', '' . $post->image)

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
                <div class="col-12">
                    @include('Components.Navigations.RightSide')
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-8">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-11 col-xxl-10">
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

                                    <div class="">

                                        <label for="{{ $post->id }}" class="post-open-image">
                                            <i class="fas fa-camera-retro"></i>
                                        </label>
                                        <input type="checkbox" id="{{ $post->id }}" class="post-open-image-hidden">

                                        <div class="post-modal-image">
                                            <label for="{{ $post->id }}" class="post-open-image">
                                                <i class="far fa-times-circle"></i>
                                            </label>
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="post_card_content_c_l">
                                        <div class="modal">
                                            @isset($category->icon)

                                            <input id="R-category" name="modal" type="checkbox" class="ax-hidden">
                                            <label class="modal_label" for="R-category">
                                                <i class="far fa-bookmark"></i>&nbsp;&nbsp;Tema
                                            </label>
                                            <div class="modal_card_modal">
                                                <a href="{{ route('public.categorypublications.show', $category) }}" class="blog_card_content_options">
                                                    <img class="category_card_content_c_l_img" src="{{ asset($category->icon) }}" alt="{{ $category->title }}">&nbsp;&nbsp;{{ $category->title }}
                                                </a>

                                            </div>
                                            @endif
                                        </div>

                                        <div class="post_card_content_c_title">
                                            {{ $post->title }}
                                        </div>
                                        <div class="post_card_content_c_text">
                                            {{ $post->content }}
                                        </div>
                                    </div>

                                    <div class="row">

                                        @foreach ($images as $image)
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-6 col-xl-6 col-xxl-4">
                                            <div class="row">
                                                <div class="post_card_content_img">
                                                    <img src="{{ asset($image->url) }}" alt="">
                                                </div>
                                            </div>
                                            <label for="{{ $image->id }}" class="post-open-image">
                                                <i class="fas fa-camera-retro"></i>
                                            </label>
                                            <input type="checkbox" id="{{ $image->id }}" class="post-open-image-hidden">

                                            <div class="post-modal-image">
                                                <label for="{{ $image->id }}" class="post-open-image">
                                                    <i class="far fa-times-circle"></i>
                                                </label>
                                                <img src="{{ asset($image->url) }}" alt="" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="modal">

                                    <input id="R-like-M" name="modal" type="radio">
                                    <label class="modal_label" for="R-like-M">
                                         @if ($post->comments->count() == '0')
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;0 Me gusta
                                        @else
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                        Me gusta
                                        @endif
                                    </label>

                                    <input id="R-share-C" name="modal" type="checkbox" class="ax-hidden">
                                    <label class="modal_label" for="R-share-C">
                                        <i class="far fa-share-square fa-lg"></i>&nbsp;&nbsp;Compartir
                                    </label>
                                    <div class="modal_card_modal">
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
                                </div>
                            </div>
                        </div>

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
                                        @include('Public.PublicationsComments.Home')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-0 col-xl-1 col-xxl-2"></div>

    </div>
</div>
@endsection

