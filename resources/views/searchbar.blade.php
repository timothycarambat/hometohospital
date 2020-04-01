<div class="mdl-grid">
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-layout-spacer"></div>
    <div class="mdl-cell mdl-cell--6-col">
      <div class="search-card mdl-card mdl-shadow--2dp">
        <form class="" action="/search" method="get">

          <div class="mdl-textfield mdl-js-textfield">
            <i class="material-icons">search</i>
              <input
                    class="mdl-textfield__input"
                    type="text" name="lookup"
                    placeholder="Look For Donors By Address, City, State, or Country and press Enter"
                    autocomplete="off"
                    value="{{request()->lookup}}"
              />
          </div>
        </form>

      </div>
      <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--8-col">
          <a  href='/donor/new' style='font-size: 25px' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Become a Donor
          </a>
        </div>

      </div>
      <br>

    </div>
    <div class="mdl-layout-spacer"></div>

</div>
