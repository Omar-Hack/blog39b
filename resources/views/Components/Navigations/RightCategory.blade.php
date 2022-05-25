
<div class="post_card">

    <div class="post_card_content_left">
        <div class="sub_sub_menu_card_content_list">
            <input type="checkbox" id="category" class="ax-hidden">
            <label for="category"></label>
            <div class="post_card_content_l_subtitle">
                <i class="far fa-bookmark"></i>&nbsp;&nbsp;Temas
            </div>

            @foreach ($categories as $category )
            <div class="sub_sub_menu_card_content_down">

                <div class="sub_menu_card_content_list">

                    <input type="checkbox" id="blog" class="ax-hidden">
                    <label for="blog"></label>
                    <div class="post_card_content_l_subtitle">
                        <img class="category_card_content_c_l_img" src="{{ asset($category->icon) }}" alt="{{ $category->title }}">&nbsp;&nbsp; {{ $category->title }}
                    </div>

                    <div class="sub_menu_card_content_down">

                        <div class="j-mt-10"></div>

                        @foreach ( $category->catas as $cata )
                        @if($cata->status == '1')
                        <a href="{{ route('public.categorypublications.show', $category) }}">
                            <div class="menu-card-content-text">
                                <img class="category_card_content_c_l_img" src="{{ asset($cata->icon) }}" alt="{{ $cata->title }}">&nbsp;&nbsp;{{ $cata->title }}
                            </div>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>

