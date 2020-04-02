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
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>Confirm Your Email.</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; line-height: 25px; height: 100%">
                    <a href="#">{{$donor->first_name}}</a>, <br><br>
                    Your profile is now almost live on {{$_ENV['APP_NAME']}}.
                    <br><br>
                    There will be an email sent to the email you used to signup. Once you confirm your email your profile will be live.
                    <br><br>
                    Didnt get the email? Check your spam or junk folder.
                    <br><br>
                    Otherwise, Email me @ <a href="mailto:{{$_ENV['SUPPORT_EMAIL']}}?subject=Email Confirmation Not Recieved"> {{$_ENV['SUPPORT_EMAIL']}}</a>
                </div>
            </div>

          </div>
        <div class="mdl-layout-spacer"></div>
    </div>
  </div>
</main>
@endsection
