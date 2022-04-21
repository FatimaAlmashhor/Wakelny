
// ============== Profile Tab Navigation Script ==============
const about_tab = document.getElementById('about');
const works_tab = document.getElementById('works');
const rates_tab = document.getElementById('rates');

const about_card = document.getElementById('about_content');
const rating_card = document.getElementById('rates_content');
const statistics_card = document.getElementById('statistics_content');
// const about_card = document.getElementById('about_content');


about_tab.addEventListener('click', function handleClick() {
    if (about_card.style.display === 'none') {
        about_card.style.display = 'block';
        rating_card.style.display = 'none';
    } else {
        about_card.style.display = 'none';
        rating_card.style.display = 'blcok';
    }
});

rates_tab.addEventListener('click', function handleClick() {
    if (rating_card.style.display === 'none') {
        rating_card.style.display = 'block';
        about_card.style.display = 'none';
    } else {
        rating_card.style.display = 'none';
        about_card.style.display = 'block';
    }
});

// about_tab.addEventListener('click', function handleClick() {
//     if (about_card.style.display === 'none') {
//         about_card.style.display = 'block';
//     } else {
//         about_card.style.display = 'none';
//     }
// });
