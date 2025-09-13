<div id="assignModal" class="hidden fixed inset-0 bg-black/70 overflow-y-auto z-50">
    <div class="relative bg-white mx-auto my-10 px-10 py-10 w-4/5 rounded-lg border ">
        <span class="absolute top-0 right-0 p-4">
        <button id="closeAssignBtn" class="text-black">閉じる</button>
        </span>
        <h2 class="text-lg font-bold">家事指名</h2>
        <ul id="assignList">
        <!-- 指名するメンバーのリスト -->
        @foreach ($members as $member)
          <li class="p-2 border-b cursor-pointer hover:bg-gray-200" data-member-id="{{ $member->id }}" data-member-name="{{ $member->name }}">
            {{ $member->name }}
          </li>
        @endforeach
        </ul>
    </div>
</div>
