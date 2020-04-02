<h3> There Are <a href="" style="cursor: text">{{number_format($donor_count)}}</a> Donors in <a href="" style="cursor: text">{{$city}}, {{$soc}}</a><h3>
<div class="infinite-scroll">
  <div class="mdl-grid ">
    @foreach($donors as $key => $donor)
      <div class="mdl-cell mdl-cell-3">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{{$donor->display_name()}}</h2>
          </div>
          <div class="mdl-card__supporting-text">
            @if (!is_null($donor->bio))
              <b class="donor-list-header">About the Donor:</b> {{$donor->bio}}
              <hr />
            @endif

            @php
              $create_items = $donor->create_items();
              $donate_items = $donor->donate_items();
              $ci = 0;
              $di = 0;
            @endphp

            <div class="mdl-grid">
              <div class="mdl-cell donation-cell">
                <b class="donor-list-header">Can Create</b>
                <br>
                <!-- // show each item they are good to create. Show up to 3 -->
                @if ( count($create_items) > 0 )
                  @foreach($create_items as $item)
                    @if($ci <= 2)
                      {{$item->item->name}}
                      <i class="material-icons donor-check">check_circle</i>
                      <br>
                    @endif
                    @php $ci++; @endphp
                  @endforeach

                  <!-- // show more link if they have more to offer -->
                  @if ( count($create_items) > 3 )
                    ...More
                  @endif

                @else
                  --
                @endif
              </div>

              <div class="mdl-cell donation-cell">
                <b class="donor-list-header">Can Donate</b>
                <br>
                <!-- // show each item they are good to donate. Show up to 3 -->
                @if ( count($donate_items) > 0 )
                  @foreach($donate_items as $item)
                    @if($di <= 2)
                      {{$item->item->name}}
                      <i class="material-icons donor-check">check_circle</i>
                      <br>
                    @endif
                    @php $di++; @endphp
                  @endforeach

                  <!-- // show more link if they have more to offer -->
                  @if ( count($donate_items) > 3 )
                    ...More
                  @endif

                @else
                  --
                @endif
              </div>
            </div>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a id='donor{{$donor->id}}' onclick="getEmail({{$donor->id}})" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
              <i class="material-icons">mail</i>
              Show Contact
            </a>

            <a href='/donor/{{$donor->id}}/details' class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              More
              <i class="material-icons">launch</i>
            </a>
          </div>
          <div class="mdl-card__menu">
            <button id="menu-lower-right-{{$donor->id}}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
              <i class="material-icons">share</i>
            </button>

            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                for="menu-lower-right-{{$donor->id}}">
              <li disabled class="mdl-menu__item">Share This Donor</li>
              <a href="mailto:?Subject={{$donor->first_name}} {{$donor->last_name}} is donating on {{$_ENV['APP_NAME']}}&Body={{$donor->first_name}} {{$donor->last_name}} is donating PPE to healthcare worked to flatten the curve on {{$_ENV['APP_NAME']}}.org.">
                <li class="mdl-menu__item">
                  <img style='width: 35px;padding: 5px;border: 0;box-shadow: 0;display: inline;' src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                </li>
              </a>

              <!-- Facebook -->
              <a href="http://www.facebook.com/sharer.php?u={{$_ENV['APP_URL']}}/donor/{{$donor->id}}/details" target="_blank">
                <li class="mdl-menu__item">
                  <img style='width: 35px;padding: 5px;border: 0;box-shadow: 0;display: inline;' src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                </li>
              </a>

              <!-- LinkedIn -->
              <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{$_ENV['APP_URL']}}/donor/{{$donor->id}}/details" target="_blank">
                <li class="mdl-menu__item">
                  <img style='width: 35px;padding: 5px;border: 0;box-shadow: 0;display: inline;' src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
                </li>
              </a>

              <!-- Reddit -->
              <a href="http://reddit.com/submit?url={{$_ENV['APP_URL']}}/donor/{{$donor->id}}/details&title={{$donor->first_name}} {{$donor->last_name}} is donating on {{$_ENV['APP_NAME']}}" target="_blank">
                <li class="mdl-menu__item">
                  <img style='width: 35px;padding: 5px;border: 0;box-shadow: 0;display: inline;' src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                </li>
              </a>

              <!-- Twitter -->
              <a href="https://twitter.com/share?url={{$_ENV['APP_URL']}}/donor/{{$donor->id}}/details&text={{$donor->first_name}} {{$donor->last_name}} is donating on {{$_ENV['APP_NAME']}}&hashtags=hometohospital" target="_blank">
                <li class="mdl-menu__item">
                  <img style='width: 35px;padding: 5px;border: 0;box-shadow: 0;display: inline;' src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                </li>
              </a>

            </ul>

          </div>
        </div>
      </div>
    @endforeach
    {{$donors->appends(['lookup' => request()->lookup])->links()}}
  </div>
</div>
