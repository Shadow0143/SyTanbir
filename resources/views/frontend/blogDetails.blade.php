@extends('layouts.frontend.app')

@section('title')
<title>SyTanbir | Blog Detail</title>
@endsection
@section('css')



@endsection

@section('content')

<div class="sidebar-page-container blog-single">
    <div class="circles-two">
        <div class="c-1"></div>
        <div class="c-2"></div>
    </div>

    <span class="dotted-pattern dotted-pattern-5"></span>
    <span class="tri-pattern tri-pattern-8"></span>

    <div class="auto-container">
        <div class="row clearfix">

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-content">
                    <div class="post-details">
                        <div class="inner-box" id="blog-data">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{asset('blogs')}}/{{$blog->image}}" alt="blog-img" width="100%"
                                        height="600px">
                                    <h2 class="mt-3">{{ucfirst($blog->title)}}</h2>
                                    <h4>{{ucfirst($blog->sub_title)}}</h4>
                                    <p>{!! $blog->description !!}</p>
                                    <p>By : {{$blog->name}} on {{$blog->category_name}}</p>
                                    <p>Posted on : {{date('d M, Y',strtotime($blog->creted_at))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Comments Area-->
                    <div class="comments-area">
                        <div class="comments-title">
                            <h4>Comments</h4>
                        </div>
                        <div id="comments" style="overflow-y: scroll; height:400px;">
                            @forelse($latestcomment as $key => $value)
                            <div class="row col-12 ">
                                <div class="col-9">
                                    <p>
                                        <strong>{{ucfirst($value->name)}}</strong>
                                        <br>
                                        <span>{!! $value->comment !!}</span>

                                    </p>
                                </div>
                                <div class="col-3">
                                    <p>
                                        {{$value->created_at->diffForHumans()}}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            @empty
                            <div class="col-12 text-cente">
                                <p class="text-danger">No Comments yet.</p>
                            </div>
                            @endforelse
                            <div class="newComments row"></div>
                        </div>
                    </div>

                    <!--Leave Comment Form-->
                    <div class="leave-comments">
                        <div class="comments-title">
                            <h4>Leave a Comment</h4>
                        </div>
                        <div class="default-form comment-form">
                            <form id="contactForm">
                                <div class="row clearfix">
                                    <input type="hidden" name="blog_id" id="blog_id" value="{{$blog->id}}">
                                    <div class="col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Your Name" required=""
                                            id="username">
                                    </div>

                                    <div class="col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required="" id="email">
                                    </div>

                                    <div class="col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your Comments" id="message"></textarea>
                                    </div>

                                    <div class="col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" id="commentSave"><span
                                                class="btn-title custom">Post Comment</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar blog-sidebar">
                    <!--Sidebar Widget-->
                    <!-- <div class="sidebar-widget search-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Search</h4>
                            </div>
                            <form method="post" action="blog.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search" required="">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                    </div> -->

                    <!-- <div class="sidebar-widget archives wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Categories</h4>
                                
                            <ul class="info">
                                <li><a href="#" class="custom">Hollywood</a></li>
                                <li class="active" class="custom"><a href="#">Model</a></li>
                                <li><a href="#" class="custom">Dancer</a></li>
                                <li><a href="#" class="custom">Actress</a></li>
                                <li><a href="#" class="custom">Actor</a></li>
                            </ul>
                        </div>
                    </div> -->


                    <div class="sidebar-widget recent-posts wow fadeInUp" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="widget-inner">
                            <div class="sidebar-title">
                                <h4>Latest Blogs</h4>
                            </div>
                            <div id="related-blog">
                                @foreach ($letestblogs as $key=>$val)
                                <h6><a href="{{route('blogsDetails',['id'=>$val->id])}}">{{ucfirst($val->title)}}</a>
                                </h6>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>






                </aside>
            </div>

        </div>
    </div>
</div>


@endsection


@section('js')

<script>
    $('#commentSave').on('click',function(e){
        e.preventDefault();
        var blog_id = $('#blog_id').val();
        var name = $('#username').val();
        var email = $('#email').val();
        var message = $('#message').val();
        
        if(name !=='' && email !=='' && message !=='' ){
            $.ajax({
                url:"{{route('submitBlogComment')}}",
                type:'POST',
                data:{
                    "_token":"{{csrf_token()}}",
                    name:name,
                    blog_id:blog_id,
                    email:email,
                    message:message,
                },
                success:function(data){
                    $('#username').val('');
                    $('#email').val('');
                    $('#message').val('');
                    $( ".newComments" ).prepend(data);
                }
            });
        }
    });
</script>
@endsection