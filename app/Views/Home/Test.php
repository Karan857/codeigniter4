<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>User Data</h1>
    <table id="userTable" border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>
    fetch('/Car&Bomb/api/user')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('userTable').querySelector('tbody');
            data.forEach(user => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.user_id}</td>
                    <td>${user.username}</td>
                    <td>${user.password}</td>
                    <td>${user.role}</td>
                    <td>${user.name}</td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching user data:', error));
    </script>
</body>

</html>