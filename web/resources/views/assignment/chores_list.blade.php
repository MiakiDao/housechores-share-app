@foreach ($chores as $chore)
  <button class="flex items-center gap-2 border p-2 rounded"
          data-chore-id="{{ $chore->id }}"
          data-name="{{ $chore->name }}"
          data-price-cents="{{ $chore->price_cents }}"
          data-img-path="{{ asset($chore->img_path) }}">
    <!-- 画像を表示 -->
    <img src="{{ asset($chore->img_path) }}"
         alt="{{ $chore->name }}"
         class="w-8 h-8 object-contain">
    <!-- テキスト -->
    <span>{{ $chore->name }}</span>
    <span>{{ $chore->price_cents / 100 }}円</span>
  </button>
@endforeach

<!-- 確認モーダル -->
 @include('assignment.confirm_modal', ['chores' => $chores])