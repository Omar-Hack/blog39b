@extends('Components.Navigations.Master')

@section('title', '' . $category_data->title)

@section('home', 'Inicio')
@section('theme', 'Temas')
@section('subtopic', '' . $category_data->title)

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
                <div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-6 col-xxl-6">
                    <div class="post_card">
                        <a href="{{ route('public.showpublications.show', $post->id) }}">
                            <div class="post_card_content_center">
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                        <img class="post_post_card_content_c_l_img" src="{{ asset($post->image) }}" alt="{{ $post->title}}">
                                    </div>

                                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                                        <div class="post_card_content_c_l">
                                            <div class="post_card_content_c_title">
                                                {{ $post->title }}
                                            </div>
                                            <div class="post_card_content_c_text j-mt-5">
                                                {{ $post->description }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="post_card_content_c_title">
                                            <i class="far fa-user"></i></i>&nbsp;
                                            {{ $post->user->name }}
                                        </div>
                                        <div class="post_card_content_o_date">
                                            <i class="far fa-clock"></i>&nbsp;
                                            {{ $post->date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="footer-line-m"></div>

                        <div class="post_card_content_options">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <div class="modal">
                                    <input id="R-comment{{ $post->id }} " type="radio" name="modal">
                                    <label class="modal_label" for="R-comment{{ $post->id }} ">
                                        @if ($post->comments->count() == '0')
                                        <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp; 0 Comentar
                                        @else
                                        <i class="far fa-comments fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                        Comentarios
                                        @endif
                                    </label>

                                    <input id="R-like{{ $post->id }}" name="modal" type="radio">
                                    <label class="modal_label" for="R-like{{ $post->id }}">
                                        @if ($post->comments->count() == '0')
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;0 Me gusta
                                        @else
                                        <i class="far fa-heart fa-lg"></i>&nbsp;&nbsp;{{ $post->comments->count() }}
                                        Me gusta
                                        @endif
                                    </label>

                                    <input id="R-share{{ $post->id }}" name="modal" type="checkbox" class="ax-hidden">
                                    <label class="modal_label" for="R-share{{ $post->id }}">
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

