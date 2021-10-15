@extends('web.layout')
@section('title')
 show skill;
@endsection
@section('main')
    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="category.html">Category name</a></li>
                        <li>Skill name</li>
                    </ul>
                    <h1 class="white-text">Skill name</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-12">

                    <!-- row -->
                    <div class="row">
                        @foreach ($skill->exams as $one_exam )
                        <!-- single exam -->
                        <div class="col-md-3">
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="exam.html">
                                        <img src="{{asset("uploads/$one_exam->img")}}" alt="">
                                    </a>
                                </div>
                                <h4><a href="{{url("exam/show/{$one_exam->id}")}}">{{$one_exam->name()}}</a></h4>
                                <div class="blog-meta">
                                    <span>{{Carbon\Carbon::parse($one_exam->created_at)->format('d M, Y')}}</span>
                                    <div class="pull-right">
                                        <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i>  {{$one_exam->users()->count()}}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /single exam -->

                    @endforeach

                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">


                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->
@endsection
