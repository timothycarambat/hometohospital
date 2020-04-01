<h3> There Are <a href="" style="cursor: text">{{$donor_count}}</a> Donors in <a href="" style="cursor: text">{{$city}}, {{$soc}}</a><h3>

  <div class="mdl-grid">
    @foreach($donors as $donor)
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
            @endphp

            <div class="mdl-grid">
              <div class="mdl-cell donation-cell">
                <b class="donor-list-header">Can Create</b>
                <br>
                <!-- // show each item they are good to create -->
                @if ( count($create_items) > 0 )
                  @for($i = 0; $i <= 2; $i++)
                    {{$create_items[$i]->item->name}}
                    <i class="material-icons donor-check">check_circle</i>
                    <br>
                  @endfor

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
                <!-- // show each item they are good to create -->
                @if ( count($donate_items) > 0 )
                  @for($i = 0; $i <= 2; $i++)
                    {{$donate_items[$i]->item->name}}
                    <i class="material-icons donor-check">check_circle</i>
                    <br>
                  @endfor

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

            <a herf='/donor/{{$donor->id}}/details' class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
              More
              <i class="material-icons">launch</i>
            </a>
          </div>
          <div class="mdl-card__menu">
            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
              <i class="material-icons">share</i>
            </button>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  {{$donors->links()}}
