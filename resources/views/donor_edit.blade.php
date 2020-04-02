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
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>Edit Donor: {{$donor->first_name}} {{$donor->last_name}}</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; height: 100%">
                      <p style="font-size: 18px">
                        <b style='color: #7c4dff'>Email:</b> {{$donor->email}}
                        <br>
                        <b style='color: #7c4dff'>Location:</b> {{$donor->location}}
                      </p>

                      <div class="mdl-grid">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input">
                          <textarea
                            class="mdl-textfield__input"
                            type="text"
                            name='bio'
                            maxlength="200"
                            >{{$donor->bio}}</textarea>
                          <label class="mdl-textfield__label">About You (200 character)</label>
                        </div>
                      </div>
                      <p><b>Tip:</b>Just tell us about yourself and why you're doing what you are doing to help!</p>

                      @php
                        $create_items = $donor->create_items()->pluck('item_id')->toArray();
                        $donate_items = $donor->donate_items()->pluck('item_id')->toArray();
                      @endphp

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
                                  <tr data-item-id="{{$item->id}}" data-item-type="create" class="{{in_array($item->id, $create_items) ? 'is-selected' : ''}}">
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
                                  <tr data-item-id="{{$item->id}}" data-item-type="supply" class="{{in_array($item->id, $donate_items) ? 'is-selected' : ''}}">
                                    <td class="mdl-data-table__cell--non-numeric">
                                        {{$item->name}}
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>

                      <div hidden id='loader' class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                      <button onclick='updateDonor({{$donor->id}})' id='submit' class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        Update Information
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
