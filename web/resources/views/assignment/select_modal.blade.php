<div id="selectModal" class="hidden fixed inset-0 bg-black/70 overflow-y-auto z-50">
    <div class="relative bg-white mx-auto my-10 px-10 py-10 w-4/5 rounded-lg border ">
        <span class="absolute top-0 right-0 p-4">
            <button id="closeChoresBtn" class="text-black">閉じる</button>
        </span>
        <div class="text-center font-bold text-3xl my-10">家事を選択</div>
        <div class="rounded-md border p-4">
            <!-- <div class="font-bold text-3xl mb-4">よくやる家事</div> -->
            <div class="grid grid-cols-2 gap-3 ">
                <!-- chores_list.blade.phpでデータベースから持ってくる -->
                @include('assignment.chores_list', ['chores' => $chores])
            </div>
        </div>
    </div>
</div>
