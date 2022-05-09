// ============== Profile Tab Navigation Script ==============
const tabs = document.querySelectorAll('[data-current]');
const subPage = document.querySelectorAll('.subPage');
const aside_subsection = document.querySelector('#aside_subsection');
document.addEventListener('DOMContentLoaded', function () {

    hideAll();
    subPage[0].style.display = 'flex';


    tabs.forEach(element => {
        element.addEventListener('click', (e) => {
            disActiveAll();
            e.target.classList.add('is-active')
            let current = e.target.dataset.current;
            if (current == 'tab-A' || current == 'tab-B') {
                aside_subsection.style.display = 'flex'
            }
            else {
                aside_subsection.style.display = 'none'
            }
            hideAll();
            document.getElementById(current).style.display = 'flex';
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

function disActiveAll() {
    tabs.forEach(e => {
        console.log(e);
        e.classList.remove('is-active');
    });
}