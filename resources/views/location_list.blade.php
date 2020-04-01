<h3> There Are <a href="" style="cursor: text">{{number_format($location_count)}}</a> Locations<h3>

  <div class="mdl-grid">
    @foreach($locations as $key => $locations_by_key)
      <div class="demo-card-full-width mdl-card mdl-shadow--2dp" style="margin: 10px">
        <div class="mdl-card__title">
          <h2 class="mdl-card__title-text"><b class="donor-title">{{$key}}</b></h2>
        </div>
        <div class="mdl-card__supporting-text" style="font-size: 20px;">

          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%; font-size: 20px;">
            <thead >
              <tr>
                <th class="mdl-data-table__cell--non-numeric" style="font-size: 20px;">Location Name</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($locations_by_key as $key => $location_array)
                @foreach($location_array as $location)
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{$location}}</td>
                    <td>
                      <a href="/search?lookup={{$location}}" style="font-weight: bold">
                        See Donors For Location
                      </a>
                    </td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>

        </div>
        <div class="mdl-card__menu">
        </div>
      </div>

    @endforeach
  </div>
