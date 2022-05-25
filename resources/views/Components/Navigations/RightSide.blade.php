<div class="post_card">

    <div class="post_card_content_left_transparent">
        <div class="sub_sub_menu_card_content_list">
            <input type="checkbox" id="category" class="ax-hidden">
            <label for="category"></label>
            <div class="post_card_content_l_subtitle_transparent">
                <i class="far fa-newspaper"></i>&nbsp;&nbsp;Recientes
            </div>

            <div class="sub_sub_menu_card_content_down">
                <br>
                <div class="row">

                    @foreach ($posts as $post)

                    <div class="col-12 col-sm-6 col-md-4 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="post_card">
                            <a href="{{ route('public.showpublications.show', $post->id) }}">
                                <div class="post_card_content_center">
                                    <div class="row">
                                        <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 col-xxl-4">
                                            <img class="post_category_card_content_c_l_img" src="{{ asset($post->image) }}" alt="{{ $post->title}}">
                                        </div>

                                        <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xxl-8">
                                            <div class="post_card_content_c_l">
                                                <div class="post_card_content_c_title">
                                                    {{ $post->title }}
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

