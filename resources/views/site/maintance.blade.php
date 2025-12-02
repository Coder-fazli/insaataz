
@extends('site.layouts.app')


@push('head')
<style>
  body {
    padding-top: 0px !important
  }
  article {
    padding-top: 40px  
  }
</style>
@endpush

@section('content')
<!doctype html>
<html>
  <head>
    <title>Site Maintenance</title>
    <meta charset="utf-8"/>
    <meta name="robots" content="noindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body { text-align: center; font: 20px Helvetica, sans-serif; color: #efe8e8; }
      h1 { font-size: 50px; }
      article { display: block; text-align: left; max-width: 650px; margin: 0 auto; }
      a { color: #dc8100; text-decoration: none; }
      a:hover { color: #efe8e8; text-decoration: none; }
    </style>
  </head>
  <body bgcolor="2e2929">
    <article>
        <h1 style="font-size: 40px;">Diqqət! Texniki işlər aparıldığı üçün məhsullar səhifəmiz müvəqqəti olaraq əlçatan deyil. Qısa müddət ərzində yenidən xidmətinizdə olacağıq. Anlayışınız üçün təşəkkür edirik!</h1>
        <div>
            <p style="color: black;"> Məhsullar haqqında məlumat almaq üçün bizimlə <a href="https://orelinsaat.az/contact">əlaqə</a> saxlayın </p>
            <p style="color: black;">Və ya <a href="https://orelinsaat.az/">ana səhifəyə</a> keçid edin</p>
          
            
        </div>
       
    </article>
    <script>
      
    </script>
  </body>
</html>
@endsection