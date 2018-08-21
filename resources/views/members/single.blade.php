@extends('layouts.app')

@section('title', 'Free')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <div class="single-design-page">

    <div class="container">
      <div class="featured-image-single has-text-centered">
        <img src="/uploads/design/{{ $single->image }}" class="is-fullheight is-fullwidth">
      </div>

      <section>
        <div class="tabs is-boxed is-fullwidth" id="tabs">
          <ul>
            <li class="is-active" data-tab="1">
              <a>
                <span class="icon is-small"><i class="fas fa fa-code" aria-hidden="true"></i></span>
                <span>CODE</span>
              </a>
            </li>
            <li data-tab="2">
              <a>
                <span class="icon is-small"><i class="fas fa fa-css3" aria-hidden="true"></i></span>
                <span>CSS</span>
              </a>
            </li>
            <li data-tab="3">
              <a>
                <span class="icon is-small"><i class="fas fa fa-picture-o" aria-hidden="true"></i></span>
                <span>PSD</span>
              </a>
            </li>
          </ul>
        </div>
        <div id="tab-content">
          <div class="is-active tab-item" data-content="1">

<code class="language-html" data-lang="html">
{{$single->markup}}
</code>

          </div>
          <div data-content="2" class="tab-item">

<code class="language-html" data-lang="css">
{{$single->css}}
</code>

          </div>
          <div data-content="3" class="tab-item">
            @if(isset($single->psd))
                <div class="download-psd has-text-centered">
                    <h2 class="down-ps">Download PSD file</h2>
                    <p>Free for personel use</p>
                    <a href="{{ URL::to('/uploads/psd/' . $single->psd) }}" download="{{$single->psd}}">
                        <img src="{{asset('images/psd-down.png')}}">
                    </a>
                </div>
            @else
                <h3 class="not-avail">PSD not available!</h3>
            @endif
          </div>
        </div>
      </section>

      <div class="content posted-by-single-page">
        <p><i class="fa fa-edit"></i> Submitted By:
          <strong><a href="/profile/{{$single->user_slug}}">{{$single->user_name}}</a></strong>
        </p>
        @if(isset($single->credit))
        <p><i class="fa fa-edit"></i> Design By:
          <strong><a href="{{$single->url}}" target="_blank">{{$single->credit}}</a></strong>
        </p>
        @endif
      </div>

    </div>
    <!-- container ends -->

  </div>

    @include('pages.join-com')

    @include('_partials.footer')

  @stop

  @section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#tabs li').on('click', function() {
        var tab = $(this).data('tab');

        $('#tabs li').removeClass('is-active');
        $(this).addClass('is-active');

        $('#tab-content .tab-item').removeClass('is-active');
        $('.tab-item[data-content="' + tab + '"]').addClass('is-active');
      });
    });
  </script>
  @stop
