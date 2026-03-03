<!DOCTYPE html>
<html>
<head>
    <title>Society Report</title>
    <style>
        body { font-family: DejaVu Sans; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>
</head>
<body>

<h2>Society Reports</h2>

<table>
    <tr><th>Total Events</th><td>{{ $totalEvents }}</td></tr>
    <tr><th>Total Maintenances</th><td>{{ $totalMaintenances }}</td></tr>
    <tr><th>Total Bills</th><td>{{ $totalBills }}</td></tr>
    <tr><th>Paid Bills</th><td>{{ $paidBills }}</td></tr>
    <tr><th>Pending Bills</th><td>{{ $pendingBills }}</td></tr>
    <tr><th>Total Collection</th><td>₹ {{ $totalCollection }}</td></tr>
    <tr><th>Total Complaints</th><td>{{ $totalComplaints }}</td></tr>
    <tr><th>Open Complaints</th><td>{{ $openComplaints }}</td></tr>
    <tr><th>Closed Complaints</th><td>{{ $closedComplaints }}</td></tr>
    <tr><th>Total Visitors</th><td>{{ $totalVisitors }}</td></tr>
    <tr><th>Today Visitors</th><td>{{ $todayVisitors }}</td></tr>
</table>

</body>
</html>