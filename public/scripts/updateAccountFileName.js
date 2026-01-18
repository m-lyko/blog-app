const input = document.getElementById('avatar');
const out = document.getElementById('file-name');

if (input && out) {
  input.addEventListener('change', () => {
    const hasFile = input.files && input.files.length;

    out.textContent = hasFile ? input.files[0].name : 'Nie wybrano pliku';
    out.style.color = hasFile ? '#5A716A' : '';
    out.style.fontWeight = hasFile ? '600' : ''; 
  });
}