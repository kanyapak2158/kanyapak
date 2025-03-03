<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer and Menu List</title>
    <style>
        table {
            width: 100%; 
            margin-bottom: 20px; 
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h2>Customer List</h2>
    
    <table id="customer_list">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>city</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <h2>Menu List</h2>
    
    <table id="menu_list">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        async function loadCustomer() {
            let url = 'http://localhost/Lab10/customer.php?list';
            let response = await fetch(url);
            let customer_list = await response.json();
            let customer_table = document.querySelector('#customer_list tbody');
            let tbody = '';
            for (let customer of customer_list) {
                tbody += "<tr><td>" + customer.id + "</td><td>" + customer.name + "</td><td>" + customer.city + "</td></tr>";
            }
            customer_table.innerHTML = tbody;
        }

        async function loadMenu() {
            let url = 'http://localhost/Lab10/menu.php?list';
            let response = await fetch(url);
            let menu_list = await response.json();
            let menu_table = document.querySelector('#menu_list tbody');
            let tbody = '';
            for (let menu of menu_list) {
                tbody += "<tr><td>" + menu.menu_id + "</td><td>" + menu.menu_name + "</td><td>" + menu.price + "</td></tr>";
            }
            menu_table.innerHTML = tbody;
        }

        window.addEventListener('load', function() {
            loadCustomer();
            loadMenu();
        });
    </script>

</body>
</html>
