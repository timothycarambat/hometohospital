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
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>Join The Effort</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; line-height: 25px; height: 100%">

                    <a href="/">{{$_ENV['APP_NAME']}}</a> is a simple project with a big purpose.
                    <br><br>
                    Right now, there is an <a href='https://www.who.int/news-room/detail/03-03-2020-shortage-of-personal-protective-equipment-endangering-health-workers-worldwide'>extreme lack of Personal Protective Equipment(PPE)</a> across the United States and abroad.
                    This shortage puts our healthcare workers, the one on the <b>front-lines</b>, in extreme danger of contracting COVID-19.
                    <br><br>
                    This application brings people who can and do want to provide additional PPE - either by sewing and seaming the PPE themselves
                    from what is around or by donating off-the-shelf PPE to our healthcare workers.
                    <br><br>
                    If you are a healthcare worker and need PPE, or a hospital admin who requires more PPE - contact our donors for your area.
                    <br><br>
                    No Account is required to be listed. All you need is a valid email and you can begin helping to flatten the curve.
                    <br><br>
                    <a href='https://twitter.com/tcarambat'>-Tim</a>
                    <br><br>
                    Help keep the servers spinning by <a href="https://ko-fi.com/rambat">donating.</a>
                </div>
            </div>

          </div>
        <div class="mdl-layout-spacer"></div>
    </div>
  </div>
</main>
@endsection
