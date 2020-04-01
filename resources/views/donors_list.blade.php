<h3> There Are <a href="" style="cursor: text">{{$donor_count}}</a> Donors<h3>

  <div class="mdl-grid">
        <div class="demo-card-full-width mdl-card mdl-shadow--2dp">

          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%; font-size: 20px;">
            <thead >
              <tr>
                <th style="font-size: 20px;">Donor Name</th>
                <th style="font-size: 20px;">Location</th>
                <th style="font-size: 20px;">View</th>
              </tr>
            </thead>
            <tbody>
              @foreach($donors as $donor)
                  <tr>
                    <td class="mdl-data-table__cell--non-numeric">{{$donor->display_name()}}</td>
                    <td>
                      <a href="/search?lookup={{$donor->location}}" style="font-weight: bold">
                        {{$donor->location}}<i class="material-icons">launch</i>
                      </a>
                    </td>
                    <td>
                      <a href="/donor/{{$donor->id}}/details" style="font-weight: bold">
                        View Donor Details<i class="material-icons">launch</i>
                      </a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
