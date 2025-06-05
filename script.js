const modal = document.getElementById('modal');
const closeModal = document.getElementById('closeModal');
const form = document.getElementById('form-inscricao');

document.querySelectorAll('button').forEach(btn => {
  if (btn.textContent.trim() === 'Contratar') {
    btn.addEventListener('click', () => {
      const plano = btn.closest('.plano').querySelector('h2').textContent;
      document.getElementById('plano').value = plano;
      modal.style.display = 'flex';
    });
  }
});
closeModal.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = 'none';
  }
});

form.addEventListener('submit', function (e) {
  e.preventDefault();
  alert('Inscrição enviada com sucesso!');
  form.reset();
  modal.style.display = 'none';
});