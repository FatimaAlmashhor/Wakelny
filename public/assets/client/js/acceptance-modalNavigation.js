// ============== Modal Tab Navigation Script ==============
const tabs = document.querySelectorAll('[data-current]');
const supSection = document.querySelectorAll('.supSection');
const aside_subsection = document.querySelector('#aside_subsection');
document.addEventListener('DOMContentLoaded', function () {

    hideAll();
    supSection[0].style.display = 'block';


    tabs.forEach(element => {
        element.addEventListener('click', (e) => {
            disActiveAll();
            e.target.classList.add('is-active')
            let current = e.target.dataset.current;
            if (current == 'tab-A' || current == 'tab-B') {
                aside_subsection.style.display = 'block'
            }
            else {
                aside_subsection.style.display = 'none'
            }
            hideAll();
            document.getElementById(current).style.display = 'block';
        })
    })

}, false);

function hideAll() {
    supSection.forEach(element => {
        element.style.display = 'none';
    })
}

function disActiveAll() {
    tabs.forEach(e => {
        console.log(e);
        e.classList.remove('is-active');
    });
}

// ==================================================================


// ========= Prevent arrow keys from changing values in a number input =========

document.getElementById('credit_NO').addEventListener('keydown', function(e) {
    if (e.which === 38 || e.which === 40) {
        e.preventDefault();
    }
});