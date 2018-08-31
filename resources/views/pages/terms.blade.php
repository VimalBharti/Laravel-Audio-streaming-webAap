@extends('layouts.app')

@section('title', 'Terms of service')

@section('content')

  <div class="menu-bar">
    @include('_partials.navbar')
  </div>

  <section>
    <div class="columns about-us-page">
      <div class="column">
        <h1>Terms of Service</h1>
      </div>
    </div>
    <div class="columns about-us-page-text">
      <div class="column is-8 is-offset-2">
        <p>These Terms of Service describe the rights and responsibilities that apply to your use of the websites Bybu.cc</p>
        <p>Read the Terms carefully before using the Service. If you do not accept the Terms, as well as Bybu's <a href="{{url('/privacy')}}">Privacy Policy</a> and the Bybu's <a href="{{url('/guideline')}}">Guidelines</a>, you may not use the Service.</p>

        <ol>
          <li><p>If you create an account on the website, you are responsible for maintaining your Account and your Content, and you are fully responsible for all activities that occur on your Account and for any other action taken on the Service.</p></li>
          <li>
            <p>If you operate an account, publish designs on the website, publish codes on the website, you are fully responsible for the content and for any damage that such content may cause. That is the case, regardless of whether the content in question constitutes text or graphics. By making the Content available, you represent and warrant that:</p>
            <ul>
              <li>the Content does not contain or install any viruses or other harmful or destructive content.</li>
              <li>the content is not spam, is not generated automatically or randomly, and does not contain unethical or unwanted commercial content designed to drive traffic to third-party sites or increase the search engine ranking of third-party sites, or for subsequent illicit acts (such as phishing) or misleading the recipients as to the source of the material.</li>
              <li>the Content is not obscene, hateful or racist or ethnically objectionable, and does not violate the privacy or publicity rights of any third party.</li>

              <li>your account is not named in a way that misleads your readers so that they think you are another person or company. </li>
            </ul>
          </li>
          <li>
            <p>By uploading Content or providing Content to Bybu, you grant Bybu the right to use and display your Content in connection with the provision of the Service as well as on the Site and our marketing.  communications with you and other users and possible users of the Service. To the extent that we use your Content in our marketing communications, unless you expressly allow us to do otherwise, we will always cite you as the owner of such Content.</p>
          </li>
          <li>
            <p>Bybu reserves the right to refuse or remove any Content or cancel or deny access to your use of the Service for any reason. Read the Community Guidelines on rules and advice on what types of Content and uses of the Service are appropriate in Bybu.</p>
          </li>
          <li><p>Bybu may terminate your access to all or part of the Service at any time, with or without cause, with or without notice, with immediate effect. If you wish to cancel your Account, you can simply stop using the Service. </p> </li>
          <li><p>You may contact us by email at support@bybu.cc</p> </li>
        </ol>

      </div>
    </div>
  </section>

  @include('_partials.footer');

@endsection

@section('scripts')
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123989535-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-123989535-1');
  </script>
@endsection
