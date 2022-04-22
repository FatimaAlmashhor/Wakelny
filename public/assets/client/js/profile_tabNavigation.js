// ============== Profile Tab Navigation Script ==============
const tabs = document.querySelectorAll('[data-current]');
const subPage = document.querySelectorAll('.subPage');
document.addEventListener('DOMContentLoaded', function () {

    hideAll();
    subPage[0].style.display = 'block';


    tabs.forEach(element => {
        element.addEventListener('click', (e) => {
            tabs.forEach(e => {
                console.log(e);
                return e.classList.remove('is_active');
            });
            // e.target.classList.add('is-active')
            let current = e.target.dataset.current;

            hideAll();
            document.getElementById(current).style.display = 'block';
        })
    })
    // for (let i = 0; i < tabs.length; i++) {
    //     tabs[i].addEventListener('click', tabSwitch, false);
    // }

    // function tabSwitch() {

    //     document.getElementsByClassName('is-active')[0].classList.remove('is-active');
    //     this.classList.add('is-active');

    //     document.getElementsByClassName('is-show')[0].classList.remove('is-show');

    //     const arrayTabs = Array.prototype.slice.call(tabs);
    //     const index = arrayTabs.indexOf(this);
    //     document.gtabetElementsByClassName('panel')[index].classList.add('is-show');

    // };

}, false);

function hideAll() {
    subPage.forEach(element => {
        element.style.display = 'none';
    })
}