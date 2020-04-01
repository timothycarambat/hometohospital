@extends('layout')

@section('main_content')
  <main class="mdl-layout__content">
    <div class="page-content">

      <div class="mdl-grid" style='justify-content: center'>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-cell--10-col">
              @if ($location_count > 0)
                @include('location_list')
              @else
              <h3>There are no locations, yet<h3>
                <div class="mdl-grid">
                  <div class="demo-card-full-width mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                      <h2 class="mdl-card__title-text"><b class="donor-title">Oh No...</b></h2>
                    </div>
                    <div class="mdl-card__supporting-text" style="font-size: 20px;">
                      It looks like there are no locations yet. <br><br>
                      <a href='/donor/new' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Be the First Donor!
                      </a>
                      <br><br>
                    </div>
                    <!-- <div class="mdl-card__actions mdl-card--border">
                      <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Get Started
                      </a>
                    </div> -->
                    <div class="mdl-card__menu">
                    </div>
                  </div>
                </div>
              @endif
            </div>
          <div class="mdl-layout-spacer"></div>
      </div>
    </div>
  </main>
@endsection
