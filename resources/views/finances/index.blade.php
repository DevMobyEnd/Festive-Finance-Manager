<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festive Finance Manager</title>
    <link rel="stylesheet" href="{{ asset('css/christmas-theme.css') }}">
</head>
<body>
    <h1>🎄 Festive Finance Manager 🎄</h1>
    <div class="container">
        <h2>Your Accounts</h2>
        <ul>
            @foreach($accounts as $account)
                <li>{{ $account->name }}: ${{ number_format($account->current_balance, 2) }}</li>
            @endforeach
        </ul>
    </div>

    <div id="calendar"></div>
<div id="finance-table" style="display: none;">
    <h2>Finanzas del día: <span id="selected-date"></span></h2>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Motivo</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody id="finance-entries">
            <!-- Aquí aparecerán las entradas -->
        </tbody>
    </table>
    <form id="finance-form">
        <select id="type" required>
            <option value="Ingreso">Ingreso</option>
            <option value="Egreso">Egreso</option>
        </select>
        <input type="text" id="reason" placeholder="Motivo" required>
        <input type="number" id="amount" placeholder="Monto" required>
        <button type="submit">Agregar</button>
    </form>
</div>

    <script src="{{ asset('js/snow-effect.js') }}"></script>
</body>
</html>
