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
                  <div class="mdl-card__supporting-text" style="font-size: 20px; height: 100%">

                      <div class="mdl-grid">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                          <input
                            class="mdl-textfield__input"
                            type="text"
                            pattern="[A-Z,a-z, ]*"
                            data-required='true'
                            name='first_name'
                            onerror="Please enter a valid first name. A-Z only."
                            >
                          <label class="mdl-textfield__label" name="first_name">First Name<sup>*</sup></label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                          <input
                          class="mdl-textfield__input"
                          type="text"
                          pattern="[A-Z,a-z, ]*"
                          data-required='true'
                          name='last_name'
                          onerror="Please enter a valid last name. A-Z only."
                          >
                          <label class="mdl-textfield__label" name="last_name">Last Name<sup>*</sup></label>
                        </div>
                      </div>

                      <div class="mdl-grid">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                          <input
                            class="mdl-textfield__input"
                            type="email"
                            data-required='true'
                            name='email'
                            onerror="Please enter a valid Email"
                            >
                          <label class="mdl-textfield__label">Email<sup>*</sup></label>
                        </div>
                      </div>

                      <div class="mdl-grid">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                          <textarea
                            class="mdl-textfield__input"
                            type="text"
                            name='bio'
                            maxlength="200"
                            ></textarea>
                          <label class="mdl-textfield__label">About You (200 character)</label>
                        </div>
                      </div>
                      <p><b>Tip:</b>Just tell us about yourself and why you're doing what you are doing to help!</p>

                      <div class="mdl-grid" >
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input" style="width:50%">
                          <input
                            class="mdl-textfield__input"
                            type="text"
                            data-required='true'
                            name='location'
                            onerror="Please enter a valid Email"
                            >
                          <label class="mdl-textfield__label">Location<sup>*</sup> (eg. New Orleans, Louisiana or London, England)</label>
                        </div>
                        <p><b>Note:</b> Entering your City and then State or country will work best. We only retain the City and State/Country on completion. No other data is retained.</p>
                      </div>

                      <div class="mdl-grid" >
                        <div class="mdl-cell mdl-cell--6-col">
                          <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="mdl-data-table__cell--non-numeric table-header">Items I Can Make</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Item::get() as $key => $item)
                                  <tr data-item-id="{{$item->id}}" data-item-type="create">
                                    <td class="mdl-data-table__cell--non-numeric">
                                        {{$item->name}}
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>

                        <div class="mdl-cell mdl-cell--6-col">
                          <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="mdl-data-table__cell--non-numeric table-header">Items I Have That I Can Donate</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Item::get() as $key => $item)
                                  <tr data-item-id="{{$item->id}}" data-item-type="supply">
                                    <td class="mdl-data-table__cell--non-numeric">
                                        {{$item->name}}
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>

                      <div hidden id='loader' class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                      <button onclick='submitDonor()' id='submit' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        SUBMIT Donor
                      </button>
                  </div>
                  <div class="mdl-card__menu">
                  </div>
                </div>
            </div>

          </div>
        <div class="mdl-layout-spacer"></div>
    </div>
  </div>
</main>
@endsection
