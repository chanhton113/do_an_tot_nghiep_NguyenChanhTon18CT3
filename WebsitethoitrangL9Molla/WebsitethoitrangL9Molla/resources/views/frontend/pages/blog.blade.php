@extends('frontend.layouts.master')
@section('title','Bài viết')
@section('main-content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Blog Classic<span>Bài Viết</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('blog')}}">Bài viết</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách bài viết</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($posts as $post)
                    <article class="entry">
                        <figure class="entry-media">
                            <a href="single.html">
                                <img src="{{$post->photo}}" alt="{{$post->photo}}">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">{{$post->author_info['name']}}</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$post->created_at->format('d,M,Y')}}</a>
                                <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                                <a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a>
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#">Lifestyle</a>,
                                <a href="#">Shopping</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content">
                                <p>{!!$post->summary!!}</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="read-more">Đọc thêm</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                    @endforeach


                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            {{-- <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li> --}}
                            {{$posts->links()}}
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">Tìm kiếm</h3><!-- End .widget-title -->

                            <form action="#">
                                <label for="ws" class="sr-only">Search in blog</label>
                                <input type="search" class="form-control" name="ws" id="ws" placeholder="Tìm kiếm bài viết" required>
                                <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                            </form>
                        </div><!-- End .widget -->

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Danh mục bài viết</h3><!-- End .widget-title -->
                            <ul>
                                @if($post_category)
                                @foreach ($post_category as $cate)
                                <li><a href="#">{{$cate->title}}<span>3</span></a></li>
                                @endforeach
                                @endif
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="https://bcp.cdnchinhphu.vn/thumb_w/640/334894974524682240/2022/4/29/son-tung-mtp-08110778-1651217357607701319631.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 22, 2018</span>
                                        <h4><a href="#">Aliquam tincidunt mauris eurisus.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="https://bcp.cdnchinhphu.vn/thumb_w/640/334894974524682240/2022/4/29/son-tung-mtp-08110778-1651217357607701319631.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 19, 2018</span>
                                        <h4><a href="#">Cras ornare tristique elit.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="https://bcp.cdnchinhphu.vn/thumb_w/640/334894974524682240/2022/4/29/son-tung-mtp-08110778-1651217357607701319631.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 12, 2018</span>
                                        <h4><a href="#">Vivamus vestibulum ntulla nec ante.</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="https://bcp.cdnchinhphu.vn/thumb_w/640/334894974524682240/2022/4/29/son-tung-mtp-08110778-1651217357607701319631.jpg" alt="post">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>Nov 25, 2018</span>
                                        <h4><a href="#">Donec quis dui at dolor  tempor interdum.</a></h4>
                                    </div>
                                </li>
                            </ul><!-- End .posts-list -->
                        </div><!-- End .widget -->

                        <div class="widget widget-banner-sidebar">
                            <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                            <div class="banner-sidebar banner-overlay">
                                <a href="#">
                                    <img src="https://bcp.cdnchinhphu.vn/thumb_w/640/334894974524682240/2022/4/29/son-tung-mtp-08110778-1651217357607701319631.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner-ad -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Thẻ</h3><!-- End .widget-title -->
                            <div class="tagcloud">
                                @if($post_tag)
                                @foreach ($post_tag as $tag)
                                <a href="#">{{$tag->title}}</a>
                                @endforeach
                                @endif
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->

                        <div class="widget widget-text">
                            <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                            <div class="widget-text-content">
                                <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                            </div><!-- End .widget-text-content -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
