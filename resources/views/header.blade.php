<!-- The drawer is always open in large screens. The header is always shown,
  even in small screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">

      <div class="mdl-layout-spacer"></div>
      <script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script><script type='text/javascript'>kofiwidget2.init('Buy me a Coffee!', '#7c4dff', 'F1F71KD07');kofiwidget2.draw();</script>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">{{$_ENV['APP_NAME']}}</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link {{Request::is('/') ? 'active ' : ''}}" href="/">
        <i class="material-icons">home</i>
        Home
      </a>
      <a class="mdl-navigation__link {{Request::is('donor/new') ? 'active ' : ''}}" href="/donor/new">
        <i class="material-icons">healing</i>
        Become a Donor
      </a>
      <a class="mdl-navigation__link {{Request::is('donors') || Request::is('search') || Request::is('donor/*/details') ? 'active ' : ''}}" href="/donors">
        <i class="material-icons">people</i>
        Donors List
      </a>
      <a class="mdl-navigation__link {{Request::is('locations') ? 'active ' : ''}}" href="/locations">
        <i class="material-icons">location_city</i>
        Location List
      </a>
      <a class="mdl-navigation__link {{Request::is('about') ? 'active ' : ''}}" href="/about">
        <i class="material-icons">info_outline</i>
        About
      </a>
      <a class="mdl-navigation__link" href="mailto:{{$_ENV['SUPPORT_EMAIL']}}">
        <i class="material-icons">mail_outline</i> Contact Me
      </a>
      <a class="mdl-navigation__link" href="https://ko-fi.com/F1F71KD07">
        <img height='36' style='border:0px;height:36px;' src='/img/kofi.png' border='0' alt='Buy Me a Coffee at ko-fi.com' />
      </a>

    </nav>
  </div>
</div>
