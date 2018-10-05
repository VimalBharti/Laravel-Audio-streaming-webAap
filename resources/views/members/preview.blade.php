@extends('layouts.app')

@section('title', $single->slug)

@section('content')

  <div class="single-design-page">

    <div id="box">
      <div class="columns design-customize-page">
        <div class="" style="display:none">
            <textarea class="innerbox html">{{ $single->coding }}</textarea>
            <textarea class="innerbox css">{{$single->css}}</textarea>
            <textarea class="innerbox js">{{$single->js}}</textarea>
        </div>
        <!-- column ends editor -->
        <div class="column is-12 iframe-box">
          <iframe id="live_update">
              <!DOCTYPE html>
              <html lang="en">
              <head></head>
              <body></body>
              </html>
          </iframe>
        </div>
      </div>

      <div class="field has-addons preview-control-btn-bottom">
        <p class="control">
          <a class="button is-medium is-fullwidth" href="{{route('post.show', $single->slug)}}">
            <span class="icon is-small">
              <i class="fa fa-undo"></i>
            </span>
            <span>Back</span>
          </a>
        </p>
        <p class="control">
          <a class="button is-medium is-fullwidth" href="{{route('customize-design', $single->slug)}}">
            <span class="icon is-small">
              <i class="fa fa-edit"></i>
            </span>
            <span>Cutomize</span>
          </a>
        </p>
      </div>

    </div>
    <!-- container ends -->

  </div>

  @stop

  @section('scripts')
  <script type="text/javascript">
  $(function(){
      function fetchHtml(){
          var html = $(".html").val();
          return html
      }

      function fetchCss(){
          var css = $(".css").val();
          return css
      }

      function fetchJs(){
          var css = $(".js").val();
          return js
      }

        $(".innerbox").on("keyup", function(){

            var target = $("#live_update")[0].contentWindow.document;
            target.open();
            target.close();

            var html = fetchHtml();
            var css = fetchCss();
            var js = fetchJs();

            $("body", target).append(html);
            $("head", target).append("<style>" + css + "</style>");
            $("head", target).append("<script>" + css + "</script>");

        });
        $('.innerbox').keyup();

    });
  </script>
  @stop
