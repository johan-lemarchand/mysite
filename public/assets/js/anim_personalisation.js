btn = document.getElementById('anim_personalisation');

const animation_perso = bodymovin.loadAnimation({
    container: document.getElementById('anim_personalisation'),
    renderer: 'svg',
    loop: false,
    autoplay: false,
    path: 'data_personnalisation.json'
});
window.onscroll = function(){
    animation_perso.play();
}
