@extends('frontend.layout.app')
@section('content')

    <section class="bg0 p-t-100 p-b-15">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-80">
                @foreach($blog as $blogs)
                    <!-- item blog -->
                        <div class="p-b-47">
                            <a href="{{ route('viewblog', $blogs->id) }}" class="wrap-pic-w how-pos8-parent hov4">
                                <img src="{{asset('public/uploads/Blog/'.$blogs->img )}}" alt="BLOG">
                                <div class="size-a-4 bg10 flex-col-c-m how-pos8">
                            <span class="txt-l-106 cl0 p-b-4">
                                {{date('d', strtotime($blogs->created_at))}}
                            </span>
                                    <span class="txt-m-108 cl0 p-b-5">
                                {{date('F', strtotime($blogs->created_at))}}
                            </span>
                                </div>
                            </a>
                            <div class="p-t-35">
                                <h4>
                                    <a href="{{ route('viewblog', $blogs->id) }}"
                                       class="txt-m-125 cl3 hov-cl10 trans-04">
                                        {{$blogs->title}}
                                    </a>
                                </h4>
                                <p class="txt-s-101 cl6 p-t-18">
                                    {{substr($blogs->content,0,250)}} {{strlen($blogs->content) > 250 ? '...' : ''}}
                                </p>
                                <div class="flex-w flex-sb-m">
                                    <div class="flex-w flex-m txt-s-115 cl9 m-r-30 p-tb-19">
                                <span class="m-r-25">
                                    Post by <span class="txt-s-108 cl6">{{$blogs->author}}</span>
                                </span>
                                    </div>
                                    <div class="how-line2 p-l-40 m-t-2">
                                        <a href="{{ route('viewblog', $blogs->id) }}"
                                           class="txt-s-105 cl9 hov-cl10 trans-04">
                                            Read more
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="flex-w flex-c-m p-t-85">
                        {{$blog->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
