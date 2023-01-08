@extends('layouts.frontend')

@section('content')

<style type="text/css">

.media .dateEl {
    display: inline-block;
    text-align: center;
    background: #f9f9f9;
    padding: 18px 0 25px 0;
    color: #173d51;
    font-size: 16px;
    font-weight: 700;
    width: 113px;
    text-transform: uppercase;
}
.media .dateEl em {
    display: block;
    color: #662d91;
    font-size: 42px;
    line-height: 1;
    margin-bottom: 5px;
    font-style: normal;
}
.media .media-heading a {
    color: #022235;
    font-size: 21px;
    text-transform: uppercase;
}
.media .meta-data {
    margin: 0 0 7px 0;
}
.news{
    padding-bottom:10px;
        border-bottom: 1px solid #ddd;
    padding-top: 11px;
}
.media .longDate, .media .timeEl {
    display: inline-block;
    font-size: 14px;
    line-height: 14px;
    font-family: 'PT Sans Narrow', sans-serif;
    font-weight: 700;
    color: #636465;
    text-transform: uppercase;
    min-height: 16px;
}
.media .longDate {
    background: transparent url() no-repeat left top;
    padding: 0 10px 0 24px;
    border-right: 1px solid #eb5b4c;
    margin-right: 3px;
}


.news .date, .news .date {
    display: block;
    text-align: center;
    padding: 18px 0 25px 0;
    color: #fff;
    background: #662d91;
    width: 113px;
}
.news .date span, .news .date span {
    display: inline-block;
    font-size: 42px;
    line-height: 1;
    letter-spacing: 0em;
    text-indent: -0.1em;
    color: #fff;
    font-weight: bold;
}
.news .date small, .news .date small {
    display: block;
    font-size: 18px;
    text-transform: uppercase;
    color: #fff;
}
/*.news h4 {
    margin: 0 0 12px 0;
    font-size: 22px;
    text-transform: uppercase;
}*/
</style> 

<header id="head" class="secondary" style="background-size: unset;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" align="center">
                <h1 style="padding-top: 3.5em;">News &amp; Events</h1>
                <p>
                    
                </p>
            </div>
        </div>
    </div>
</header>



<div class="container">  


      <div class="row">

        @foreach($item as $row)
        <div class="col-md-9">
          <div class="news">
            <div class="media">
              <span class="pull-left"><a href="javascript:"><span class="date"><span>{{ date("d",strtotime($row->created_at)) }}</span> <small>{{ date("M",strtotime($row->created_at)) }}</small></span></a></span>
              <div class="media-body">
                <h4 class="media-heading">
                  <a href="javascript:">{{ $row->title }}</a>
                </h4>
                <p>{!! substr($row->content,0,200) !!}...</p>
                <a class="btn btn-primary btn-sm pull-right" href="{{ url($row->url) }}">Read more</a>
              </div>
            </div>
          </div><!-- / blogPost -->
        </div><!-- / .col-md-6 -->
        @endforeach
        
        
      </div><!-- / row -->


              
</div>



@endsection
