@extends('web.layout')
@section('title')
 exam question;
@endsection


@section('styles')
<link href="{{asset('web/css/TimeCircles.css')}}" rel="stylesheet">

@endsection
@section('main')
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/blog-post-background.jpg)"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="category.html">Category name</a></li>
                    <li><a href="category.html">Skill name</a></li>
                    <li>Exam name</li>
                </ul>
                <h1 class="white-text">Exam name</h1>
                <ul class="blog-post-meta">
                    <li>18 Oct, 2017</li>
                    <li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> 35</a></li>
                </ul>
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
            <div id="main" class="col-md-9">
               <form  id="exam-form"action="{{url("exam/submit/$exam->id")}}" method="post">
            @csrf</form>
                <!-- blog post -->
                <div class="blog-post mb-5">
                    <p>
                        @foreach ($exam->questions as $index=> $quest )


                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">{{$index+1}}- {{$quest->title}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="radio">
                                    <label>
                                      <input type="radio" name="answers[{{$quest->id}}]"  value="1"form="exam-form">
                                      {{$quest->option_1}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      <input type="radio" name="answers[{{$quest->id}}]"  value="2"form="exam-form">
                                      {{$quest->option_2}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      <input type="radio" name="answers[{{$quest->id}}]"  value="3" form="exam-form">
                                      {{$quest->option_3}}
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      <input type="radio" name="answers[{{$quest->id}}]"  value="4" form="exam-form">
                                      {{$quest->option_4}}
                                    </label>
                                </div>
                            </div>
                        </div>

                      @endforeach
                    </p>
                </div>
                <!-- /blog post -->

                <div>
                    <button form="exam-form" class="main-button icon-button pull-left">Submit</button>
                    <button class="main-button icon-button btn-danger pull-left ml-sm">Cancel</button>
                </div>
            </div>
            <!-- /main blog -->

           <!-- aside blog -->
           <div id="aside" class="col-md-3">

            <!-- exam details widget -->
            <ul class="list-group">
                <li class="list-group-item">{{$exam->skill->name()}}</li>
                <li class="list-group-item">:{{$exam->questions_no}}</li>
                <li class="list-group-item">{{$exam->duration_mins}} mins</li>
                <li class="list-group-item">Difficulty:
                      @for ( $i=1;$i<=$exam->difficulty-1;$i++ )
                      <i class="fa fa-star"></i>
                      @endfor
                      @for ( $i=1;$i<=5-$exam->difficulty;$i++ )
                      <i class="fa fa-star-o"></i>
                      @endfor


                </li>
            </ul>
            <!-- /exam details widget -->

            <div class="example" data-timer="{{$exam->duration_mins *60}}"></div>
        </div>
        <!-- row -->

    </div>
    <!-- container -->

</div>


@endsection


@section('scripts')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('web/js/TimeCircles.js')}}"></script>



<script>
 $(".example").TimeCircles({ time: {
        Days: { show:false },
        //Hours: { color: "#C0C8CF" },
        //Minutes: { color: "#C0C8CF" },
        //Seconds: { color: "#C0C8CF" }
    }});

    $(".example").TimeCircles({count_past_zero: false}).addListener(countdownComplete);

    function countdownComplete(unit, value, total){
        if(total<=0){
            $(this).fadeOut('slow').replaceWith("<h2>Time's Up!</h2>");
            $('#exam-form').submit();
        }
    }
</script>
@endsection
<!-- /Blog -->
