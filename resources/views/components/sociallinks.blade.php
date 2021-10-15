<ul class="footer-social">
    @if ($set->facebook!==null)
    <li><a href="{{$set->facebook}}" class="facebook"><i class="fa fa-facebook"></i></a></li>
    @endif
    @if ($set->twitter!==null)
    <li><a href="{{$set->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
    @endif
    @if ($set->youtube!==null)
    <li><a href="{{$set->youtube}}" class="youtube"><i class="fa fa-youtube"></i></a></li>
    @endif
    @if ($set->linkedin!==null)
    <li><a href="{{$set->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
    @endif

</ul>
