@extends('layouts.common')
@section('content')

<!-- 家事選択遷移ボタン -->
<button id="selectChoresBtn" class="block mx-auto mb-10 w-48 h-16 text-xl px-4 py-2 bg-blue-500 text-white rounded shadow-lg hover:shadow-lg hover:bg-blue-600 transition">家事を選択</button>
<!-- 家事選択モーダル画面呼び出し -->
@include('assignment.select_modal', ['chores' => $chores])

<!-- 家事一覧 -->
<h1 class="text-3xl font-bold text-center">今日の家事</h1>
<ul id="today-chores" class="grid grid-cols-5 gap-2 mt-4">
</ul>

<!-- 家事指名モーダル画面呼び出し -->
@include('assignment.assign_modal', ['members' => $members])

<!-- ランダムボタン -->
<button id="assignRandomChoresBtn" class="mt-4 px-4 py-2 bg-green-500 text-white rounded">ランダム</button>

<!-- メンバーカード一覧 -->
<div class="grid grid-cols-2 gap-4 mt-10">
    @foreach ($members as $member)
    <div class="flex p-4 border rounded shadow">
        <div>
            <h2 class="text-md font-bold">{{ $member->name }}</h2>
            <span id="balance-{{ $member->$id }}" data-balance="{{ $member->balance_cents }}">所持金: {{ $member->balance_cents }}円</span>
        </div>
        <ul id="member-chores-{{ $member->id }}"></ul>
    </div>
    @endforeach
</div>

@endsection