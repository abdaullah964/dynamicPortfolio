const layer_icon = document.querySelector('#nav-bar .nav-bar .nav-list .layer');
const nav_list = document.querySelector('#nav-bar .nav-bar .nav-list');

layer_icon.addEventListener('click', () => {
	nav_list.classList.toggle('open');
	layer_icon.classList.toggle('active');
});
