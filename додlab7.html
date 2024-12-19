$(document).ready(function() {
    const apiUrl = 'http://lab.vntu.org/api-server/lab7.php';

    function updateTable(data) {
        const tableBody = $('#dataTable tbody');
        tableBody.empty();
        data.forEach(item => {
            tableBody.append(
                `<tr>
                    <td>${item.name}</td>
                    <td>${item.affiliation}</td>
                    <td>${item.rank}</td>
                    <td>${item.location}</td>
                </tr>`
            );
        });
    }

    function loadData() {
        $.getJSON(apiUrl, updateTable).fail(() => alert('Не вдалося завантажити дані'));
    }

    function sortTable(columnIndex) {
        const rows = $('#dataTable tbody tr').get();
        rows.sort((a, b) => {
            const valA = $(a).find('td').eq(columnIndex).text().toUpperCase();
            const valB = $(b).find('td').eq(columnIndex).text().toUpperCase();
            return valA.localeCompare(valB);
        });
        $('#dataTable tbody').append(rows);
    }
    
    loadData();

    $('#reload').click(loadData);
    $('#sortByName').click(() => sortTable(0));
    $('#sortByAffiliation').click(() => sortTable(1));
});

