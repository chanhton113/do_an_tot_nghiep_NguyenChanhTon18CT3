@extends('frontend.layouts.master')
@section('main-content')
@section('title','Chi tiết bài viết')
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">Default With Sidebar<span>Chi tiết bài viết</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết bài viết<li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article class="entry single-entry">
                        <figure class="entry-media">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                        </figure><!-- End .entry-media -->

                        <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    by <a href="#">{{$post->author_info['name']}}</a>
                                </span>
                                <span class="meta-separator">|</span>
                                <a href="#">{{$post->created_at->format('d,M,Y')}}
                                <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a>
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title">
                               {{$post->title}}
                            </h2><!-- End .entry-title -->

                            <div class="entry-cats">
                                in <a href="#">Lifestyle</a>,
                                <a href="#">Shopping</a>
                            </div><!-- End .entry-cats -->

                            <div class="entry-content editor-content">
                                <p>{!!$post->summary !!}</p>

                                <p>{!!$post->description !!}</p>

                                <div class="pb-1"></div><!-- End .mb-1 -->

                            </div><!-- End .entry-content -->

                            <div class="entry-footer row no-gutters flex-column flex-md-row">
                                <div class="col-md">
                                    <div class="entry-tags">
                                        <span>Thẻ:</span> <a href="#">photography</a> <a href="#">style</a>
                                    </div><!-- End .entry-tags -->
                                </div><!-- End .col -->

                                <div class="col-md-auto mt-2 mt-md-0">
                                    <div class="social-icons social-icons-color">
                                        <span class="social-label">Chia sẻ qua:</span>
                                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .entry-footer row no-gutters -->
                        </div><!-- End .entry-body -->

                        <div class="entry-author-details">
                            <figure class="author-media">
                                <a href="#">
                                    <img src="assets/images/blog/single/author.jpg" alt="User name">
                                </a>
                            </figure><!-- End .author-media -->

                            <div class="author-body">
                                <div class="author-header row no-gutters flex-column flex-md-row">
                                    <div class="col">
                                        <h4><a href="#">John Doe</a></h4>
                                    </div><!-- End .col -->
                                    <div class="col-auto mt-1 mt-md-0">
                                        <a href="#" class="author-link">View all posts by John Doe <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .col -->
                                </div><!-- End .row -->

                                <div class="author-content">
                                    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. </p>
                                </div><!-- End .author-content -->
                            </div><!-- End .author-body -->
                        </div><!-- End .entry-author-details-->
                    </article><!-- End .entry -->

                    <nav class="pager-nav" aria-label="Page navigation">
                        <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                            Previous Post
                            <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                        </a>

                        <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                            Next Post
                            <span class="pager-link-title">Praesent placerat risus</span>
                        </a>
                    </nav><!-- End .pager-nav -->

                    <div class="related-posts">
                        <h3 class="title">Bài viết gần đây</h3><!-- End .title -->

                        <div class="owl-carousel owl-simple" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":1
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    }
                                }
                            }'>
                            @foreach($recent_posts as $posts)
                            <article class="entry entry-grid">
                                <figure class="entry-media">
                                    <a href="{{route('blog.detail',$posts->slug)}}">
                                        <img src="{{$posts->photo}}" alt="{{$posts->photo}}">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#">{{$posts->created_at->format('d,M,Y')}}</a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="{{route('blog.detail',$posts->slug)}}">{{$posts->title}}</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Lifestyle</a>,
                                        <a href="#">Shopping</a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                            @endforeach
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .related-posts -->

                    <div class="comments">
                        <h3 class="title"> ({{$post->allComments->count()}}) Bình Luận</h3><!-- End .title -->

                        <ul>
                            @foreach($post_comment as $post_comments)
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="{{$post_comments->user_info->photo}}" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <a href="#" class="comment-reply">Trả lời</a>
                                        <div class="comment-user">
                                            <h4><a href="#"> {{$post_comments->user_info->name}}</a></h4>
                                            <span class="comment-date">{{$post_comments->created_at->format('d,M,Y')}}</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>{{$post_comments->comment}}</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Để lại bình luận của bạn</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form action="{{route('post-comment.store',$posts->slug)}}" method="POST">
                            @csrf
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="comment" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Nhận xét của bạn *"></textarea>

                            <div class="row">
                            </div><!-- End .row -->

                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>Bình luận</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div><!-- End .reply -->
                </div><!-- End .col-lg-9 -->

                <aside class="col-lg-3">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                            <form action="#">
                                <label for="ws" class="sr-only">Search in blog</label>
                                <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                                <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                            </form>
                        </div><!-- End .widget -->

                        <div class="widget widget-cats">
                            <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                            <ul>
                                <li><a href="#">Lifestyle<span>3</span></a></li>
                                <li><a href="#">Shopping<span>3</span></a></li>
                                <li><a href="#">Fashion<span>1</span></a></li>
                                <li><a href="#">Travel<span>3</span></a></li>
                                <li><a href="#">Hobbies<span>2</span></a></li>
                            </ul>
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                            <ul class="posts-list">
                                <li>
                                    <figure>
                                        <a href="#">
                                            <img src="assets/images/blog/sidebar/post-1.jpg" alt="post">
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
                                            <img src="assets/images/blog/sidebar/post-2.jpg" alt="post">
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
                                            <img src="assets/images/blog/sidebar/post-3.jpg" alt="post">
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
                                            <img src="assets/images/blog/sidebar/post-4.jpg" alt="post">
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

                            <div class="banner-sidebar">
                                <a href="#">
                                    <img src="assets/images/blog/sidebar/banner.jpg" alt="banner">
                                </a>
                            </div><!-- End .banner-ad -->
                        </div><!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                            <div class="tagcloud">
                                <a href="#">fashion</a>
                                <a href="#">style</a>
                                <a href="#">women</a>
                                <a href="#">photography</a>
                                <a href="#">travel</a>
                                <a href="#">shopping</a>
                                <a href="#">hobbies</a>
                            </div><!-- End .tagcloud -->
                        </div><!-- End .widget -->

                        <div class="widget widget-text">
                            <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                            <div class="widget-text-content">
                                <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                            </div><!-- End .widget-text-content -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
