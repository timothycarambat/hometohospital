@extends('layout')

@section('main_content')
  @include('searchbar')
  <main class="mdl-layout__content">
    <div class="page-content">

      <div class="mdl-grid" style='justify-content: center'>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-layout-spacer"></div>
            <div class="mdl-cell mdl-cell--10-col">
              @if ($donor_count > 0)
                @include('donor_table')
              @else
              <h3>There are <a href="" style="cursor: text">No</a> Donors for  "<a href="" style="cursor: text">{{request()->lookup}}</a>"<h3>
                <div class="mdl-grid">
                  <div class="demo-card-full-width mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                      <h2 class="mdl-card__title-text"><b class="donor-title">Oh No...</b></h2>
                    </div>
                    <div class="mdl-card__supporting-text" style="font-size: 20px;">
                      It looks like no one has signed up for this area to be a Donor. <br><br>
                      <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Be the First Donor For "{{request()->lookup}}"
                      </a>
                      <br><br>

                      Here are some tips to find a donor nearby if you find no one it in your immediate area:
                      <ul style="font-size: 18px">
                        <li>Make sure you typed in everything correctly. At a <b class='donor-title'>minumum</b> you need to have at least a city and a state. Try fully spelling out the state. (eg. New Orleans, Louisiana)</li>
                        <li>Try Searching in nearby cities.</li>
                        <li>We currently have <b class='donor-title'>{{number_format(\App\Donor::where('confirmed', true)->count())}} Donors</b> - your area could just have no donors.</li>
                        <li>
                          Go to our <a href="/locations">Locations Page</a> to see each location that has donors.
                        </li>
                        <li>Need Help? <a href='mailto:{{$_ENV['SUPPORT_EMAIL']}}'>Contact Support</a></li>
                      </ul>
                    </div>
                    <div class="mdl-card__menu">
                    </div>
                  </div>
                  <p style='color: #dedbdb'>Results: {{$city}}, {{$soc}}</p>
                </div>
              @endif

            </div>
          <div class="mdl-layout-spacer"></div>
      </div>
    </div>
  </main>


@endsection
