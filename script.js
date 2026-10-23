const filters = document.querySelectorAll('.filter');
const cards = document.querySelectorAll('.card');
const toast = document.querySelector('#toast');
let toastTimer;

filters.forEach(button => button.addEventListener('click', () => {
  const group = button.dataset.filter;
  filters.forEach(item => {
    const active = item === button;
    item.classList.toggle('is-active', active);
    item.setAttribute('aria-pressed', String(active));
  });
  cards.forEach(card => { card.hidden = group !== 'all' && card.dataset.group !== group; });
}));

document.querySelectorAll('.copy').forEach(button => button.addEventListener('click', async () => {
  const html = `<div class="motion-button-wrap"><a class="motion-button ${button.dataset.class}" href="https://example.com/"><span class="button-label">자세히 보기</span><span class="button-icon" aria-hidden="true">↗</span></a></div>`;
  try {
    await navigator.clipboard.writeText(html);
    toast.textContent = 'HTML을 복사했습니다. 주소와 문구를 바꾸세요.';
  } catch {
    toast.textContent = '복사가 차단되었습니다. README의 코드를 사용하세요.';
  }
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}));
