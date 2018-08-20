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
        <b-tabs type="is-boxed" position="is-centered" size="is-medium" expanded>
            <b-tab-item label="CODE" icon="fas fa fa-code">
<pre>
<code class="language-html" data-lang="html">
{{$single->markup}}
</code>
</pre>
            </b-tab-item>

            <b-tab-item label="CSS" icon="fas fa fa-css3">
<pre>
<code class="language-html" data-lang="css">
{{$single->css}}
</code>
</pre>
            </b-tab-item>

            <b-tab-item label="PSD" icon="fas fa fa-picture-o">
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
            </b-tab-item>

        </b-tabs>
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

  </script>
  @stop
