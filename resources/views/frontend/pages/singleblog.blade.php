@extends('frontend.layout.app')
@section('content')

@foreach($blogs as $blog)
@endforeach

<section class="bg0 p-t-100 p-b-20">
    <div class="container">
        <div class="row">
            <div class="col-sm-11 col-md-8 col-lg-9 m-rl-auto p-b-80">
                <!-- detail blog -->
                <div class="p-b-50">
                    <div class="wrap-pic-w">
                        <img src="{{asset('public/uploads/Blog/'.$blog->img )}}" alt="BLOG">
                    </div>
                    <div class="p-t-30">
                        <h4 class="txt-m-125 cl3">
                            {{$blog->title}}
                        </h4>
                        <div class="flex-w flex-m txt-s-115 cl9 p-t-14 p-b-22">
                            <span class="m-r-22">
                                {{$blog->updated_at}}
                            </span>

                            <span class="m-r-22">
                                Post by <span class="txt-s-108 cl6">{{$blog->author}}</span>
                            </span>
                        </div>

                        <p class="txt-s-101 cl6 p-b-12">
                            {{$blog->content}}
                        </p>
                        <h5 class="txt-m-104 cl3 p-t-18 p-b-19">
                        </h5>
                    </div>
                    <!--<div class="flex-w flex-sb-m p-t-20">
                                            <div class="flex-t flex-w p-t-6 p-r-30">
                                                <div class="txt-s-106 cl6 size-w-35 p-r-11">
                                                    <img class="m-r-2 m-b-2" src="{{asset('public/frontend/images/icons/icon-tag.png')}}" alt="IMG">
                                                    Tags:
                                                </div>
                    
                                                <div class="size-w-66">
                                                    <a href="#" class="txt-s-106 cl9 hov-cl10 trans-04">
                                                        Fruit,
                                                    </a>
                    
                                                    <a href="#" class="txt-s-106 cl9 hov-cl10 trans-04">
                                                        Farm Fresh,
                                                    </a>
                    
                                                    <a href="#" class="txt-s-106 cl9 hov-cl10 trans-04">
                                                        Oraganic Food.
                                                    </a>
                                                </div>
                                            </div>
                    
                                            <a href="#" class="txt-s-106 cl6 hov-cl10 trans-04 p-t-6">
                                                <img class="m-r-4 m-b-3" src="{{asset('public/frontend/images/icons/icon-share.png')}}" alt="IMG">
                                                Share
                                            </a>
                                        </div>-->
                </div>

                <!--comments-->
                <h4 class="txt-m-101 cl3 p-t-55">
                    Comments
                </h4>

                <div class="wrap-cmt">
                    <!--Main cmt--> 
                    @foreach($blog->comments as $comment)
                    <div class="how-bor2 p-b-40 p-t-35">	
                        <div class="main-cmt flex-w flex-sb-t">

                            <div class="size-w-72 flex-col-l respon17">
                                <span class="txt-s-121 cl3 m-r-20">
                                    {{$comment->name}}
                                </span>
                                <span class="txt-s-114 cl9">
                                    {{date('F-d-Y, h:i', strtotime($comment->created_at))}}
                                </span>

                                <div class="flex-w p-b-13">
                                    <p class="txt-s-114 cl9">
                                        {{$comment->email}}
                                    </p>
                                </div>
                                <p class="txt-s-101 cl6">
                                    {{$comment->comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--Leave comment--> 
                <h4 class="txt-m-101 cl3 p-t-25 p-b-26">
                    Leave us a comment:
                </h4>
                <form id="comment" name="comment" action="{{route('comments',$blog->id)}}" method="post">@csrf
                    <div class="row p-t-12">
                        <div class="col-sm-6 p-b-30">
                            <input class="form-control txt-s-120 cl3 plh1 size-a-21 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="name" id="name" placeholder="Name">
                        </div>

                        <div class="col-sm-6 p-b-30">
                            <input class="form-control txt-s-120 cl3 plh1 size-a-21 bo-all-1 bocl15 focus1 p-rl-20" type="text" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="col-12 p-b-30">
                            <textarea class="form-control txt-s-120 cl3 plh1 size-a-26 bo-all-1 bocl15 focus1 p-rl-20 p-tb-10" name="comment" id="comment" placeholder="Your comment"></textarea>
                        </div>
                    </div>
                    <div class="flex-l p-t-10">
                        <button class="flex-c-m txt-s-105 cl0 bg10 size-a-45 hov-btn2 trans-04" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection