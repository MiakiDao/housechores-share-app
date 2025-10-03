// 今日の家事リスト一覧に表示する要素
const todayChoresList = document.getElementById('today-chores');

// 指名モーダル関連の要素を取得
const assignModal = document.getElementById('assignModal');
const assignCloseBtn = document.getElementById('closeAssignBtn');
const assignMemberBtns = document.querySelectorAll('[data-member-id]');

// モーダル関連の要素を取得
const openBtn = document.getElementById('selectChoresBtn');
const closeBtn = document.getElementById('closeChoresBtn');
const selectModal = document.getElementById('selectModal');
const choreBtns = document.querySelectorAll('[data-chore-id]');
const confirmModal = document.getElementById('confirmModal');
const confirmAddBtn = document.getElementById('confirmAddBtn');
const confirmCloseBtn = document.getElementById('closeConfirmBtn');

// 今日の家事（いつもやる家事）に選択された家事を格納する変数
let selectedChore = null;

// 追加された家事IDを格納するセット
const addedChoreIds = new Set();

// 割り当てる家事を保持して各メンバーのカードに表示させるための変数
let assigningChore = null;

// 割り当てられた家事IDを格納するセット
const assignedChoreIds = new Set();

let pendingChoreEl = null; // li 要素を保持
//===========ロジック部分============//

//===========セレクトモーダル関連の処理============//
// セレクトモーダルを表示・非表示
openBtn.onclick = function() {
    selectModal.classList.remove('hidden');
}
closeBtn.onclick = function() {
    selectModal.classList.add('hidden');
}

// 家事ボタンがクリックされたときの処理
choreBtns.forEach(function(choreBtn) {
    choreBtn.addEventListener('click', () => {
        confirmModal.classList.remove('hidden'); //　確認モーダルを表示
        selectedChore = choreBtn; // クリックされた家事を保存
    });
});

// 確認モーダル: 追加
confirmAddBtn.addEventListener('click', () => {

  // ID/名前を取得(各家事アイテムのdata属性に設定してある)
  const choreId = selectedChore.dataset.choreId;
  const choreName = selectedChore.dataset.name;
  const chorePriceCent = Number(selectedChore.dataset.priceCents);
  const choreImgPath = selectedChore.dataset.imgPath;

  // 重複チェック（既に追加済みなら閉じるだけ）
  if (addedChoreIds.has(choreId)) {
    confirmModal.classList.add('hidden');
    return;
  }

// 「今日の家事」に追加するliの処理
const selectedChoreList = document.createElement('li');
selectedChoreList.classList.add('border', 'p-2', 'my-1', 'rounded', 'flex', 'items-center', 'justify-center', 'gap-2');
// liの中身を作成↓↓
// 画像とテキストをまとめるラッパー（縦並び）
const wrapper = document.createElement('div');
wrapper.classList.add('flex', 'flex-col');

// 画像タグ
const img = document.createElement('img');
img.src = choreImgPath;
img.alt = choreName;
img.classList.add('w-20', 'h-20', 'object-contain');

// 価格タグ
const priceSpan = document.createElement('span');
const priceYen = chorePriceCent / 100;
priceSpan.textContent = `${priceYen.toLocaleString()}円`;
priceSpan.classList.add('text-lg', 'font-bold', 'text-center', 'text-gray-500');

// 名前タグ
const span = document.createElement('span');
span.textContent = choreName;
span.classList.add('text-center', 'font-bold', 'text-lg');

  // 割り当て遷移ボタン生成
  const openAssignBtn = document.createElement('button');
  openAssignBtn.textContent = '指名';
  openAssignBtn.classList.add('px-2','py-1','bg-red-500','text-white','rounded');
  selectedChoreList.appendChild(openAssignBtn);

  // Wrapperに画像とテキストと指名ボタンを追加
  wrapper.appendChild(img);
  wrapper.appendChild(span);
  wrapper.appendChild(priceSpan);
  wrapper.appendChild(openAssignBtn);

  // liにwrapperを追加
  selectedChoreList.appendChild(wrapper);

  // ulにliを追加
todayChoresList.appendChild(selectedChoreList);

  // 指名ボタンを押すと指名モーダルを表示
  openAssignBtn.onclick = function() {
    assignModal.classList.remove('hidden');

    assigningChore = {
        name: choreName,
        imgPath: choreImgPath,
        priceCents: chorePriceCent
    };
    pendingChoreEl = selectedChoreList; // li 要素を保持
  }

  // 追加済みに登録
  addedChoreIds.add(choreId);

  // ボタンを無効化(クリックできないようにする)
  selectedChore.classList.add('opacity-50', 'pointer-events-none', 'cursor-not-allowed');
  selectedChore.setAttribute('aria-disabled', 'true'); //セマンティクス（機械にも「このボタンは無効ですよ」と伝えられる）

  // 最後に状態リセット＆クローズ
  selectedChore = null;
  confirmModal.classList.add('hidden');
  selectModal.classList.add('hidden');
});

// 確認モーダル: キャンセル
confirmCloseBtn.addEventListener('click', () => {
        confirmModal.classList.add('hidden');
        selectedChore = null;
});

//===========指名モーダル関連の処理============//
// 指名モーダルを表示・非表示
assignCloseBtn.onclick = function() {
    assignModal.classList.add('hidden');
}

function addChorePrice(memberId, price) {
  const balanceEl = document.getElementById(`balance-${memberId}`);

  //　datasetから元の値を取得（明示的に１０進数）
  let currentBalance = parseInt(balanceEl.dataset.balance, 10);

  currentBalance += price;

  // dataset と 表示を更新
  balanceEl.dataset.balance = currentBalance;
  balanceEl.textContent = `所持金: ${(currentBalance / 100).toLocaleString()}円`;
}

assignMemberBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    if (!assigningChore || !pendingChoreEl) return;

    // 受け皿を作成して、追加
    const memberId = btn.dataset.memberId;
    const memberChoresList = document.getElementById(`member-chores-${btn.dataset.memberId}`);
    memberChoresList.classList.add('flex','flex-wrap','gap-2');

    const li = document.createElement('li');
    li.classList.add('flex','flex-col','items-center');

    const img = document.createElement('img');
    img.src = assigningChore.imgPath;
    img.alt = assigningChore.name;
    img.classList.add('w-14','h-14','object-contain');

    li.appendChild(img);
    memberChoresList.appendChild(li);

    const chorePrice = assigningChore.priceCents;
    //li要素を押下したときのイベント（chorePriceCentをメンバーのbalanceCentに加算）
    li.addEventListener('click', () => {
      addChorePrice(memberId, chorePrice);
      li.classList.add('opacity-50');
    }, { once: true });

    // 元の「今日の家事」の li を非表示
    pendingChoreEl.classList.add('hidden', 'opacity-50');

    // 後処理
    assignModal.classList.add('hidden');
    assigningChore = null;
  });
});