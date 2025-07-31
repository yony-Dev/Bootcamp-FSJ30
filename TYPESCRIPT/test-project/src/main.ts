import './style.css'

document.querySelector<HTMLDivElement>('#app')!.innerHTML = `
  <div>
    <h1>Holiwis</h1>
  </div>
  <button id="btnMagia">Magia!</button>
`


let btnDOM = document.getElementById('btnMagia') as HTMLButtonElement;

console.log(btnDOM);

btnDOM.addEventListener('click', () => {
  alert('Chauchis');
});
