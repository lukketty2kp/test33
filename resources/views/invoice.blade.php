<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
<h1>Invoice</h1>

<table border="1">
    <thead>
    <tr>
        <th>Date</th>
        <th>Item Name</th>
        <th>Storage</th>
        <th>Proxy</th>
        <th>Speech Translation</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($invoiceData['items'] as $item)
        <tr>
            <td>{{ $item['date'] }}</td>
            <td>{{ $item['item_name'] }}</td>
            <td>{{ $item['storage'] }}</td>
            <td>{{ $item['proxy'] }}</td>
            <td>{{ $item['speechTranslation'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h3>Total Costs:</h3>
<p>Back Office Cost: ${{ $invoiceData['backOfficeCost'] }}</p>
<p>Storage Cost: ${{ $invoiceData['storageCost'] }}</p>
<p>Proxy Cost: ${{ $invoiceData['proxyCost'] }}</p>
<p>Speech Translation Cost: ${{ $invoiceData['speechTranslationCost'] }}</p>
<p>Total Cost: ${{ $invoiceData['totalCost'] }}</p>
</body>
</html>
