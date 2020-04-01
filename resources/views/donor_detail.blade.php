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
                    <h1 class="mdl-card__title-text"><b style='color: #7c4dff; font-size: 45px;'>{{$donor->first_name}} {{$donor->last_name}}</b></h1>
                  </div>
                  <div class="mdl-card__supporting-text" style="font-size: 20px; height: 100%">
                    <p style="font-size: 18px;">
                      <b style='color: #7c4dff'>Location:</b> {{$donor->location}}
                      <br><br>
                      @if($donor->bio)
                        <b style='color: #7c4dff'>Biography:</b> {{$donor->bio}}
                        <br><br>
                      @endif
                      <a id='donor{{$donor->id}}' onclick="getEmail({{$donor->id}})" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        <i class="material-icons">mail</i>
                        Get Contact Information
                      </a>

                      @php
                        $create_items = $donor->create_items();
                        $donate_items = $donor->donate_items();
                      @endphp
                      <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col">
                          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="mdl-data-table__cell--non-numeric table-header">Items I Can Donate</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ( count($create_items) > 0 )
                                @foreach($create_items as $key => $item)
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                      <span class="mdl-chip success">
                                          <span class="mdl-chip__text">{{$item->item->name}}</span>
                                      </span>
                                    </td>
                                  </tr>
                                @endforeach
                              @else
                                <tr>
                                  <td class="mdl-data-table__cell--non-numeric">
                                    <span class="mdl-chip">
                                        <span class="mdl-chip__text">Nothing Found...</span>
                                    </span>
                                  </td>
                                </tr>
                              @endif
                            </tbody>
                          </table>
                        </div>

                        <div class="mdl-cell mdl-cell--6-col">
                          <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="mdl-data-table__cell--non-numeric table-header">Items I Can Make</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ( count($donate_items) > 0 )
                                @foreach($donate_items as $key => $item)
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                      <span class="mdl-chip success">
                                          <span class="mdl-chip__text">{{$item->item->name}}</span>
                                      </span>
                                    </td>
                                  </tr>
                                @endforeach
                              @else
                                <tr>
                                  <td class="mdl-data-table__cell--non-numeric">
                                    <span class="mdl-chip ">
                                      <span class="mdl-chip__text">Nothing Found...</span>
                                    </span>
                                  </td>
                                </tr>
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </p>
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
