const submitLarpBtn = document.getElementById('submitLarpBtn');
const portfolioTable = document.getElementById('portfolioTable');
const searchInput = document.querySelector('.search-container input');

submitLarpBtn.addEventListener('click', () => {
    window.location.href = 'submit-larp.html';
});

function displayData(data) {
    let html = '';
    data.forEach(item => {
        html += `
            <tr>
                <td><img src="${item.image}" alt="User Image"></td>
                <td>${item.description}</td>
                <td><a href="https://discordapp.com/users/${item.discordId}">${item.discordId}</a></td>
            </tr>
        `;
    });
    portfolioTable.innerHTML = html;
}

fetch('data.json')
    .then(response => response.json())
    .then(data => {
        displayData(data);
        searchInput.addEventListener('keyup', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredData = data.filter(item => {
                return item.description.toLowerCase().includes(searchTerm) ||
                    item.discordId.toLowerCase().includes(searchTerm);
            });
            displayData(filteredData);
        });
    });

const submitForm = document.getElementById('submitForm');
submitForm.addEventListener('submit', event => {
    event.preventDefault();
    const formData = new FormData(submitForm);
    fetch('submit.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            window.location.href = 'index.html';
        }
        else {
            alert('Error submitting form');
        }
    });
});