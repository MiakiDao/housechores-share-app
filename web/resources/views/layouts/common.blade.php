<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家事分担アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
                                            <!-- 共通部分 -->
  <div class="min-h-screen flex">

    <!-- サイドバー -->
    @include('parts.sidebar')
    <!-- 右側（ヘッダー + メイン） -->
    <div class="flex-1 flex flex-col">
    <!-- ヘッダー -->
     @include('parts.header')

                                            <!-- ここからページごとのUI -->
     
    <!-- メイン -->
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>
  </div>
  </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- @stack('scripts') -->
</body>
</html>