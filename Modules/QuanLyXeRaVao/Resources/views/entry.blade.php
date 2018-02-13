<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <!--
      manifest.json provides metadata used when your web app is added to the
      homescreen on Android. See https://developers.google.com/web/fundamentals/engage-and-retain/web-app-manifest/
    -->
    <!--
      Notice the use of %PUBLIC_URL% in the tags above.
      It will be replaced with the URL of the `public` folder during the build.
      Only files inside the `public` folder can be referenced from the HTML.

      Unlike "/favicon.ico" or "favicon.ico", "%PUBLIC_URL%/favicon.ico" will
      work correctly both with client-side routing and a non-root public URL.
      Learn how to configure a non-root public URL by running `npm run build`.
    -->
    <title>React App</title>
    <link rel="stylesheet" href="/css/libs/bootstrap.min.css">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
    <style media="screen">
      #map-canvas{
        width: 100vw;
        height:100vh;
      }
      ._tt{
        width: 20px;
        height:20px;
        background:red;
        border-radius: 50%;
      }
      .menu-master,.menu-item{
        cursor: pointer;
        position: fixed;
        bottom: 50px;
        right: 50px;
      }

      .btn-circle{
          border-radius: 50%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          width: 49px;
          height:49px;
          background: rgb(42, 201, 170);
      }

      .menu-item{
        z-index: 9;
        transition: all 0.3s ease;
      }
      ._label{
        position: absolute;
        top:50%;
        left: 50%;
        color: #fff;
        font-weight: bold;
        transform: translate(-50%,-50%);
      }
      .item-title{
        position: absolute;
        right :110%;
        white-space: nowrap;
        top:50%;
        transform: translate(0,-50%);
        background: rgba(0,0,0,0.8);
        padding: 3px 5px;
        color: rgba(255,255,255,0.8);
        font-size: 12px;
        border-radius: 15px;
      }
      .menu-master{
        border-radius: 50%;
        width: 50px;
        height:50px;
        background: rgb(42, 201, 170);
        z-index: 10;
      }

      .mornitor-master-wrapper{
        z-index: 8;
        position: fixed;
        left: 0;
        bottom: 0;
        width: 85vw;
        height: 50vh;
        background: rgba(53, 53, 53, 0.95);
        -webkit-font-smoothing:antialiased;
        font-family: Ubuntu;
      	font-style: normal;
      	font-variant: normal;
      	font-weight: 500;
      	line-height: 26.4px;
      }

      .monitor-content{
        color:#fff;
      }

      .mornitor-master-wrapper::-webkit-scrollbar-track
      {
      	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      	border-radius: 10px;
      	background-color: #F5F5F5;
      }

      .mornitor-master-wrapper::-webkit-scrollbar
      {
      	width: 10px;
      	background-color: #F5F5F5;
      }

      .mornitor-master-wrapper::-webkit-scrollbar-thumb
      {
      	border-radius: 10px;
      	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      	background-color: #555;
      }
      tbody {
          display:block;
          height:40vh;
          overflow:auto;
          font-size: 12px;
          cursor: pointer;
      }
      tbody::-webkit-scrollbar {
      display: none;
      }
      thead, tbody tr {
          font-size: 13px;
          display:table;
          width:100%;
          table-layout:fixed;/* even columns width , fix width of table too*/
      }
      /* thead {
          width: calc( 100% - 1em );
      } */
      table {
          width:400px;
      }

      table td{
        padding:0.5rem!important;
        text-shadow: none;
      }

      .switch-input {
        display: none;
      }
      .switch-label {
        position: relative;
        display: inline-block;
        min-width: 112px;
        cursor: pointer;
        font-weight: 500;
        text-align: left;
        margin: 15px;
      }
      .switch-label:before, .switch-label:after {
        content: "";
        position: absolute;
        margin: 0;
        outline: 0;
        top: 50%;
        -ms-transform: translate(0, -50%);
        -webkit-transform: translate(0, -50%);
        transform: translate(0, -50%);
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
      }
      .switch-label:before {
        left: 1px;
        width: 34px;
        height: 14px;
        background-color: #9E9E9E;
        border-radius: 8px;
      }
      .switch-label:after {
        left: 0;
        width: 20px;
        height: 20px;
        background-color: #FAFAFA;
        border-radius: 50%;
        box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.14), 0 2px 2px 0 rgba(0, 0, 0, 0.098), 0 1px 5px 0 rgba(0, 0, 0, 0.084);
      }
      .switch-label .toggle--on {
        display: none;
      }
      .switch-label .toggle--off {
        display: inline-block;
      }
      .switch-input:checked + .switch-label:before {
        background-color: #74cab9;
      }
      .switch-input:checked + .switch-label:after {
        background-color: rgb(42, 201, 170);
        -ms-transform: translate(80%, -50%);
        -webkit-transform: translate(80%, -50%);
        transform: translate(80%, -50%);
      }
      .switch-input:checked + .switch-label .toggle--on {
        display: inline-block;
      }
      .switch-input:checked + .switch-label .toggle--off {
        display: none;
      }


    </style>
  </head>
  <body>
    <noscript>
      You need to enable JavaScript to run this app.
    </noscript>
    <div id="react-root"></div>
    <!--
      This HTML file is a template.
      If you open it directly in the browser, you will see an empty page.

      You can add webfonts, meta tags, or analytics to this file.
      The build step will place the bundled scripts into the <body> tag.

      To begin the development, run `npm start` or `yarn start`.
      To create a production bundle, use `npm run build` or `yarn build`.
    -->
    <script
    src="/js/libs/jquery-3.3.1.slim.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTlqW-_ymhhj0I6Ez1Jq_8Z87a_A9ZaCU"></script>
    <script src="http://113.160.215.214:3000/socket.io/socket.io.js"></script>
    <script src="/modules/quanlyxeravao/qlxrv-master.js"></script>
  </body>
</html>
