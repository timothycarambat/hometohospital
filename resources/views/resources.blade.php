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
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>More Resources</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; line-height: 25px; height: 100%">
                    <p>Here are some additional places to find PPE or COVID-19 releated information. I am not affiliated with these other pages and are purely for infomational purposes.</p>
                    <h4 class="mdl-card__title-text"><b style='color: #7c4dff;'>PPE</b></h4>
                    <ul>
                      <li><a href='https://www.ppecoalition.com/'>National PPE Coalition</a></li>
                      <li><a href='https://www.projectn95.org/'>Project N95</a></li>
                      <li><a href='https://getusppe.org'>Get Us PPE</a>
                      <li><a href='https://ppelink.wordpress.com'>PPE Link</a>
                      <li><a href='https://masksfordocs.com'>Masks For Docs</a>
                      <li><a href='https://operationmasks.org'>Operation Masks</a>
                      <li><a href='https://findthemasks.com'>Find The Masks</a>
                    </ul>

                    <h4 class="mdl-card__title-text"><b style='color: #7c4dff;'>Infomation Dashboards</b></h4>
                    <ul>
                      <li><a href='https://ncov2019.live'>COVID-19 Dashboard</a></li>
                    </ul>
                </div>
            </div>

          </div>
        <div class="mdl-layout-spacer"></div>
    </div>
  </div>
</main>
@endsection
