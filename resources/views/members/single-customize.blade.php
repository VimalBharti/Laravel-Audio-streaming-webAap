@extends('layouts.app')

@section('title', $single->slug)

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <div class="single-design-page">

    <div id="box">
      <div class="columns design-customize-page">
        <div class="column is-5">
            <section class="editor-area">
              <b-tabs type="is-boxed" position="is-centered" size="is-medium" expanded>
                  <b-tab-item label="CODE" icon="fas fa fa-code">
      <pre class="custom">

        <textarea class="innerbox html">{{ $single->coding }}</textarea>
      </pre>
                  </b-tab-item>

                  <b-tab-item label="CSS" icon="fas fa fa-css3">
      <pre class="custom">
      <code class="language-html" data-lang="css">
        <textarea class="innerbox css">{{$single->css}}</textarea>
      </code>
      </pre>
                  </b-tab-item>

                  <b-tab-item label="Select Image" icon="fas fa fa-css3">
<iframe src="https://www.pexels.com/" width="" height="">

</iframe>
                  </b-tab-item>

              </b-tabs>
            </section>
        </div>
        <!-- column ends editor -->
        <div class="column is-7 innerbox preview">
          <iframe id="live_update">
              <!DOCTYPE html>
              <html lang="en">
              <head></head>
              <body></body>
              </html>
          </iframe>
        </div>
      </div>

    </div>
    <!-- container ends -->

  </div>

    @include('pages.join-com')

    @include('_partials.footer')

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

          $(".innerbox").on("keyup", function(){

              var target = $("#live_update")[0].contentWindow.document;
              target.open();
              target.close();

              var html = fetchHtml();
              var css = fetchCss();

              $("body", target).append(html);
              $("head", target).append("<style>" + css + "</style>");

          });
          $('.innerbox').keyup();
    });
  </script>
  @stop
