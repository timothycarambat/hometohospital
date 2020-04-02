@extends('layout')

@section('main_content')
<main class="mdl-layout__content" style="width: 100%; height: 100vh;">
  <div class="page-content">

    <div class="mdl-grid" style='justify-content: center'>
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-layout-spacer"></div>
          <div class="mdl-cell mdl-cell--10-col">
            <div class="mdl-grid">
                <div class="demo-card-full-width mdl-card mdl-shadow--2dp" style="width: 100%">
                  <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>Email Confirmed.</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; line-height: 25px; height: 100%">

                    <a href="#">{{$donor->first_name}}</a>, <br><br>
                    Your profile is now live on {{$_ENV['APP_NAME']}}.
                    <br><br>
                    You should recieve an email that will contain a link allowing you to edit your profile. Dont lose this link!
                    <br><br>
                    Didnt get the email? Check your spam or junk folder. Otherwise, Email me @ <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}?subject=Email Confirmation Not Recieved"> {{$_ENV['SUPPORT_EMAIL']}}</a>

                    <br><br><br>
                    <a href='/' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                      Back to Home
                    </a>
                    <a href='/donor/{{$donor->id}}/details' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                      See Profile
                    </a>

                </div>
            </div>

          </div>
        <div class="mdl-layout-spacer"></div>
    </div>
  </div>
</main>
@endsection
